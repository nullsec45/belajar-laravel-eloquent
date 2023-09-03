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
}
