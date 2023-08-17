<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table="categories", $primaryKey="id", $keyType="string";

    public $incrementing=false, $timestamps=false;
}
