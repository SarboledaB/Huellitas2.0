<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\PetItem;

class CartController extends Controller
{
    public function show(Request $request)
    {   
        $data = [];
        $data["title"] = "Cart Products";
        $listProductsInCart = array();
        $ids = $request->session()->get("products");
        if($ids){
            $listProductsInCart = PetItem::findMany($ids);
        }
        $data["products"] = $listProductsInCart;
        return view('user.cart.show')->with("data", $data);

    }


    public function add($id, Request $request)
    {   
        $products = $request->session()->get("products"); 
        $products[$id] = $id;
        $request->session()->put('products', $products);
        return back();     
    }

    public function removeAll(Request $request)
    {
        $request->session()->forget('products');
        return back();
    }
}
