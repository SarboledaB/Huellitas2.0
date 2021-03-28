<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation;

class DonationsController extends Controller
{
    public function create($foundationId) //pase el id del foundation para cuando cree la donation mandar a db el id del foundation
    {
        $data["title"] = "Donar";
        $data["foundationId"] = $foundationId;
        //dd($data["foundationId"]);
        return view('user.donations.create')->with("data",$data);
    }


    public function save(Request $request)
    {   
        Donation::validate($request);
        Donation::create($request->only(["payment","value","foundation_id"]));        
        return back()->with('success','¡Gracias por donar!');
    }

}