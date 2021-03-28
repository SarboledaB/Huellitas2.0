<?php

namespace App\Models;

// use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Foundation extends Model
{
    use HasFactory;

    //attributes id, name, email, description
    protected $fillable = ['name','email','description'];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }

    public function getEmail()
    {
        return $this->attributes['email'];
    }

    public function setEmail($email)
    {
        $this->attributes['email'] = $email;
    }

    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($description)
    {
        $this->attributes['description'] = $description;
    }

    public function donations() // Relación, una fundación tiene muchas donaciones
    {
        return $this->hasMany(Donation::class);
    }

    public static function validate(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required",
            "description" => "required"
        ]);
    }
}
