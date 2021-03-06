<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Category extends Model
{

    //attributes id, name, Items, created_at, updated_at

    protected $fillable = [
        'name',
        'items',
    ];

    public static function validate(Request $request)
    {

        $request->validate(
            [
            "name" => "required",
            ]
        );
    }


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

    public function pet_items()
    {
        return $this->hasMany(PetItem::class, 'category_id');
    }
}
