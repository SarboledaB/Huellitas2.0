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

    public function __construct()
    {
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
        $breadlist = array();
        $breadlist[0] = array('Home', "user.petItem.list", null, "0");
        $breadlist[1] = array('Create Product', "admin.petItem.create", null, "1");
        $data["breadlist"] = $breadlist;

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
            $breadlist = array();
            $breadlist[0] = array('Home', "user.petItem.list", null, "0");
            $breadlist[1] = array('List Products', "admin.petItem.list", null, "1");
            $data["breadlist"] = $breadlist;

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

    public function updateForm($id)
    {
        $data["petItem"] = PetItem::findOrFail($id);
        $data["title"] = $data["petItem"]->name;
        $data["categories"] = Category::all();
        return view('admin.petItem.update')->with("data", $data);
    }

    public function update(Request $request)
    {
        try{
            $petItem = PetItem::find($request->id);
            $petItem->setName($request->name);
            $petItem->setDetails($request->details);
            $petItem->setCategory($request->category_id);
            $petItem->getValue($request->value);
            $petItem->setRating($request->rating);
            $petItem->save();
            return back()->with('success', 'The petItem was updated successfully!');
        } catch(\Throwable $th){
            return back()->with('danger', 'Error, could not donate!');
        }

    }
}
