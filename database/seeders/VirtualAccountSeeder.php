<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
