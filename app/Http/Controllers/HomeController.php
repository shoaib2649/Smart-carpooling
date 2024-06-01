<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Agency;
use App\Models\Ride;
use App\Models\DriverRequest;
use App\Models\AgencyRequest;
use App\Models\Driver;
use App\Models\EventRequest;
use App\Models\Event;
use App\Models\PollQuestion;
use App\Models\PollVote;

use App\Models\Passenger;
use Illuminate\Support\Facades\Auth;
// use session;
use Session;

class HomeController extends Controller
{


    public function showdrivertracking($id)
    {
        $driver_data = Driver::find($id);
        $latitude = $driver_data->latitude;
        $longitude = $driver_data->longitude;
        return view('agency.showtracking', compact('latitude', 'longitude'));
    }
    public function updateLocation(Request $request)
    {

        $latitude = rand(50, 70);
        $longitude = rand(50, 70);

        return response()->json(['latitude' => $latitude, 'longitude' => $longitude]);

    }
    public function EventPublished()
    {
        // $data=Event::all();
// dd($data);
// return view('home.blog',compact('data'));
    }

    public function chance()
    {
        return view('home.aboutview');
    }


    public function index(Request $request)
    {

        $questions = PollQuestion::orderBy('created_at', 'desc')->first();
        $rides = Ride::where('status', 'active')->get();
        $voteCounts = PollVote::where('question_id', $questions->id)
            ->groupBy('option_selected')
            ->select('option_selected', \DB::raw('count(*) as total'))
            ->get();
        $totalVotes = $voteCounts->sum('total');

        $data = Event::where(function ($query) use ($request) {
            if ($request->from_city != '') {
                $query->where('fromcity', 'like', '%' . $request->from_city . '%');
            }
            if ($request->to_city != '') {
                $query->where('tocity', 'like', '%' . $request->to_city . '%');
            }
            if ($request->departure_time != '') {
                $query->where('dtime', '=', $request->departure_time);
            }if ($request->arrival_time != '') {
                $query->where('atime', '=', $request->arrival_time);
            }
            // $query->orderBy('id', 'desc');
            $query->where('availble', '>', 0); // corrected 'availble' to 'available'

        })->orderBy('id', 'desc')->paginate(3);

        $error = $data->isEmpty() ? 'No events found matching the criteria.' : null;

        return view('home.landingpage', compact('data', 'voteCounts', 'totalVotes', 'questions', 'error', 'rides'));

    }

    public function Eventfetchpagination(Request $request)
    {


        $data = Event::paginate(3);

        if ($request->ajax()) {

            return view('home.blogchild', compact('data'))->render();
        }

        return view('home.blogchild', compact('data'));
    }
    public function Aboutus()
    {

        return view('home.aboutview');
    }
    public function Registration()
    {
        return view('passenger.form');
    }
    public function DriverRegistration()
    {
        return view('driver.driverregister');
    }
    public function AgencyRegistration()
    {
        return view('agency.agencyregister');
    }

    public function AgencyRequest(Request $request)
    {
        $data = new AgencyRequest;
        $data->companyname = $request->companyname;
        $data->district = $request->district;
        $data->phone = $request->phone;
        $data->password = $request->password;
        $data->email = $request->email;
        $data->role = "agency";
        $data->save();
        return redirect("/");
    }
    public function AgencyStore($id)
    {
        $request = AgencyRequest::find($id);
        $adminId = session('adminId');
        $data = new Agency;
        $data->companyname = $request->companyname;
        $data->district = $request->district;
        $data->phone = $request->phone;
        $data->password = $request->password;
        $data->email = $request->email;
        $data->role = $request->role;
        $data->admin_id = $adminId;
        $data->save();
        if ($data->save()) {
            // $request->delete($request->id);
            $request->delete();
        }
        return redirect("/");
    }
    public function FetchAgencyData()
    {
        $AdminName = session('AdminName');
        $company = AgencyRequest::all();

        return view('admin.agencyrequest', compact('company', 'AdminName'));
    }
    public function FetchDriverData()
    {
        $AgencyName = session('AdminName');
        $company = DriverRequest::all();
        return view('agency.driverrequest', compact('company', 'AgencyName'));
    }

