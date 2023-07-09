<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryAnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('announce_categories')->insert([
            'name'=>'Наука',
        ]);
        DB::table('announce_categories')->insert([
            'name'=>'Искусство',
        ]);
        DB::table('announce_categories')->insert([
            'name'=>'Литературное творчество',
        ]);
        DB::table('announce_categories')->insert([
            'name'=>'Спорт',
        ]);

    }

}
