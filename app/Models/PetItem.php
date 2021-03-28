<?php
/*
|--------------------------------------------------------------------------
| Author: Sebastian Arboleda Botero
| Email:  sarboledab@eafit.edu.co
|--------------------------------------------------------------------------
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PetItem extends Model
{

    //attributes id, name, details,category, value, rating, created_at, updated_at

    protected $fillable = [
        'name',
        'category_id',
        'image',
        'details',
        'value',
        'rating'
    ];

    public static function validate(Request $request){
        $request->validate([
            "name" => "required",
            "details" => "required",
            "image" => "required",
            "category_id" => "required|numeric",
            "value" => "required|numeric|gt:0",
            "rating" => "required|numeric|gt:0"
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

    public function getCategory()
    {
        return $this->attributes['category_id'];
    }

    public function setCategory($category)
    {
        $this->attributes['category_id'] = $category;
    }

    public function getDetails()
    {
        return $this->attributes['details'];
    }

    public function setDetails($Details)
    {
        $this->attributes['details'] = $Details;
    }

    public function getValue()
    {
        return $this->attributes['value'];
    }

    public function setValue($value)
    {
        $this->attributes['value'] = $value;
    }

    public function getImage()
    {
        return $this->attributes['image'];
    }

    public function setImage($image)
    {
        $this->attributes['image'] = $image;
    }

    public function getRating()
    {
        return $this->attributes['rating'];
    }

    public function setRating($rating)
    {
        $this->attributes['rating'] = $rating;
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
