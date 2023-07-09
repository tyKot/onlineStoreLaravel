<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name_category' => 'Игрушки и игры', // id=1
        ]);
        DB::table('categories')->insert([
            'name_category' => 'Одежда', // id=2
        ]);
        DB::table('categories')->insert([
            'name_category' => 'Книги', // id=3
        ]);
        DB::table('categories')->insert([
            'name_category' => 'Спорт', // id=4
        ]);
        DB::table('categories')->insert([
            'name_category' => 'Электроника', // id=5
        ]);
        DB::table('categories')->insert([
            'name_category' => 'Кот в мешке', // id=6
        ]);
        DB::table('categories')->insert([
            'name_category' => 'Сертификат', // id=7
        ]);
        DB::table('categories')->insert([
            'name_category' => 'Разные мелочи', // id=8
        ]);
    }
}
