<?php

use Illuminate\Database\Seeder;

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
                'firstname' => 'Adeleke',
                'lastname' => 'Alice',
                'phone_number' => '08139160110',
                'email' => 'customer1@gmail.com'
            ]);

            DB::table('customers')->insert([
                'firstname' => 'Taofeek',
                'lastname' => 'Olalere',
                'phone_number' => '07085516354',
                'email' => 'customer2@gmail.com'
            ]);

            DB::table('customers')->insert([
                'firstname' => 'Abiodun',
                'lastname' => 'Olamilekan',
                'phone_number' => '09088787665',
                'email' => 'customer3@gmail.com'
            ]);
        }
    }
}
