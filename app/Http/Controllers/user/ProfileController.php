<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {   
        $data = []; //to be sent to the view
        $user = User::findOrFail(Auth::id());
        $orders = Order::where(
            [
            ['user_id', '=', Auth::id()]
            ]
        )
        ->get();
        $data["title"] = $user->getUsername();
        $data["user"] = $user;
        $data["orders"] = $orders;

        return view('user.profile.show')->with("data", $data);
    }
}
