<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\Eventcontroller;
use App\Http\Controllers\SendmailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [HomeController::class, 'index'])->name('event.search');
Route::get('/previous-event', [Eventcontroller::class, 'PreviousEvent'])->name('previousevent.search');
Route::get('/chance', [HomeController::class, 'chance']);
Route::get('/passengerregister', [HomeController::class, 'Registration'])->name('registration');

Route::get('/admins', [HomeController::class, 'AdminDashboard'])->name('admins')->middleware('Adminlogin');
Route::get('/login', [HomeController::class, 'Login'])->name('login')->middleware('logincheck');
Route::get('/logout', [HomeController::class, 'Logout'])->name('logout');
Route::post('/verify', [HomeController::class, 'Verfication'])->name('verify');

// This is route view the aboutus page 
Route::get('/aboutview', [HomeController::class, 'Aboutus'])->name('aboutus');
// This route for displaying all the driver and passenger in dashboard


/*=======================================================================================This is for Agency Pannel Route start============*/
Route::get('/Agencyindex', [HomeController::class, 'AgencyDashboard']);
// Route::get('/Agencyindex', [HomeController::class, 'AgencyDashboard'])->middleware('Agencylogin');
// Admin view the AgencyRequest 
Route::get('/Agencyrequest', [HomeController::class, 'FetchAgencyData'])->name('Agencyrequest');

//Route for AddEvent of Agency 
Route::get('/agencyaddevent', [DriverController::class, 'AgencyAddEvent'])->name('agencyaddevent');
// Store Event that created by the Agency
Route::post('/agencystoreaddevent', [DriverController::class, 'AgencyStoreAddEvent'])->name('agencystoreaddevent');
Route::get('/eventdisplay', [DriverController::class, 'AgencyEventDisplay'])->name('agencyeventdisplay');

Route::get('/agencyregister', [HomeController::class, 'AgencyRegistration'])->name('agencyregistration');
Route::post('/agencystore/{id}', [HomeController::class, 'AgencyStore']);
// Agency Request for Registration
Route::post('/agencyrequest', [HomeController::class, 'AgencyRequest'])->name('agencyrequest');
Route::get('/agencyeditevent/{id}', [DriverController::class, 'AgencyEditevent']);
Route::post('/agencyupdate/{id}', [DriverController::class, 'AgencyUpdateEvent']);

// Agency for show tracking driver
Route::get('drivertracking/{id}', [HomeController::class, 'showdrivertracking'])->name('show.tracking');
Route::post('/driver/update-location', [HomeController::class, 'updateLocation']);

/*============================Here Agency Pannel Route end============*/


// ----------------------------Driver_Routes-----------------------------------
Route::get('/driverform', [DriverController::class, 'form']);
Route::post('/driverregister', [DriverController::class, 'DriverRequest']);
Route::get('/driverfetch', [HomeController::class, 'FetchDriverData']);
Route::post('/driveraprove/{id}', [DriverController::class, 'DriverRegistrationApproved']);
Route::post('/disapprovedriver/{id}', [DriverController::class, 'DriverRegistrationDisApproved']);

Route::get('/passengerlisting', [DriverController::class, 'index']);
// Route for displaying the profile of driver 
Route::get('/driverindex', [DriverController::class, 'DriverHome'])->middleware('Driverlogin');
Route::get('/addevent', [DriverController::class, 'AddEvent']);
// This route for show all the event of own created driver
Route::get('/eventshow', [DriverController::class, 'EventDisplay']);

// This route edit the event
Route::get('/editevent/{id}', [DriverController::class, 'Editevent']);
// This is for update the event Driver 
Route::post('/update/{id}', [DriverController::class, 'UpdateEvent']);
//This is for remove the event Driver
Route::get('/delevent/{id}', [DriverController::class, 'DelEvent']);
// This route for see the passenger request for event
Route::get('/passengerrequest', [DriverController::class, 'Request']);

// This is view route of profile of driver account
Route::get('vieweditfile/{id}', [DriverController::class, 'ViewEditFile'])->name('vieweditfile');
// This is route for update the profile of driver
Route::post('/updateprofile/{id}', [DriverController::class, 'UpdateProfile'])->name('updateprofile');

