<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Елизавета',
            'surname' => 'Гольцман',
            'middle_name' => 'Викторовна',
            'email' => 'liza-golsman@mail.ru',
            'password' => Hash::make('123123123'), // Пароль админки
            'created_at' => now(),
            'email_verified_at' => now(),
        ]);
    }
}
