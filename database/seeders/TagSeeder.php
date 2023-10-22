<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Product;
use App\Models\Voucher;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tag=new Tag();
        $tag->id="fajar";
        $tag->name="Rama Fajar";
        $tag->save();

        $product=Product::find("1");
        $product->tags()->attach($tag);

        $voucher=Voucher::query()->first();
        $voucher->tags()->attach($tag);
    }
}
