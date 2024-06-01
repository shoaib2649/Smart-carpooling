<?php
namespace App\Http\Controllers;

use App\Models\RideRequest;
use Illuminate\Http\Request;
use App\Models\Agency;
use App\Models\DriverRequest;
use App\Models\Passenger;
use App\Models\Driver;
use App\Models\Ride;
use App\Models\Event;
use App\Models\EventRequest;
use Illuminate\Support\Facades\File;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;



class DriverController extends Controller
{

  public function Loginuser()
  {
    $drivers = Driver::all();
    return view('agency.logindriver', compact('drivers'));
  }
  public function Form(
  ) {
    $data = Agency::all();
    return view('Driver.driverregister', compact("data"));
  }
  public function index()
  {
    $data = Passenger::all();
    dd($data);
    return view('Driver.index', compact("data"));
  }

  public function AgencyEventDisplay()
  {
    $Event = Event::all();

    return view('agency.eventdisplaycommon', compact('Event'));
  }

  public function DriverRequest(Request $request)
  {
    // dd($request->all());
    $validation = $request->validate([
      'longitude' => 'required',
      'latitude' => 'required',
      'phone' => 'required|min:11'
    ]);
    $data = new DriverRequest;
    $data->name = $request->name;
    $data->district = $request->district;
    $data->phone = $request->phone;
    $data->password = $request->password;
    $data->email = $request->email;
    $data->address = $request->address;
    $data->latitude = $request->latitude;
    $data->longitude = $request->longitude;
    $data->role = "driver";
    $data->save();
    return redirect("/");
  }
  public function DriverRegistrationApproved($id)
  {
    $EventRequest = EventRequest::all();
    $agencyId = session('AgencyId');
    $request = DriverRequest::find($id);
    $data = new Driver;
    $data->name = $request->name;
    $data->district = $request->district;
    $data->phone = $request->phone;
    $data->password = $request->password;
    $data->email = $request->email;
    $data->Agency_id = $agencyId;
    $data->address = $request->address;
    $data->latitude = $request->latitude;
    $data->longitude = $request->longitude;
    $data->role = $request->role;
    $data->save();
    if ($data->save()) {
      // $request->delete($request->id);
      $request->delete();
    }
    return redirect("Agencyindex");
  }
  public function DriverRegistrationDisApproved($id)
  {
    $driver_id = DriverRequest::find($id);
    $driver_id->delete();
    return redirect()->back();
  }

  public function DriverHome()
  {
    $driverId = session('DriverId');
    $activedriver = Driver::find($driverId);

    return view('Driver.index', compact('activedriver'));
  }
  public function AddEvent()
  {
    return view('driver.addeventform');
  }
  public function AgencyAddEvent()
  {
    $drivers = Driver::all();
    return view('agency.addeventagencycommon', compact('drivers'));
  }

  public function AgencyStoreAddEvent(Request $request)
  {

    $validate = $request->validate(
      [
        'tittle' => 'required|string',
        'fcity' => 'required|string',
        'tcity' => 'required|string',
        'detail' => 'required|string',
        'dtime' => 'required',
        'atime' => 'required',
        'standard_seat' => 'required|integer',
        'premium_seat' => 'required|integer',
        'bussiness_seat' => 'required|integer',
        'eimage' => 'required',
      ]
    );
    if ($validate) {
      $event = new Event;
      $event->tittle = $request->tittle;
      $event->fromcity = $request->fcity;
      $event->tocity = $request->tcity;
      $event->atime = $request->atime;
      $event->dtime = $request->dtime;
      $event->detail = $request->detail;
      $event->standard = $request->standard_seat;
      $event->premium = $request->premium_seat;
      $event->business = $request->bussiness_seat;
      $total_seats = $event->standard + $event->premium + $event->business;
      $event->eimage = $request->eimage;

      $event->total_seats = $total_seats;
      $event->availble = $total_seats;
      if ($request->hasfile('eimage')) {
        $file = $request->file('eimage');
        $extension = time() . "." . $file->getClientOriginalName();
        $file->move(public_path('Eventimages/'), $extension);
        $event->eimage = $extension;
      }
      $event->driver_id = $request->driver_id;
      $event->status = "AgencyCreated";
      $event->save();

      return redirect()->back();
    }
  }
  public function EventDisplay()
  {
    $Event = Event::all();
    return view('driver.eventdisplay', compact('Event'));
  }


  public function Request()
  {
    return view('driver.request');
  }

