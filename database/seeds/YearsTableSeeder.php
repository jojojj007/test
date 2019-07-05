<?php

use Illuminate\Database\Seeder;

class YearsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('years')->insert([
            'symbol' => '2561',
            'name' => '2561',
            //'detail' => 'ไม่จำเป็น',
            'created_by' => '1',
            'created_at' => new DateTime,
            'updated_by' => '1',
            'updated_at' => new DateTime,
        ]);
        DB::table('years')->insert([
            'symbol' => '2562',
            'name' => '2562',
            //'detail' => 'ไม่จำเป็น2',
            'created_by' => '1',
            'created_at' => new DateTime,
            'updated_by' => '1',
            'updated_at' => new DateTime,
        ]);
    }
}
