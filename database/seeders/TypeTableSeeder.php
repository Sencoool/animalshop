<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type')->insert(array(
            [
                'name'=>'สัตว์บก',
            ],
            [
                'name'=>'สัตว์ปีก',
            ],
            [
                'name'=>'สัตว์น้ำ',
            ],
        ));
    }
}
