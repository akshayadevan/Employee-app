<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'designation' => 'Developer',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'designation' => 'Designer',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'designation' => 'Manager',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        DB::table('designations')->insert($data);
    }
}
