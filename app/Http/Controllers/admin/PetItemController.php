<?php
/*
|--------------------------------------------------------------------------
| Author: Sebastian Arboleda Botero
| Email:  sarboledab@eafit.edu.co
|--------------------------------------------------------------------------
*/

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\PetItem;
use App\Interfaces\ImageStorage;
use Illuminate\Support\Facades\URL;

class PetItemController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function show($id)
    {
        try {
            $data = []; //to be sent to the view
            $petItem = PetItem::findOrFail($id);
            $data["title"] = $petItem->getName();
            $data["petItem"] = $petItem;
            return view('admin.petItem.show')->with("data", $data);
        } catch (\Throwable $th) {
            return back()->with('danger', 'Pet Item not found!');
        }
    }

    public function create()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Create product";
        $data["categories"] = $data["petItems"] = Category::all();
        return view('admin.petItem.create')->with("data", $data);
    }

    public function save(Request $request)
    {
        /* try { */
            PetItem::validate($request);
            $storeInterface = app(ImageStorage::class);
            $storeInterface->store($request);
            $name = $request->file('image')->getClientOriginalName();
            $path = URL::asset('storage/' . $name);
            PetItem::create(["name"=>strtoupper($request->name), "details"=>$request->details, "category_id"=>$request->category_id, "value"=>$request->value, "rating"=>$request->rating, "image"=>$path]);
            return back()->with('success', 'Pet Item created successfully!');
        /* } catch (\Throwable $th) {
            return back()->with('danger', 'Pet Item was not create!');
        } */
    }

    public function list()
    {
        try {
            $data = []; //to be sent to the view
            $data["title"] = "List product";
            $data["petItems"] = PetItem::all()->sortBy('id');
            return view('admin.petItem.list')->with("data", $data);
        } catch (\Throwable $th) {
            return back()->with('danger', 'the list was not found!');
        }
    }

    public function delete($id)
    {
        try {
            PetItem::destroy($id);
            return redirect()->route('admin.petItem.list')->with('success', 'PetItem deleted succesfully!');
        } catch (\Throwable $th) {
            return back()->with('danger', 'Pet Item was not delete!');
        }
    }
}
