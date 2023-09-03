<?php

namespace Database\Seeders;

use App\Models\Wallet;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wallet=new Wallet();
        $wallet->amount=1000000;
        $wallet->customer_id="FAJAR";
        $wallet->save();
    }
}
