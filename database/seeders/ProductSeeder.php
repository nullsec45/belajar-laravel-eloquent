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
        $product->description="Description Product 1";
        $product->price=2000000;
        $product->category_id="FOOD";
        $product->save();

        $product2=new Product();
        $product2->id="2";
        $product2->name="Product 2";
        $product2->description="Description Product 2";
        $product2->price=9000000;
        $product2->category_id="FOOD";
        $product2->save();

        $product3=new Product();
        $product3->id="3";
        $product3->name="Product 3";
        $product3->description="Description Product 3";
        $product3->price=9000000;
        $product3->category_id="MUSIC";
        $product3->save();
    }
}
