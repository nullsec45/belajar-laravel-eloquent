<?php

namespace App\Models;

use App\Models\Like;
use Illuminate\Support\Facades\Date;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $table="customers",
              $primaryKey="id";
    
    public $incrementing=false,
           $timestamps=false;
    
    public function wallet(){
        return $this->hasOne(Wallet::class,"customer_id","id");
    }

    public function virtualAccount(){
        return $this->hasOneThrough(VirtualAccount::class, Wallet::class,"customer_id","wallet_id","id","id");
    }

    public function reviews(){
        return $this->hasMany(Review::class, "customer_id","id");
    }

    public function likeProducts(){
        return $this->belongsToMany(Product::class,"customers_likes_products","customer_id","product_id")
                    ->withPivot("created_at")
                    ->using(Like::class);
    }

    public function likeProductsLastWeek(){
        return $this->belongsToMany(Product::class,"customers_likes_products","customer_id","product_id")
               ->withPivot("created_at")
               ->wherePivot("created_at",">=", Date::now()->addDays(-7));
    }
}
