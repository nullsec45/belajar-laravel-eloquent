<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;
use Database\Seeders\ImageSeeder;
use Database\Seeders\ProductSeeder;
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
}
