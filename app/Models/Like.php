<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Like extends Pivot
{
    protected $table="customers_likes_products",
              $foreignKey="customer_id",
              $relatedKey="product_id";
    
    public $timestamps=false;

    public function usesTimestamps():bool{
        return false;
    }

    public function customer(){
        return $this->belongsTo(Customer::class,"customer_id","id");
    }

    public function product(){
        return $this->belongsTo(Product::class,"product_id","id");
    }
}
