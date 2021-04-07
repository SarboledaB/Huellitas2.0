<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    /* public function show($id)
    {
        try {
            $data = []; //to be sent to the view
            $Category = Category::findOrFail($id);
            $data["title"] = $Category->getName();
            $data["Category"] = $Category;
            return view('Category.show')->with("data", $data);
        } catch (\Throwable $th) {
            return back()->with('danger', 'Pet Item not found!');
        }
    } */

    public function create()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Create category";
        return view('admin.category.create')->with("data", $data);
    }

    public function save(Request $request)
    {
            Category::validate($request);
            Category::create($request->only(["name"]));

            return back()->with('success', 'Category created successfully!');
    }

    public function list()
    {
        /* try { */
            $data = []; //to be sent to the view
            $data["title"] = "List Categories";
            $data["categories"] = Category::all()->sortBy('id');
            return view('admin.category.list')->with("data", $data);
        /* } catch (\Throwable $th) {
            return back()->with('danger', 'the list was not found!');
        } */
    }

    public function delete($id)
    {
        try {
            Category::destroy($id);
            return redirect()->route('admin.category.list')->with('success', 'Category deleted succesfully!');
        } catch (\Throwable $th) {
            return back()->with('danger', 'Category was not delete!');
        }
    }
}
