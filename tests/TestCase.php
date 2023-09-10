<?php

namespace Tests;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp():void{
        parent::setUp();

        DB::delete("DELETE FROM products");
        DB::delete("DELETE FROM categories");
        DB::delete("DELETE FROM vouchers");
        DB::delete("DELETE FROM wallets");
        DB::delete("DELETE FROM customers");
    }
}
