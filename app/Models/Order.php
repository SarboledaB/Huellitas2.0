<?php

/*
|--------------------------------------------------------------------------
| Author: Anthony Garcia Moncada
| Email:  agarciam@eafit.edu.co
|--------------------------------------------------------------------------
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\User;
use phpDocumentor\Reflection\Types\This;

class Order extends Model
{
    protected $fillable = ['status', 'total', 'payment'];

    public static function validate(Request $request)
    {
        $request->validate([
            "status" => "required|boolean",
            "total" => "required|numeric",
            "payment" => "required"
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

    public function getStatus()
    {
        return $this->attributes['status'];
    }

    public function setStatus($status)
    {
        $this->attributes['status'] = $status;
    }

    public function getTotal()
    {
        return $this->attributes['total'];
    }

    public function setTotal($total)
    {
        $this->attributes['total'] = $total;
    }

    public function getPayment()
    {
        return $this->attributes['payment'];
    }

    public function setPayment($payment)
    {
        $this->attributes['payment'] = $payment;
    }

    public function getUserId()
    {
        return $this->attributes['user_id'];
    }

    public function setUserId($user)
    {
        $this->attributes['user_id'] = $user;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }


}