<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category=new Category();
        $category->id="FOOD";
        $category->name="Food";
        $category->description="Food Category";
        $category->is_active=true;
        $category->save();

        $category2=new Category();
        $category2->id="FASHION";
        $category2->name="Fashion";
        $category2->is_active=true;
        $category2->save();

        $category3=new Category();
        $category3->id="ELEKTRONIK";
        $category3->name="Elektronik";
        $category3->is_active=true;
        $category3->save();

        $category4=new Category();
        $category4->id="MUSIC";
        $category4->name="Music";
        $category4->description="Music Description";
        $category4->is_active=true;
        $category4->save();
    }
}
