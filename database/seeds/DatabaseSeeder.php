<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        {
            DB::table('customers')->insert([
                'firstname' =>'Taofeek',
                'lastname' => 'Olalere',
                'phone_number' => '07085516354',
                'email' => 'customer1@gmail.com',
                'created_at' => now(),
                'updated_at' => now()
            ]);

            DB::table('customers')->insert([
                'firstname' => 'Abiodun',
                'lastname' => 'Olamilekan',
                'phone_number' => '08139160110',
                'email' => 'customer2@gmail.com',
                'created_at' => now(),
                'updated_at' => now()
            ]);

            DB::table('wallets')->insert([
                'code' => 'WT1',
                'customer_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'balance' => 0,
            ]);

            DB::table('wallets')->insert([
                'code' => 'WT2',
                'customer_id' => 11,
                'created_at' => now(),
                'updated_at' => now(),
                'balance' => 0,
            ]);
        }
    }
}