// Route to show the form
Route::get('/rides/create', [DriverController::class, 'create'])->name('rides.create');

Route::get('/logindriver', [DriverController::class, 'Loginuser'])->name('login.driver');
// Route for 
Route::post('/rides', [DriverController::class, 'store'])->name('rides.store');
Route::get('/rides/{id}', [DriverController::class, 'show'])->name('rides.show');
Route::get('/rides/edit/{id}', [DriverController::class, 'edit'])->name('rides.edit');
Route::put('/rides/{ride}', [DriverController::class, 'update'])->name('rides.update');
Route::get('/rides/booking/{id}', [DriverController::class, 'booking'])->name('rides.booking');
Route::post('/rides/booking/store', [DriverController::class, 'bookingstore'])->name('rides.booking.store');
Route::get('/ridesrequest', [DriverController::class, 'Riderequest']);
Route::get('/rides/request/accept/{id}', [DriverController::class, 'Requestaccept'])->name('ride.request.accept');
Route::get('/rides/request/reject/{id}', [DriverController::class, 'Requestreject'])->name('ride.request.reject');

// ---------------------PassengerRoutes------------------------------------

Route::get('/passengnerform', [PassengerController::class, 'Registration']);
Route::post('/passengerstore', [PassengerController::class, 'Store']);
// Passenger check the profile
Route::get('/psgprofile', [PassengerController::class, 'Profile']);
// Edit profile 
Route::get('/profiledit/{id}', [PassengerController::class, 'ProfileEdit']);
//Update Profile
Route::post('/profileupdate/{id}', [PassengerController::class, 'ProfileUpate']);


// -----------------------------Event Routes------------------------

// header Event
Route::get('/pre-event', [Eventcontroller::class, 'PreviousEvent'])->name('header.event');
Route::get('/user-reveiw/{id}', [Eventcontroller::class, 'UserReview'])->name('header.userreview');
Route::get('/write-reveiw/{event_id}', [Eventcontroller::class, 'WriteReview'])->name('header.writereview');
Route::get('/view-page/{id}', [Eventcontroller::class, 'ViewDetailPage'])->name('header.veiwdetail');
Route::post('/store-reveiw', [Eventcontroller::class, 'StoreReview'])->name('header.storereview')->middleware('passengerlogin');





// This is for driver request to agency for published the event
Route::get('/search', [HomeController::class, 'search']);
Route::post('/eventrequeststore', [Eventcontroller::class, 'EventRequestStore']);
// This is for agency show the request of Event
Route::get('/eventrequestshow', [HomeController::class, 'FetchEventData']);
Route::get('/eventviews/{id}', [Eventcontroller::class, 'EventView']);
Route::post('/pagination/', [HomeController::class, 'Eventfetchpagination'])->name('pagination.fetch');
// This is for approved the event of agency to driver
Route::post('/eventapproved/{id}', [Eventcontroller::class, 'EventApproved']);
//This for reject the request of published the event of driver (agency do )
Route::get('/eventreject/{id}', [Eventcontroller::class, 'Eventreject']);
// passenger Submit the visiting the Event / travel the event send request
Route::get('/eventdeparture/{id}', [Eventcontroller::class, 'EventDeparture']);
// Store Event of passenger / passenger Reserved seats
Route::post('/eventdeparturestore', [Eventcontroller::class, 'EventDepartureStore']);
// This for udpating the value of categories
Route::post('/update-categories', [Eventcontroller::class, 'UpdateCategories']);

// Route::get('/poll',function()
// {
// return view('agency.addpoll');
// });
// Show the pollform in browser
Route::get('/pollform', [Eventcontroller::class, 'Pollform']);
// store the form in db
Route::post('/storepoll', [Eventcontroller::class, 'Storepoll']);

// display the poll
Route::get('/show', [Eventcontroller::class, 'showPollForm']);

Route::post('/submit-poll', [Eventcontroller::class, 'submitPoll'])->middleware('passengerlogin');
;


// ===================Email Controller============
// Route::get('/email',[SendmailController::class,'sendEmail'])->name('email');
// Route::get('/send',function()
// {
// return view('passenger.testingemail');
// });


