<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class DonationsController extends Controller
{
    public function create($foundationId) //pase el id del foundation para cuando cree la donation mandar a db el id del foundation
    {
        $data["title"] = "Donar";
        $data["foundationId"] = $foundationId;
        $data["userId"] = Auth::id();
        // dd($data["userId"]);
        return view('user.donations.create')->with("data",$data);
    }


    public function save(Request $request)
    {   
        // $test = $request->get('user_id');
        // dd($request);

        
       try{
            Donation::validate($request);
            $donation = new Donation();
            $donation->setPayment($request->input('payment'));
            $donation->setValue($request->input('value'));
            $donation->setFoundationId($request->input('foundation_id'));
            $donation->setUserId($request->input('user_id'));
            $donation->save();
            return back()->with('success','Thank you for donating!');
            /* Donation::validate($request);
            Donation::create($request->only(["payment","value","foundation_id","user_id"]));        
            return back()->with('success','Thank you for donating!'); */
        } catch(\Throwable $th){
            return back()->with('danger', 'Error, could not donate!');
        }
        
    }

    public function list($id)
    {
        try {

            $data = []; //to be sent to the view
            $data["title"] = "List donations";
            $data["donations"] = Donation::all()->where('user_id', $id);

            return view('user.donations.list')->with("data", $data);
        } catch (\Throwable $th) {
            return view('user.donations.list')->with('danger', "Couldn't get the list!");
        }
    }


}