<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert(array(
            [
                'name'=>'มีชีวิต',
            ],
            [
                'name'=>'ไม่มีชีวิต',
            ],
        ));
    }
}
