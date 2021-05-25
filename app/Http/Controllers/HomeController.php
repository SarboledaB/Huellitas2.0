<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return redirect()->route('user.petItem.list');
    }

    public function home()
    {
        return redirect()->route('user.petItem.list');
    }

}