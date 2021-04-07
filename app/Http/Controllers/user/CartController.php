<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Item;
use App\Models\PetItem;
use Illuminate\Support\Facades\Auth;
use PhpOption\None;

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

    public function remove($id, Request $request)
    {
        $request->session()->forget('products');
        return back();
    }

    public function buy(Request $request)
    {
        $data = []; //to be sent to the view
        $data["title"] = "Buy";
        $order = new Order();
        $order->setTotal(0);
        $order->setStatus(0);
        $order->setPayment('');
        $order->setUserId(Auth::id());
        $order->save();

        $total = 0;
        $ids = $request->session()->get("products");
        if($ids){
            $listProductsInCart = PetItem::findMany($ids);
            foreach ($listProductsInCart as $product) {
                $item = new Item();
                $item->setQuantity(1);
                $item->setvalue($product->getValue());
                $item->setPetItemId($product->getId());
                $item->setOrderId($order->getId());
                $item->save();
                $total = $total + $product->getValue();
            }
        }

        $order->setTotal($total);
        $order->save();

        dd($order);
    }
}
