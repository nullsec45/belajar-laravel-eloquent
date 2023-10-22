<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table="tags",
              $primaryKey="id",
              $keyType="string";

    public $incrementing=false,
           $timestamps=false;

    public function products(){
        return $this->morphedToByMany(Product::class,"taggable");
    }

    public function vouchers(){
        return $this->morphedByMany(Voucher::class,"taggable");
    }
}
