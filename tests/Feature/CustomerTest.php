<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Wallet;
use App\Models\Customer;
use Database\Seeders\ImageSeeder;
use Database\Seeders\WalletSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\CustomerSeeder;
use Database\Seeders\VirtualAccountSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
   public function testOneToOneQuery(){
        $customer=new Customer();

        $customer->id="FAJAR";
        $customer->name="Fajar";
        $customer->email="fajar@gnail.com";
        $customer->save();

        $wallet=new Wallet();
        $wallet->amount=90000000;

        $customer->wallet()->save($wallet);

        self::assertNotNull($wallet->customer_id);
   }

   public function testHasOneThrough(){
     $this->seed([CustomerSeeder::class, WalletSeeder::class, VirtualAccountSeeder::class]);

     $customer=Customer::query()->find("FAJAR");
     self::assertNotNull($customer);

     $virtualAccount=$customer->virtualAccount;
     self::assertNotNull($virtualAccount);
     self::assertEquals("BCA", $virtualAccount->bank);
     
   }

   public function testManyToMany(){
    $this->seed([CustomerSeeder::class, CategorySeeder::class, ProductSeeder::class]);
    
    $customer=Customer::find("FAJAR");
    self::assertNotNull($customer);

    $customer->likeProducts()->attach("1");

    $products=$customer->likeProducts;
    self::assertCount(1, $products);

    self::assertEquals("1", $products[0]->id);
  }

  public function testManyToManyDetach(){
      $this->testManyToMany();

      $customer=Customer::find("FAJAR");
      $customer->likeProducts()->detach("1");

      $products=$customer-A>likeProducts;
      self::assertCount(0, $products);
  }

  public function testPivotAttribute(){
    $this->testManyToMany();

    $customer=Customer::find("FAJAR");
    $products=$customer->likeProducts;

    foreach($products as $product){
      $pivot=$product->pivot;
      echo $pivot;

      self::assertNotNull($pivot);
      self::assertNotNull($pivot->customer_id);
      self::assertNotNull($pivot->product_id);
      self::assertNotNull($pivot->created_at);
    }
  }

  public function testPivotAttributeCondition(){
    $this->testManyToMany();

    $customer=Customer::find("FAJAR");
    $products=$customer->likeProductsLastWeek;

    foreach($products as $product){
      $pivot=$product->pivot;
      echo $pivot;

      self::assertNotNull($pivot);
      self::assertNotNull($pivot->customer_id);
      self::assertNotNull($pivot->product_id);
      self::assertNotNull($pivot->created_at);
    }
  }

  public function testPivotModel(){
    $this->testManyToMany();

    $customer=Customer::find("FAJAR");
    $products=$customer->likeProducts;

    foreach($products as $product){
      $pivot=$product->pivot;

      self::assertNotNull($pivot);
      self::assertNotNull($pivot->customer_id);
      self::assertNotNull($pivot->product_id);
      self::assertNotNull($pivot->created_at);
     
      self::assertNotNull($pivot->customer);
      self::assertNotNull($pivot->product);
    }
  }

  public function testEagerLoading(){
    $this->seed([CustomerSeeder::class, WalletSeeder::class, ImageSeeder::class]);


    $customer=Customer::with(["wallet","image"])->find("FAJAR");
    self::assertNotNull($customer);
    self::assertNotNull($customer->wallet);
  }

  public function testEagerModel(){
    $this->seed([CustomerSeeder::class, WalletSeeder::class, ImageSeeder::class]);


    $customer=Customer::find("FAJAR");
    echo $customer;
    self::assertNotNull($customer);
    self::assertNotNull($customer->wallet);
  }

 
}
