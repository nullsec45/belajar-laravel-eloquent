<?php

namespace App\Models;

use App\Models\Scopes\IsActiveScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    protected $table="categories", 
              $primaryKey="id",
              $keyType="string",
              $fillable=["id","name","description"];

    public $incrementing=false, $timestamps=false;

    protected static function booted():void{
        parent::booted();
        self::addGlobalScope(new IsActiveScope());
    }

    public function products(){
        return $this->hasMany(Product::class,"category_id","id");
    }

    public function cheapestProduct() {
        return $this->hasOne(Product::class,"category_id","id")->oldest("price");
    }

    public function mostExpensiveProduct(){
        return $this->hasOne(Product::class,"category_id","id")->latest("price");
    }
}
