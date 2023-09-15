<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VirtualAccount extends Model
{
    protected $table="virtual_accounts",
              $primaryKey="id",
              $keyType="int";

    public  $incrementing=true,
            $timestamps=false;
            
    public function wallet(){
        return $this->belongsTo(Wallet::class,"wallet_id","id");
    }
}
