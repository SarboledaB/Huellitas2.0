<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation;

class DonationsController extends Controller
{
    public function create($id) //pase el id del foundation para cuando cree la donation mandar a db el id del foundation
    {
        $data["title"] = "Donar";
        $data["foundation"] = $id;
        return view('donations.create')->with("data",$data);
    }
    
    public function list($foundationId)
    {
        $data["donations"] = Donation::all()->where('foundation_id',$foundationId);
        //dd($data["donations"]);
        return view('admin.donations.list')->with("data",$data);
    }

    public function save(Request $request)
    {   
        Donation::validate($request);
        Donation::create($request->only(["payment","value","foundation"]));        
        return back()->with('success','¡Gracias por donar!');
    }

    public function show($id) 
    {
        $data["donations"] = Donation::findOrFail($id);
        return view('admin.donations.show')->with("data",$data);
    }

    public function delete($id) // necesario???
    {        
        $donations = Donation::find($id);                
        $donations->delete();
        return redirect()->route('donations.list');
        
    }

}