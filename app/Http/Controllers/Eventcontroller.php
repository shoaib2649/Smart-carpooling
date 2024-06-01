<?php
namespace App\Http\Controllers;

use Alert;
use App\Models\EventRequest;
use App\Models\PollQuestion;
use App\Models\PollVote;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Passenger;
use App\Models\Driver;
use App\Models\ReviewRating;
use App\Models\EventDeparture;
use Illuminate\Support\Facades\Redirect;
use Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class Eventcontroller extends Controller
{

    public function PreviousEvent(Request $request)
    {
        $data = Event::where(function ($query) use ($request) {

            if ($request->to_city != '') {
                $query->where('tocity', 'like', '%' . $request->to_city . '%');
            }

            // $query->orderBy('id', 'desc');
            $query->where('availble', '<=', 0); // corrected 'availble' to 'available'

        })->orderBy('id', 'desc')
            ->paginate(3);
        $error = $data->isEmpty() ? 'No events found matching the criteria.' : null;
        return view('agency.previousevent', compact('data', 'error'));
    }
    public function ViewDetailPage($id)
    {
        $detailpage = Event::find($id);
        $driver_id = $detailpage->driver_id;
        $driverdetail = Driver::find($driver_id);
        return view('agency.pasteventviewpage', compact('detailpage', 'driverdetail'));

    }
    public function UserReview($id)
    {

        $passenger_rating_detail = ReviewRating::join('passengers', 'review_ratings.user_id', '=', 'passengers.id')
            ->select('review_ratings.rating', \DB::raw('COUNT(review_ratings.id) as rating_count'))
            ->where('review_ratings.event_id', $id)
            ->groupBy('review_ratings.rating')
            ->get();
        $totalVotes = $passenger_rating_detail->sum('rating_count');

        $passenger_review = DB::table('review_ratings')
            ->join('passengers', 'review_ratings.user_id', '=', 'passengers.id')
            ->select('review_ratings.*', 'passengers.name')
            ->orderBy('review_ratings.id', 'desc')
            ->where('review_ratings.event_id', $id)
            ->get();
        return view('agency.userreview', compact('id', 'passenger_rating_detail', 'totalVotes', 'passenger_review'));
    }
    public function WriteReview($event_id)
    {
        $event_data = Event::where('id', $event_id)->first();
        $user_id = session('PassengerId');
        return view('agency.writereview', compact('event_data', 'user_id'));
    }
    public function StoreReview(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'selected-rating' => 'required|integer|between:1,5',
            'selected-category' => 'required|string',
            'review' => 'required|string',
            'event_id' => 'required|integer', // You may need to adjust this validation based on your requirements
            // 'user_id' => 'required|integer|unique:review_ratings,user_id', // Ensure user_id is unique in review_ratings table
        ]);

        // Create a new ReviewRating instance and fill it with the validated data
        $reviewRating = new ReviewRating();
        $reviewRating->rating = $validatedData['selected-rating'];
        $reviewRating->category = $validatedData['selected-category'];
        $reviewRating->review = $validatedData['review'];
        $reviewRating->event_id = $validatedData['event_id'];
        // $reviewRating->user_id = $validatedData['user_id'];
        $reviewRating->user_id = $request->user_id;
        $reviewRating->save();
        return redirect()->back();
    }
    public function EventRequestStore(Request $request)
    {
        // dd($request->all());

        $validator = $request->validate([
            'tittle' => 'required|string|max:255',
            'fcity' => 'required|string|max:255',
            'tcity' => 'required|string|max:255',
            'premium_seat' => 'required|string|max:3',
            'standard_seat' => 'required|string|max:3',
            'bussiness_seat' => 'required|string|max:3',

            'eimage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'detail' => 'required|string',
        ], [
            'fcity.required' => 'The From city must be required',
            'tcity.required' => 'The to city must be required',
            'atime.date' => 'The Arrival city must be required',
            'dtime.date' => 'The Departure city must be required',
            'premium_seat.max' => 'The  premium seat is required',
            'standard_seat.max' => 'The  standard seat is required',
            'bussiness_seat.max' => 'The bussiness seat is required',
        ]);




        if ($validator) {

            $event = new EventRequest;
            $event->tittle = $request->tittle;
            $event->fcity = $request->fcity;
            // dd($event->fcity);
            $event->tcity = $request->tcity;
            $event->atime = $request->atime;
            $event->dtime = $request->dtime;
            $event->detail = $request->detail;
            $event->standard = $request->standard_seat;
            $event->premium = $request->premium_seat;
            $event->business = $request->bussiness_seat;
            $total_seats = $event->standard + $event->premium + $event->business;
            $event->eimage = $request->eimage;

            $event->total_seats = $total_seats;
            // $event->availble = $total_seats;
            // dd($event->availble);
            if ($request->hasfile('eimage')) {
                $file = $request->file('eimage');
                $original_name = time() . "." . $file->getClientOriginalName();
                $file->move(public_path('Eventimages/'), $original_name);
                $event->eimage = $original_name;
            }
            $event->driver_id = session('DriverId');
            $event->status = "pending";
            $event->save();
            return redirect('driverindex');
        }
    }
    public function EventApproved($id)
    {
        $request = EventRequest::find($id);
        $event = new Event;
        $event->tittle = $request->tittle;
        $event->fromcity = $request->fcity;
        $event->tocity = $request->tcity;
        $event->atime = $request->atime;
        $event->dtime = $request->dtime;
        $event->detail = $request->detail;
        $event->eimage = $request->eimage;
        $event->total_seats = $request->total_seats;
        $event->availble = $request->total_seats;
        $event->driver_id = $request->driver_id;
        $event->status = "approved";
        $event->save();
        if ($event->save()) {
            // $request->delete($request->id);
            $request->delete();
        }
        return redirect()->back();
    }
    public function Eventreject($id)
    {


        $reject = Event::find($id);

        // dd($reject);
        $des = 'Eventimages/' . $reject->eimage;
        // dd($des);
        if (File::exists($des)) {
            File::delete($des);
        }
        $reject->delete();
        return redirect()->back();

    }

    public function EventView($id)
    {
        $detailpage = Event::find($id);
        $driver_id = $detailpage->driver_id;
        $driverdetail = Driver::find($driver_id);
        return view('home.eventviews', compact('detailpage', 'driverdetail'));
    }
    public function EventDeparture($id)
    {
        $EventId = Event::find($id);
        // dd($EventId);
        $id = $EventId->id;
        $maxAllowedValueBussiness = $EventId->business;

        $maxAllowedValuePremium = $EventId->premium;

        $maxAllowedValueStandard = $EventId->standard;

        // $EventId=$Event->id;
        return view('passenger.eventdeparture', compact('EventId', 'id', 'maxAllowedValueBussiness', 'maxAllowedValuePremium', 'maxAllowedValueStandard'));
    }
    public function EventDepartureStore(Request $request)
    {

        // dd($request->all());
// These are Event object
        $show = $request->eventdata;
        $data = json_decode($show);
        if ($data) {
            $eventId = $data->id;
            $totalSeat = $data->total_seats;
            $availblseat = $data->availble;
            $premium = $data->premium;
            $standard = $data->standard;
            $business = $data->business;
            $eventdeptime = $data->dtime;
            $eventarivaltime = $data->atime;
            $request->validate([
                'passenger_name' => 'required',
                'passenger_address' => 'required',
                // 'email' => 'email|unique:event_departures,email',
                'phone_no' => 'min:2',
            ]);



        } else {
            // Handle the case where decoding failed
            dd('Failed to decode JSON string.');
        }
        $eventdepstore = new EventDeparture();
        $eventdepstore->passenger_name = $request->passenger_name;
        $eventdepstore->address = $request->passenger_address;
        $eventdepstore->email = $request->email;
        $eventdepstore->total = $request->total;
        $eventdepstore->phone_no = $request->phone_no;
        $eventdepstore->event_id = $eventId;
        $allseatbook = $request->standard_seats + $request->premium_seats + $request->business_seats;
        $eventdepstore->total_seat = $allseatbook;
        $availble = $availblseat - $allseatbook;
        $premium = $premium - $request->premium_seats;
        $standard = $standard - $request->standard_seats;
        $business = $business - $request->business_seats;
        if ($eventdepstore->save()) {
            // Alert:success('Successful','You have added the event');
            Event::where('id', $eventId)
                ->update([
                    'availble' => $availble,
                    'standard' => $standard,
                    'premium' => $premium,
                    'business' => $business
                ]);

            if ($availble == 0) {
                // Send email to all passengers who have registered
                $registeredPassengers = EventDeparture::where('event_id', $eventId)->get();
                foreach ($registeredPassengers as $passenger) {
                    $maildata = [
                        'tittle' => 'Dear ' . $passenger->passenger_name . ', Event Full',
                        'body' => 'All seats for the event have been reserved.',
                        'description' => 'We regret to inform you that all seats for the event have been reserved. Please stay tuned for future events. Thank you for your interest.'
                    ];

                    Mail::to($passenger->email)->send(new SendMail($maildata));
                }
                return Redirect::to("/eventviews/{$eventId}");
            } else {
                Alert::success('Successful', 'You have reserved the seat');
                $this->sendEmails($eventdepstore->passenger_name, $eventdepstore->email, $allseatbook, $eventdeptime, $eventarivaltime);
                // return redirect('/email');
                return Redirect::to("/eventviews/{$eventId}");
            }
        }
    }
    // Alert::success('Successful','You have reserved the seat');
    //  $this->sendEmails($eventdepstore->passenger_name,$eventdepstore->email,$allseatbook,$eventdeptime,$eventarivaltime);
    //  // return redirect('/email');
    //  return Redirect::to("/eventviews/{$eventId}");



    public function sendEmails($passengername, $email, $allseatbook, $eventdeptime, $eventarivaltime)
    {
        $maildata = [
            'tittle' => 'Dear ' . $passengername . ', Seat Reserved',
            'body' => 'You have successfully reserved a seat for the event.',

            'description' => 'Thank you for reserving a seat for the event on ' .
                $eventdeptime . 'You have reserved a total of  ' . $allseatbook . '  seats. Please note that reservations must be made before  ' . $eventarivaltime . '  We look forward to seeing you there! ',

        ];
        Mail::to($email)->send(new SendMail($maildata));

        // return route('email');
    }
    public function Pollform()
    {

        return view('agency.addpoll');
    }



    public function Storepoll(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'question' => 'required|string|max:255',
            'options_a' => 'required|string|max:255',
            'options_b' => 'required|string|max:255',
            'options_c' => 'required|string|max:255',
            'options_d' => 'required|string|max:255',
        ]);

        // Create a new poll record
        $poll = new PollQuestion();
        $poll->question = $validatedData['question'];
        $poll->option_a = $validatedData['options_a'];
        $poll->option_b = $validatedData['options_b'];
        $poll->option_c = $validatedData['options_c'];
        $poll->option_d = $validatedData['options_d'];

        $poll->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Poll created successfully!');
    }
    public function showPollForm()
    {
        // Retrieve a random question from the database
        $questions = PollQuestion::orderBy('created_at', 'desc')->first();

        $voteCounts = PollVote::where('question_id', $questions->id)
            ->groupBy('option_selected')
            ->select('option_selected', \DB::raw('count(*) as total'))
            ->get();

        $totalVotes = $voteCounts->sum('total');


        return view('agency.showpoll', compact('questions', 'voteCounts', 'totalVotes'));
    }


    public function submitPoll(Request $request)
    {
        $user_id = session('PassengerId');
        $user_detail = Passenger::find($user_id);


        $validatedData = $request->validate([
            'option' => 'required',
        ]);


        $vote = new PollVote();

        $vote->option_selected = $validatedData['option'];
        $vote->email = $user_detail->email;
        $vote->question_id = $request->id;

        $vote->save();

        return redirect()->back()->with('message', 'Vote submitted successfully!');

    }

}




