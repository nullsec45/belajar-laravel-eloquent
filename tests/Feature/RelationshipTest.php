<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Category;
use App\Models\Customer;
use Database\Seeders\ReviewSeeder;
use Database\Seeders\WalletSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\CustomerSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RelationshipTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testQueryOneToOne(){
        $this->seed(CustomerSeeder::class);
        $this->seed(WalletSeeder::class);

        $customer=Customer::query()->find("FAJAR");
        self::assertNotNull($customer);

        $wallet=$customer->wallet;
        self::assertNotNull($wallet);

        self::assertEquals(1000000, $wallet->amount);
    }

    public function testHasManyThrought(){
        $this->seed([CategorySeeder::class,ProductSeeder::class, CustomerSeeder::class, ReviewSeeder::class]);

        $category=Category::query()->find("FOOD");
        self::assertNotNull($category);

        $reviews=$category->reviews;
        self::assertNotNull($reviews);
        self::assertCount(2, $reviews);

    }
}
