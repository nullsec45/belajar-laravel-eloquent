<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

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
}
