<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $table="wallets",
              $primaryKey="id",
              $keyType="string";
    
    public $incrementing=false, $timestamps=false;

    public function customer()
    {
        return $this->belongsTo(Customer::class,"customer_id","id");
    }
}
