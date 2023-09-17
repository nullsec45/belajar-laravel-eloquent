<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $review=new Review();
        $review->product_id="1";
        $review->customer_id="FAJAR";
        $review->rating=5;
        $review->comment="Mantap Banget Bro";
        $review->save();

        $review2=new Review();
        $review2->product_id="1";
        $review2->customer_id="FAJAR";
        $review2->rating=4;
        $review2->comment="Kurang Garam";
        $review2->save();

    }
}
