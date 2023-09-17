<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table="products", 
              $primaryKey="id",
              $keyType="string";
            //   $fillable=["id","name","description"];

    public $timestamps=false;

    public function category(){
        return $this->belongsTo(Category::class,"category_id","id");
    }

    public function reviews(){
        return $this->hasMany(Review::class, "product_id","id");
    }
}
