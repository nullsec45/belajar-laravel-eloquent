<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table="comments",
              $primaryKey="id",
              $keyType="string",
              $attributes=[
                "title" => "Sample Title",
                "comment" => "Sample Comment"
            ];

    public $incrementing=true,
            $timestamps=true;
}