    public function FetchEventData()
    {
        $company = EventRequest::all();
        return view('agency.eventrequest', compact('company'));
    }
    public function AdminDashboard()
    {
        $passengerCount = 0;
        $driverrequestCount = 0;
        $AgencyrequestCount = 0;
        $AgencyCount = 0;
        $DriverCount = 0;
        $passengerCount = Passenger::count();
        $driverrequestCount = DriverRequest::count();
        $AgencyrequestCount = AgencyRequest::count();
        $AgencyCount = Agency::count();
        $DriverCount = Driver::count();
        $AdminName = session('AdminName');
        return view('admin.home', compact('passengerCount', 'driverrequestCount', 'AgencyrequestCount', 'AgencyCount', 'DriverCount', 'AdminName'));
    }
    public function Agencydashboard()
    {
        $passengerCount = 0;
        $driverrequestCount = 0;
        $DriverCount = 0;
        $EventCount = 0;
        $passengerCount = Passenger::count();
        $driverrequestCount = DriverRequest::count();
        $DriverCount = Driver::count();
        $company = DriverRequest::all();
        $EventCount = EventRequest::count();
        $AgencyName = session('AgencyName');
        return view('agency.home', compact('passengerCount', 'driverrequestCount', 'DriverCount', 'AgencyName', 'company', 'EventCount'));
    }
    public function Login()
    {

        return view('login');
    }
    public function logout()
    {
        if (session()->has('DriverId') && (!is_null(session()->get('DriverId')))) {
            $change_status = Driver::find(session()->get('DriverId'));
            // dd($change_status);
            $change_status->status = 0;
            $change_status->save();
        }

        if (session()->has('adminId') || session()->has('AgencyId') || session()->has('DriverId') || session()->has('PassengerId')) {

            session()->flush();

        }
        return redirect('/');
    }
    public function Verfication(Request $request)
    {
        $email = $request->input('email');

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $existingRecord = Admin::where('email', $email)->where('password', $request->password)->first();
        $existingRecordAgency = Agency::where('email', $email)->where('password', $request->password)->first();
        // dd($existingRecordAgency);
        $existingRecordDriver = Driver::where('email', $email)->where('password', $request->password)->first();

        $passengerRecord = Passenger::where('email', $email)->where('password', $request->password)->first();

        if (
            $existingRecord != NULL || $existingRecordAgency != NULL ||
            $existingRecordDriver != NULL || $passengerRecord != NULL
        ) {

            if ($existingRecord && $existingRecord->role == 1) {
                $request->session()->put('adminId', $existingRecord->id);
                $request->session()->put('AdminName', $existingRecord->name);
                return redirect()->route('admins');
            } elseif ($existingRecordAgency && $existingRecordAgency->role == 'agency') {
                $request->session()->put('AgencyId', $existingRecordAgency->id);
                $request->session()->put('AgencyName', $existingRecordAgency->companyname);
                return redirect('Agencyindex');
            } elseif ($existingRecordDriver && $existingRecordDriver->role == "driver") {
                $request->session()->put('DriverId', $existingRecordDriver->id);
                $driverstatus = Driver::find($existingRecordDriver->id);
                // dd($driverstatus->id);
                $driverstatus->status = 1;
                $driverstatus->save();
                return redirect('driverindex');
            } elseif ($passengerRecord && $passengerRecord->id) {
                $request->session()->put('PassengerId', $passengerRecord->id);

                return redirect('/');
            } else {
                return redirect()->back()->with('error', 'Record not found.');
            }
        } else {
            return redirect()->back()->with('message', 'Invalid Email or Password');
        }

    }
}
