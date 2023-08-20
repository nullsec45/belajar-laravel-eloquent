<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Voucher extends Model
{
    // use HasFactory;
    use HasUuids;

    protected $table="vouchers",
              $primaryKey="id",
              $keyType="string";

    public $incrementing=false,
           $timestamps=false;

    public function uniqueIds():array{
        return [$this->primaryKey, "voucher_code"];
    }
}
