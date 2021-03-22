<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\PetItem;

class PetItemController extends Controller
{
    public function list()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Products";
        $data["categories"] = Category::with('pet_items')->get();
        return view('user.petItem.list')->with("data", $data);     
    }

    public function show($id)
    {
        try {
            $data = []; //to be sent to the view
            $petItem = PetItem::findOrFail($id);
            $data["title"] = $petItem->getName();
            $data["petItem"] = $petItem;
            //dd($data["petItem"]);
            return view('user.petItem.show')->with("data", $data);
        } catch (\Throwable $th) {
            return back()->with('danger', 'Pet Item not found!');
        }
    }
}
