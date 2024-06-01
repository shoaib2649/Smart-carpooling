<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agency;
use App\Models\Passenger;
use App\Models\Driver_Registration;
use session;

class PassengerController extends Controller
{
    public function Registration()
    {

        return view('passenger.form');
    }

    public function Store(Request $request)
    {
        $validate = $request->validate([
            'phone' => 'required|min:11',
        ]);
        if ($validate) {
            $data = new Passenger;
            $data->name = $request->name;
            $data->district = $request->district;
            $data->phone = $request->phone;
            $data->password = $request->password;
            $data->email = $request->email;
            $data->date_of_birth = $request->Dob;
            $data->address = $request->address;
            $data->save();
            return redirect("/");

        }

    }
    public function Profile()
    {
        $id = session()->get('PassengerId');
        $passengerdata = Passenger::find($id);

        return view('passenger.psgviewprofile', compact('passengerdata'));

    }
    public function ProfileEdit($id)
    {
        $data = Passenger::find($id);
        return view('passenger.psgeditprofile', compact('data'));

    }
    public function ProfileUpate($id, Request $request)
    {

        $updatepassenger = Passenger::find($id);
        if ($updatepassenger->name == $request->name && $updatepassenger->district == $request->district && $updatepassenger->phone == $request->phone && $updatepassenger->email == $request->email && $updatepassenger->date_of_birth == $request->Dob && $updatepassenger->address == $request->address) {
            return redirect('/psgprofile')->with('message', 'You have not change the profile');
        } else {
            $updatepassenger->name = $request->name;
            $updatepassenger->district = $request->district;
            $updatepassenger->email = $request->email;
            $updatepassenger->password = $request->password;
            $updatepassenger->date_of_birth = $request->Dob;
            $updatepassenger->address = $request->address;
            $updatepassenger->phone = $request->phone;

            $updatepassenger->save();
            return redirect('/psgprofile')->with('message', 'Successfully Update the Profile');
        }


    }

}

