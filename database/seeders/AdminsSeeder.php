<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Елизавета',
            'surname' => 'Гольцман',
            'email' => 'liza-golsman@mail.ru',
            'password' => Hash::make('123123123'), // Мой пароль хыхыхыхыхы
            'created_at' => now(),
        ]);
    }
}
