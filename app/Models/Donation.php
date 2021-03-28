<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Donation extends Model
{
    use HasFactory;

    //attributes id, payment method, value, foundation_id
    protected $fillable = ['payment','value','foundation_id'];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getPayment()
    {
        return $this->attributes['payment'];
    }

    public function setPayment($payment)
    {
        $this->attributes['payment'] = $payment;
    }

    public function getValue()
    {
        return $this->attributes['value'];
    }

    public function setValue($value)
    {
        $this->attributes['value'] = $value;
    }    

    public function getFoundationId()
    {
        return $this->attributes['foundation_id'];
    }

    public function setFoundationId($foundationId)
    {
        $this->attributes['foundation_id'] = $foundationId;
    }

    public function foundation() // RELACIÓN, una donación solo pertenece a una fundación
    {
        return $this->belongsTo(Foundation::class);
    }

    public static function validate(Request $request)
    {
        $request->validate([
            "payment" => "required",
            "value" => "required|numeric|gt:0",
            "foundation_id" => "required"
        ]);
    }
}