  // This view used for displaying the element for editing
  public function Editevent($id)
  {
    $edits = Event::find($id);
    if (!$edits) {
      return redirect()->back()->with('message', 'Oh! Object not found');
    } else {
      return view('driver.editevent', compact('edits'));
    }

  }
  public function AgencyEditevent($id)
  {
    $edits = Event::find($id);
    if (!$edits) {
      return redirect()->back()->with('message', 'Oh! Object not found');
    } else {
      return view('agency.editevent', compact('edits'));
    }

  }
  public function DelEvent($id)
  {
    $Dell = Event::find($id);
    dd($Dell);
    $Dell->delete();
    if ($Dell->delete()) {
      return redirect()->back()->with('message', 'Successfuly Deleted Event');
    }
  }
  public function UpdateEvent(Request $request, $id)
  {
    // dd($request->tittle);

    $event = Event::find($id);
    // This helpful for checking the event changes or not
    if (
      $request->input('tittle') == $event->tittle &&
      $request->input('detail') == $event->detail &&
      $request->input('fcity') == $event->fromcity &&
      $request->input('tcity') == $event->tocity &&
      $request->input('dtime') == $event->dtime &&
      $request->input('atime') == $event->atime &&
      !$request->hasFile('eimage')
    ) {
      return redirect('/eventshow')->with('message', 'You have not updated the event');
    }
    $event->tittle = $request->tittle;
    $event->fromcity = $request->fcity;
    $event->tocity = $request->tcity;
    $event->atime = $request->atime;
    $event->dtime = $request->dtime;
    // This is already image exist in public directory
    $alreadyexist = 'Eventimages/' . $event->eimage;
    if ($request->hasfile('eimage')) {

      if (File::exists($alreadyexist)) {
        File::delete($alreadyexist);
      }
      $file = $request->file('eimage');
      $extension = time() . "." . $file->getClientOriginalName();
      $file->move(public_path('Eventimages/'), $extension);
      $event->eimage = $extension;
    }
    $event->detail = $request->detail;
    $event->save();
    return redirect('/eventshow')->with('message', 'Successfuly Update Event');
  }

  public function AgencyUpdateEvent(Request $request, $id)
  {
    // dd($request->tittle);

    $event = Event::find($id);
    // This helpful for checking the event changes or not
    if (
      $request->input('tittle') == $event->tittle &&
      $request->input('detail') == $event->detail &&
      $request->input('fcity') == $event->fromcity &&
      $request->input('tcity') == $event->tocity &&
      $request->input('dtime') == $event->dtime &&
      $request->input('atime') == $event->atime &&
      !$request->hasFile('eimage')
    ) {
      return redirect('/eventdisplay')->with('message', 'You have not updated the event');
    }
    $event->tittle = $request->tittle;
    $event->fromcity = $request->fcity;
    $event->tocity = $request->tcity;
    $event->atime = $request->atime;
    $event->dtime = $request->dtime;
    // This is already image exist in public directory
    $alreadyexist = 'Eventimages/' . $event->eimage;
    if ($request->hasfile('eimage')) {

      if (File::exists($alreadyexist)) {
        File::delete($alreadyexist);
      }
      $file = $request->file('eimage');
      $extension = time() . "." . $file->getClientOriginalName();
      $file->move(public_path('Eventimages/'), $extension);
      $event->eimage = $extension;
    }
    $event->detail = $request->detail;
    $event->save();
    return redirect('/eventdisplay')->with('message', 'Successfuly Update Event');
  }


  public function ViewEditFile($id)
  {
    $driverId = Driver::find($id);
    return view('driver.profiledit', compact('driverId'));
  }
  public function UpdateProfile(Request $request, $id)
  {

    $data = Driver::find($id);
    // dd($request->address);
    if (
      $data->name == $request->name &&
      $data->phone == $request->phone &&
      $data->district == $request->district &&
      $data->address == $request->address &&
      $data->email == $request->email &&
      $data->password == $request->password
    ) {


      return redirect('/driverindex')->with('message', 'You have  unchanged in profile');
    } else {
      $data->name = $request->name;
      $data->district = $request->district;
      $data->password = $request->password;
      $data->email = $request->email;
      $data->phone = $request->phone;
      $data->address = $request->address;
      $data->save();

      if ($data->save()) {
        return redirect('/driverindex')->with('message', 'Successfuly udpate');
      }
    }
  }

  public function create()
  {
    return view('driver.addrides');
  }

