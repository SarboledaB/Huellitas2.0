<?php

/** 
|--------------------------------------------------------------------------
| Author: Manuela Zapata Giraldo
| Email:  mzapatag1@eafit.edu.co
|--------------------------------------------------------------------------
**/

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Foundation;

class FoundationController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function create()
    {
        $breadlist = array();
        $breadlist[0] = array('Home', "user.petItem.list", null, "0");
        $breadlist[1] = array('Create Foundation', "admin.foundations.create", null, "1");
        
        $data["breadlist"] = $breadlist;
        $data["title"] = "Add a foundation";
        return view('admin.foundations.create')->with("data", $data);
    }
    
    public function list()
    {
        $breadlist = array();
        $breadlist[0] = array('Home', "user.petItem.list", null, "0");
        $breadlist[1] = array('List Foundations', "admin.foundations.list", null, "1");
        $data["breadlist"] = $breadlist;

        $data["foundations"] = Foundation::all();
        return view('admin.foundations.list')->with("data", $data);
    }

    public function save(Request $request)
    {   
        try{
            Foundation::validate($request);
            Foundation::create($request->only(["name","email","description"]));        
            return back()->with('success', 'The foundation was created successfully!');
        } catch(\Throwable $th){
            return back()->with('danger', 'Error, could not donate!');
        }
    }

    public function show($id)
    {
        $data["foundation"] = Foundation::findOrFail($id);
        return view('admin.foundations.show')->with("data", $data);
    }

    public function delete($id) // cambiar al destroy
    {        
        $foundation = Foundation::find($id);                
        $foundation->delete();
        //return back()->with('success', 'Foundation deleted succesfully'); 
        return redirect()->route('admin.foundations.list');
        
    }

    public function updateForm($id)
    {
        $data["foundation"] = Foundation::findOrFail($id);
        return view('admin.foundations.update')->with("data", $data);
    }

    public function update(Request $request)
    {
        try{
            $foundation = Foundation::find($request->input('id'));
            $foundation->setName($request->input('name'));
            $foundation->setEmail($request->input('email'));
            $foundation->setDescription($request->input('description'));
            $foundation->save();
            return back()->with('success', 'The foundation was updated successfully!');
        } catch(\Throwable $th){
            return back()->with('danger', 'Error, could not donate!');
        }

    }

}