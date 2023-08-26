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
        $category->id="MUSIC";
        $category->name="Music";
        $category->description="Music Category";
        $category->save();
    }
}