  // Method to store the form data
  public function store(Request $request)
  {
    // dd($request->all());
    // Validate the request data
    $validatedData = $request->validate([
      'driver_id' => 'required|integer',
      'name' => 'required|string',
      'model' => 'required|string',
      'number' => 'required|string',
      'startpoint' => 'required|string',
      'endpoint' => 'required|string',
      'fare' => 'required|numeric',
    ]);

    $file = $request->file('ride_image');
    $name = time() . "." . $file->getClientOriginalName();
    $file->move(public_path('Rideimages/'), $name);
    $validatedData['ride_image'] = $name;
    // Create a new ride record
    Ride::create($validatedData);
    // Redirect the user after storing the data
    return redirect()->route('rides.create')->with('success', 'Ride created successfully!');
  }
  public function show($id)
  {

    // Retrieve the ride from the database based on the provided ID
    $rides = Ride::where('driver_id', '=', $id)->get();


    // Pass the retrieved ride data to the view
    return view('driver.showride', compact('rides'));
  }
  public function edit($id)
  {
    $ride = Ride::findOrFail($id);
    return view('driver.editride', compact('ride'));
  }
  public function update(Request $request, $ride)
  {
    // dd($request->all());
    $validatedData = $request->validate([
      'driver_id' => 'required|integer',
      'name' => 'required|string',
      'model' => 'required|string',
      'number' => 'required|string',
      'startpoint' => 'required|string',
      'endpoint' => 'required|string',
      'fare' => 'required|numeric',
    ]);

    $ride = Ride::findOrFail($ride);

    if ($request->hasFile('new_ride_image')) {

      $file = $request->file('new_ride_image');
      $name = time() . '.' . $file->getClientOriginalExtension();
      $file->move(public_path('Rideimages/'), $name);

      if (!is_null($ride->ride_image)) {
        $oldImagePath = public_path('Rideimages/' . $ride->ride_image);
        if (File::exists($oldImagePath)) {
          File::delete($oldImagePath);
        }
      }
      // Update the ride image field with the new image name
      $ride->ride_image = $name;
    }
    $ride->status = $request->status;

    $ride->update($validatedData);
    return redirect()->route('rides.show', ['id' => $ride->id])->with('success', 'Ride updated successfully!');

  }

  public function booking($id)
  {
    $ride = Ride::find($id);
    $driver = Driver::all();

    return view('driver.booking', compact('ride', 'driver'));
  }
  public function bookingstore(Request $request)
  {

    // dd($request->all());
    $validatedData = $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|email|max:255',
      'phone' => 'required|string|max:20',
      'arrival' => 'required|date',
      'departure' => 'required|date',
      'driver_id' => 'required|string',
    ]);

    $rideBooking = new RideRequest();
    $rideBooking->ride_id = $request->ride_id;
    $rideBooking->name = $validatedData['name'];
    $rideBooking->email = $validatedData['email'];
    $rideBooking->phone_number = $validatedData['phone'];
    $rideBooking->arrival = $validatedData['arrival'];
    $rideBooking->departure = $validatedData['departure'];
    $rideBooking->driver_id = $validatedData['driver_id'];
    $status = 'Pending';
    $rideBooking->save();
    if ($rideBooking->save()) {

      $maildata = [
        'tittle' => 'Dear ' . $rideBooking->name,
        'body' => 'Congratulations! Your request for a ride booking has been sent to the driver.',
        'description' => 'Your request status is currently ' . $status . '. After approval or rejection, you will receive a response via email. Thank you for booking.'
      ];

      Mail::to($rideBooking->email)->send(new SendMail($maildata));
    }

    // return redirect()->route('your.redirect.route')->with('success', 'Ride booked successfully!');
    return redirect()->back();
  }
  public function Riderequest()
  {
    $driver_id = session()->get('DriverId');

    $requests = RideRequest::where('driver_id', '=', $driver_id)->orderBy('id', 'desc')->get();

    return view('driver.request', compact('requests'));
  }
  public function requestaccept($id)
  {
    $ride_id = RideRequest::find($id);
    $ride_id->status = 'Accept';
    $ride_id->save();
    if ($ride_id->save()) {

      $maildata = [
        'tittle' => 'Dear ' . $ride_id->name,
        'body' => 'Congratulations! Your request for a ride booking has been approved.',
        'description' => "Your request has been approved. Please be ready for your travel from " . $ride_id->arrival . " to " . $ride_id->departure . ". Thank you for booking."

      ];

      Mail::to($ride_id->email)->send(new SendMail($maildata));
    }

    // return redirect()->route('your.redirect.route')->with('success', 'Ride booked successfully!');
    return redirect()->back();


  }
  public function requestreject($id)
  {
    $ride_id = RideRequest::find($id);
    // $ride_id->save();
    if ($ride_id) {

      $maildata = [
        'tittle' => 'Dear ' . $ride_id->name,
        'body' => 'Sorry! Your request for a ride booking has been rejected.',
        'description' => 'Your request has been rejected because the car is already booked. Best wishes for your next attempt.'
      ];

      Mail::to($ride_id->email)->send(new SendMail($maildata));
      $ride_id->delete();
    }
    return redirect()->back();
  }
}
