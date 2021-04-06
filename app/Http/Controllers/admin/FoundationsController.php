<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Foundation;

class FoundationsController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function create()
    {
        $data["title"] = "Agregar fundación";
        return view('admin.foundations.create')->with("data",$data);
    }
    
    public function list()
    {
        $data["foundations"] = Foundation::all();
        return view('admin.foundations.list')->with("data",$data);
    }

    public function save(Request $request)
    {   
        try{
            Foundation::validate($request);
            Foundation::create($request->only(["name","email","description"]));        
            return back()->with('success','The foundation was created successfully!');
        } catch(\Throwable $th){
            return back()->with('danger', 'Error, could not donate!');
        }
    }

    public function show($id)
    {
        $data["foundation"] = Foundation::findOrFail($id);
        return view('admin.foundations.show')->with("data",$data);
    }

    public function delete($id) // cambiar al destroy
    {        
        $foundation = Foundation::find($id);                
        $foundation->delete();
        //return back()->with('success', 'Foundation deleted succesfully'); 
        return redirect()->route('admin.foundations.list');
        
    }

}