<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Voucher;
use Illuminate\Support\Facades\DB;
use Database\Seeders\VoucherSeeder;
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

    public function testSoftDelete(){
        $this->seed(VoucherSeeder::class);

        $voucher=Voucher::query()->where("name","Sample Voucher 3")->first();
        $voucher->delete();

        $voucher=Voucher::query()->where("name","Sample Voucher 3")->first();
        self::assertNull($voucher);

        $voucher=Voucher::withTrashed()->where("name","Sample Voucher 3")->first();
        self::assertNotNull($voucher);
    }
}
