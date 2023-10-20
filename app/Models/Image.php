<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table="images",
              $primaryKey="id",
              $keyType="int";

    public $incrementing=true,
           $timestamps=false;

    
    public function imageable():MorphTo{
            return $this->morphTo();
    }

}
