<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       {
        $image=new Image();
        $image->url="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/985px-Laravel.svg.png";
        $image->imageable_id="FAJAR";
        $image->imageable_type=Customer::class;
        $image->save();
       }
       {
        $image=new Image();
        $image->url="https://w7.pngwing.com/pngs/866/528/png-transparent-php-web-development-perl-logo-php-logo-cdr-text-trademark-thumbnail.png";
        $image->imageable_id="1";
        $image->imageable_type=Product::class;
        $image->save();
       }

    }
}
