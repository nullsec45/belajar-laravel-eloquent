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
}
