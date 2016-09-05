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
                )
            )
        );
    }
}
