<?php

/*
|--------------------------------------------------------------------------
| Author: Anthony Garcia Moncada
| Email:  agarciam@eafit.edu.co
|--------------------------------------------------------------------------
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\PetItem;
use phpDocumentor\Reflection\Types\This;

class Item extends Model
{
    protected $fillable = ['quantity', 'value'];

    public static function validate(Request $request)
    {
        $request->validate([
            "quantity" => "numeric|required",
            "value" => "numeric|required"
        ]);
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getQuantity()
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity($quantity)
    {
        $this->attributes['quantity'] = $quantity;
    }

    public function getValue()
    {
        return $this->attributes['value'];
    }

    public function setValue($value)
    {
        $this->attributes['value'] = $value;
    }

    public function getPetItemId()
    {
        return $this->attributes['pet_item_id'];
    }

    public function setPetItemId($pet_item_id)
    {
        $this->attributes['pet_item_id'] = $pet_item_id;
    }

    public function getOrderId()
    {
        return $this->attributes['order_id'];
    }

    public function setOrderId($order_id)
    {
        $this->attributes['order_id'] = $order_id;
    }

    public function petItem()
    {
        return $this->belongsTo(PetItem::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}