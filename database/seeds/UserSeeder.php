<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            array(
                array(
                    'name'       => env('NAME', 'Christan Jake Gatchalian'),
                    'email'      => env('EMAIL', 'cgatchalian@excelasiasolutions.com'),
                    'password'   => bcrypt(env('PASS', 'admin123')),
                    'role'       => env('ROLE', 'super_admin'),
                    'created_at' => date('Y-m-d h:i:s'),
                    'updated_at' => date('Y-m-d h:i:s')
                ),
                array(
                    'name'       => env('NAME', 'Test Admin'),
                    'email'      => env('EMAIL', 'test_admin@yahoo.com.com'),
                    'password'   => bcrypt(env('PASS', 'admin123')),
                    'role'       => env('ROLE', 'admin'),
                    'created_at' => date('Y-m-d h:i:s'),
                    'updated_at' => date('Y-m-d h:i:s')
                ),
                array(
                    'name'       => env('NAME', 'Tester Assistant'),
                    'email'      => env('EMAIL', 'tester_assistant@yahoo.com'),
                    'password'   => bcrypt(env('PASS', 'admin123')),
                    'role'       => env('ROLE', 'assistant'),
                    'created_at' => date('Y-m-d h:i:s'),
                    'updated_at' => date('Y-m-d h:i:s')
                ),
                array(
                    'name'       => env('NAME', 'Tester Collection'),
                    'email'      => env('EMAIL', 'tester_collection@yahoo.com'),
                    'password'   => bcrypt(env('PASS', 'admin123')),
                    'role'       => env('ROLE', 'collection'),
                    'created_at' => date('Y-m-d h:i:s'),
                    'updated_at' => date('Y-m-d h:i:s')
                ),
                array(
                    'name'       => env('NAME', 'Tester Sales Engineer'),
                    'email'      => env('EMAIL', 'tester_sales_e@yahoo.com'),
                    'password'   => bcrypt(env('PASS', 'admin123')),
                    'role'       => env('ROLE', 'user'),
                    'created_at' => date('Y-m-d h:i:s'),
                    'updated_at' => date('Y-m-d h:i:s')
                ),
            )
        );
    }
}
