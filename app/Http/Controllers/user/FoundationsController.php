<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Foundation;

class FoundationsController extends Controller
{
    
    public function list()
    {
        //dd("entra");
        $data["foundations"] = Foundation::all();
        return view('user.foundations.list')->with("data",$data);
    }

    public function show($id)
    {
        $data["foundation"] = Foundation::findOrFail($id);
        return view('user.foundations.show')->with("data",$data);
    }

}