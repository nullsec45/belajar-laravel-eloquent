<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table="reviews",
              $primaryKey="id",
              $keyType="integer";
    
    public $incrementing=true,
            $timestamps=false;

    public function product(){
        return $this->belongsTo(Product::class,"product_id","id");
    }

    public function customer(){
        return $this->belongsTo(Customer::class,"customer_id","id");
    }
}
