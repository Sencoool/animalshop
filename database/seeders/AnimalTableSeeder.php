<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animal')->insert(array(
            [
                'name'=>'มังกรโคโมโด',
                'type_id'=>'1',
                'status_id'=>'1',
            ],
            [
                'name'=>'นกแก้ว',
                'type_id'=>'2',
                'status_id'=>'1',
            ],
            [
                'name'=>'นกพิราบ',
                'type_id'=>'2',
                'status_id'=>'2',
            ],
            [
                'name'=>'วัว',
                'type_id'=>'1',
                'status_id'=>'2',
            ],
            [
                'name'=>'ปลานีโม่',
                'type_id'=>'3',
                'status_id'=>'1',
            ],
            [
                'name'=>'ปลาฉลาม',
                'type_id'=>'3',
                'status_id'=>'2',
            ],
        ));
    }
}
