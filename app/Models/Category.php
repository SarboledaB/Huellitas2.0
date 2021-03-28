<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Category extends Model
{

    //attributes id, name, Items, value, rating, created_at, updated_at

    protected $fillable = [
        'name',
        'items',
    ];

    public static function validate(Request $request){
        $request->validate([
            "name" => "required",
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

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }

    public function getItems()
    {
        return $this->attributes['items'];
    }

    public function setItems($items)
    {
        $this->attributes['items'] = $items;
    }

    public function pet_items()
    {
        return $this->hasMany(PetItem::class, 'category_id');
    }

}
