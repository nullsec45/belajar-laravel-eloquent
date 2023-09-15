<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Wallet;
use App\Models\Customer;
use Database\Seeders\WalletSeeder;
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
}
