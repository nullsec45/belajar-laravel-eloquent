<?php

namespace Database\Seeders;

use App\Models\Wallet;
use App\Models\VirtualAccount;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VirtualAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wallet=Wallet::query()->where("customer_id","FAJAR")->firstOrFail();

        $virtualAccount=new VirtualAccount();
        $virtualAccount->bank="BCA";
        $virtualAccount->va_number="311451056015190451945189";
        $virtualAccount->wallet_id=$wallet->id;
        $virtualAccount->save();
    }
}
