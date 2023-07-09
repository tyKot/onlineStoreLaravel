<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'surname' => 'Иванов',
            'first_name' => 'Иван',
            'patronymic' => 'Иванович',
            'municipality' => 'Ульяновск',
            'locality' => 'Ульяновская область',
            'school' => 'Школа №65',
            'login' => 'user',
            'email' => 'example@mail.ru',
            'mili' => 150,
            'balance' => 2500,
            'is_admin' => null,
            'password' => Hash::make('user'),
        ]);
        DB::table('users')->insert([
            'surname' => 'Иванов',
            'first_name' => 'Иван',
            'patronymic' => 'Иванович',
            'municipality' => 'Ульяновск',
            'locality' => 'Ульяновская область',
            'school' => 'Школа №65',
            'login' => 'user1',
            'email' => 'example5@mail.ru',
            'mili' => 500,
            'balance' => 80,
            'is_admin' => null,
            'password' => Hash::make('user'),
        ]);
        DB::table('users')->insert([
            'surname' => 'Иванов',
            'first_name' => 'Иван',
            'patronymic' => 'Иванович',
            'municipality' => 'Ульяновск',
            'locality' => 'Санкт-Петербург',
            'school' => 'Школа №65',
            'login' => 'user2',
            'email' => 'example6@mail.ru',
            'is_admin' => null,
            'password' => Hash::make('user'),
        ]);
        DB::table('users')->insert([
            'surname' => 'Иванов',
            'first_name' => 'Иван',
            'patronymic' => 'Иванович',
            'municipality' => 'Ульяновск',
            'locality' => 'Ростовская область',
            'school' => 'Школа №65',
            'login' => 'user3',
            'email' => 'example7@mail.ru',
            'is_admin' => null,
            'password' => Hash::make('user'),
        ]);
    }
}
