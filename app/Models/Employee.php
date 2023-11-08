<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table="employee",
              $primaryKey="id",
              $keyType="string";
              
    public   $incrementing=false,
             $timestamps=true;
            
}
