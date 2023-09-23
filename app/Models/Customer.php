<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsToMany(Product::class,"customers_likes_products","customer_id","product_id")->withPivot("created_at");
    }
}
