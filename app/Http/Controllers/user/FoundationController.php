<?php

/** 
|--------------------------------------------------------------------------
| Author: Manuela Zapata Giraldo
| Email:  mzapatag1@eafit.edu.co
|--------------------------------------------------------------------------
**/

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Foundation;
use App\Models\Donation;

class FoundationController extends Controller
{
    public function list()
    {
        
        
        try{
            $data["foundations"] = Foundation::all();
            return view('user.foundations.list')->with("data", $data);
            
        } catch (\Throwable $th){
            return view('user.foundations.list')->with('danger', "Couldn't get the list!");
        }
        
    }

    public function show($id)
    {
        $data["foundation"] = Foundation::findOrFail($id);
        return view('user.foundations.show')->with("data", $data);
    }

}