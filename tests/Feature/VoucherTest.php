<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Voucher;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VoucherTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    public function setUp():void{
        // Voucher::delete();
        parent::setUp();
        DB::delete("delete from vouchers");
    }
    
    public function testCreateVoucher(){
        $voucher=new Voucher();
        $voucher->name="Sample Voucher";
        // $voucher->voucher_code="GRATISONGKIR1945";
        $voucher->save();

        self::assertNotNull($voucher->id);
        self::assertNotNull($voucher->voucher_code);
    }
}
