<?php

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
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
       DB::table('users')->insert([
            'name' => 'Arman',
            'email' => 'armanhassan@gmail.com',
            'password' => '$2y$12$LmgInqxLsw/w5BsoUtsTuuIB6N204AyfOorowGWzXkc63qzqn/1a. ', //armanhassan504
        ]);
    }
}
