<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customer=new Customer();
        $customer->id="FAJAR";
        $customer->name="Fajar";
        $customer->email="ramafajar805@gmail.com";
        $customer->save();
    }
}
