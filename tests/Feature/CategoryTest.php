<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;
use Database\Seeders\ProductSeeder;
use App\Models\Scopes\IsActiveScope;
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

    public function testCreate(){
        $request=[
            "id" => "DRINK",
            "name" => "Drink",
            "description" => "Drink Category"
        ];

        $category=new Category($request);
        $category->save();

        self::assertNotNull($category->id);
    }

    public function testCreateMethod(){
        $request=[
            "id" => "BEAUTY",
            "name" => "Beauty",
            "description" => "Beauty Category"
        ];
    
        $category=Category::query()->create($request);

        self::assertNotNull($category->id);
    }

    public function testUpdateMass(){
        $this->seed(CategorySeeder::class);
        
        $request=[
            "name" => "Music Updated",
            "description" => "Music Category Updated"
        ];

        $category=Category::find("MUSIC");
        $category->fill($request);
        $category->save();

        self::assertNotNull($category->id);
    }

    public function testGlobalScope(){
        $category=new Category();
        $category->id="FOOD";
        $category->name="Food";
        $category->description="Food Category";
        // $category->is_active=true;
        $category->save();

        $category=Category::find("FOOD");
        self::assertNull($category);

        // $category=Category::withoutGlobalScopes([IsActiveScope::class])->find("FOOD");
        // self::assertNotNull($category);
    }

    public function testOneToMany(){
        $this->seed([CategorySeeder::class, ProductSeeder::class]);

        $category=Category::find("MUSIC");
        self::assertNotNull($category);

        $products=$category->products;
        self::assertNotNull($products);
        self::assertCount(1, $products);
    }

    public function testOneToManyQuery(){
        $category=new Category();
        $category->id="FOOD";
        $category->name="Food";
        $category->description="Food Category";
        $category->is_active=true;
        $category->save();

        $product=new Product();
        $product->id="2";
        $product->name="Product 2";
        $product->description="Description 2";

        $category->products()->save($product);

        self::assertNotNull($product->category_id);
    }

    public function testRelationshipQuery(){
        $this->seed([CategorySeeder::class, ProductSeeder::class]);

        $category=Category::find("MUSIC");
        $products=$category->products;
        $outOfStockProducts=$category->products()->where("stock","<=", 0)->get();
        self::assertCount(1, $outOfStockProducts);
    }
}
