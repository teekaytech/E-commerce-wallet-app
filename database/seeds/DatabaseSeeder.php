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
            for ($i = 1; $i <= 3; $i++) {
                DB::table('customers')->insert([
                    'firstname' => Str::random(10),
                    'lastname' => Str::random(10),
                    'phone_number' => '08139160110',
                    'email' => 'customer'.$i.'@gmail.com',
                    'created_at' => now(),
                    'updated_at' => now()
                ]);

                DB::table('wallets')->insert([
                    'code' => 'WT'.$i,
                    'customer_id' => $i,
                    'created_at' => now(),
                    'updated_at' => now(),
                    'balance' => 0,
                ]);
            }
        }
    }
}
