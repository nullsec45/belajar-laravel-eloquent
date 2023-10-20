<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Customer;
use Database\Seeders\ImageSeeder;
use Database\Seeders\CustomerSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class testOneToOnePolymorphic extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testOneToOnePolymorphic(){
        $this->seed([CustomerSeeder::class, ImageSeeder::class]);

        $customer=Customer::find("FAJAR");
        echo $customer;
        self::assertNotNull($customer);

        $image=$customer->image;
        self::assertNotNull($image);
        self::assertEquals("https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/985px-Laravel.svg.png", $image->url);
    }
}
