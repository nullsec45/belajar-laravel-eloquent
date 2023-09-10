<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product=new Product();
        $product->id="1";
        $product->name="Product 1";
        $product->description="Description Prodcut 1";
        $product->price=888888;
        $product->category_id="MUSIC";
        $product->save();

        $product2=new Product();
        $product2->id="2";
        $product2->name="Product 2";
        $product2->description="Description Prodcut 2";
        $product2->price=9999999;
        $product2->category_id="MUSIC";
        $product2->save();
    }
}
