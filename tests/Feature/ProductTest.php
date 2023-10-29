<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;
use Database\Seeders\TagSeeder;
use Database\Seeders\ImageSeeder;
use Database\Seeders\CommentSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\VoucherSeeder;
use Database\Seeders\CategorySeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    public function testBelongsToMany(){
        $this->seed([CategorySeeder::class, ProductSeeder::class]);

        $product=Product::find(1);
        self::assertNotNull($product);

        $category=$product->category;
        self::assertNotNull($category);
        self::assertEquals("MUSIC", $category->id);
    }

    public function testHasOneOfMany(){
        $this->seed([CategorySeeder::class, ProductSeeder::class]);

        $category=Category::find("MUSIC");
        self::assertNotNull($category);

        $cheapestProduct=$category->cheapestProduct;
        self::assertNotNull($cheapestProduct);
        self::assertNotNull("1", $cheapestProduct->id);

        $mostExpensiveProduct=$category->mostExpensiveProduct;
        self::assertNotNull($mostExpensiveProduct);
        self::assertNotNull("1", $mostExpensiveProduct->id);
    }

    public function testOneToOnePolymorphic(){
        $this->seed([CategorySeeder::class, ProductSeeder::class, ImageSeeder::class]);

        $product=Product::find("1");
        self::assertNotNull($product);

        $image=$product->image;
        self::assertNotNull($image);
        self::assertEquals("https://w7.pngwing.com/pngs/866/528/png-transparent-php-web-development-perl-logo-php-logo-cdr-text-trademark-thumbnail.png", $image->url);
    }

    public function testOneToManyPolymorphic(){
        $this->seed([CategorySeeder::class, ProductSeeder::class, VoucherSeeder::class, CommentSeeder::class]);

        $product=Product::find("1");
        self::assertNotNull($product);

        $comments=$product->comments;
        foreach($comments as $comment){
            self::assertEquals(Product::class, $comment->commentable_type);
            self::assertEquals($product->id, $comment->commentable_id);
        }
    }

    public function testOneOfManyPolymorphic(){
        $this->seed([CategorySeeder::class, ProductSeeder::class, VoucherSeeder::class, CommentSeeder::class]);

        $product=Product::find("1");
        self::assertNotNull($product);

        $lastComment=$product->latestComment();
        self::assertEquals($lastComment);

        $oldestComment=$product->oldestComment();
        self::assertEquals($oldestComment);
    }

    public function testManyToManyPolymorphic(){
        $this->seed([CategorySeeder::class, ProductSeeder::class, VoucherSeeder::class, CommentSeeder::class, TagSeeder::class]);
        
        $product=Product::find("1");
        $tags=$product->tags;

        self::assertNotNull($tags);
        self::assertCount(1, $tags);

        foreach($tags as $tag){
            self::assertNotNull($tag->id);
            self::assertNotNull($tag->name);

            $vouchers=$tag->vouchers;
            self::assertNotNull($vouchers);
            self::assertCount(1, $vouchers);
        }
    }

    public function testEloquentCollection(){
        $this->seed([CategorySeeder::class, ProductSeeder::class]);

        $products=Product::query()->get();

        $products=$products->toQuery()->where("price", 2000000)->get();

        self::assertNotNull($products);

        self::assertEquals("1", $products[0]->id);
    }
}
