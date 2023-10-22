<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function likedByCustomers(){
        return $this->belongsToMany(Customer::class,"customers_likes_products","product_id","customer_id")->withPivot("created_at");
    }

    public function image(){
        return $this->morphOne(Image::class,"imageable");
    }

    public function comments(){
        return $this->morphMany(Comment::class,"commentable");
    }

    public function latestComment(){
        return $this->morphOne(Comment::class, "commentable")->latest("created_at");
    }

    public function oldestComment(){
        return $this->morphOne(Comment::class, "commentable")->oldest("created_at");
    }

    public function tags(){
        return $this->morphToMany(Tag::class, "taggable");
    }
}
