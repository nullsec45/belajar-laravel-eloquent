<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Category;
use Database\Seeders\CategorySeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    public function testInsert(){
        $category=new Category();
        $category->id="GADGET";
        $category->name="Gadget";
        $category->description="Gadget Description";
        $result=$category->save();

        self::assertTrue($result);
    }

    public function testInsertMany(){
        $categories=[];

        for($i=0;$i<10;$i++){
            $categories[]=[
                "id" => "ID $i",
                "Name" => "Name $i"
            ];
        }

        $result=Category::insert($categories);

        $total=Category::count();
        
        self::assertEquals(10, $total);
    }

    public function testFind(){
        $this->seed(CategorySeeder::class);

        $category=Category::find("FOOD");
        self::assertNotNull($category);
        self::assertEquals("FOOD", $category->id);
        self::assertEquals("Food", $category->name);
        self::assertEquals("Food Category", $category->description);
    }

    public function testUpdate(){
        // $this->seed(CategorySeed::class);

        $category=Category::find("FOOD");
        $category->name="Food Updated";
        
        $result=$category->update();
        self::assertTrue($result);
    }

    public function testSelect(){
        for($i=0;$i < 5;$i++){
            $category=new Category();
            $category->id="$i";
            $category->name="Category $i";
            $category->save();
        }

        $categories=Category::whereNull("description")->get();
        self::assertEquals(15, $categories->count());

        $categories->each(function($category){
            self::assertNull($category->description);
        });
    }

    public function testUpdateMany(){
        Category::whereNull("description")->update([
            "description" => "Updated"
        ]);
        $total=Category::where("description","=","Updated")->count();
        self::assertEquals(15, $total);
    }

    public function testDelete(){
        $category=Category::where("description","Updated");
        $result=$category->delete();

        self::assertTrue($result);
        $total=Category::count();

        self::assertEquals(2, $total);
    }

    public function testDeleteMany(){
        $categories=[];

        for($i=0;$i < 10;$i++){
            $categories[]=[
                "id" => $i,
                "name" => "Category $i"
            ];
        }
        $result=Category::insert($categories);
        self::assertTrue($result);

        $total=Category::count();
        self::assertEquals(12,$total);

        Category::whereNull("description")->delete();
        $total=Category::count();

        self::assertEquals(2, $total);
    }
}
