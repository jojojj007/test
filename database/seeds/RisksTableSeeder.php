<?php

use Illuminate\Database\Seeder;

class RisksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('risks')->insert([
            'department_year_id' => '1',
            'name' => 'งบประมาณสำหรับทุนการศึกษาลดน้อยลง',
            'risk_type_id' => '1',
            'likelihood' => '5',
            'risk_impact_id' => '1',
            'impact' => '4',
            'risk_strategy_id' => '1',
            'created_by' => '1',
            'created_at' => new DateTime,
            'updated_by' => '1',
            'updated_at' => new DateTime,
        ]);
        DB::table('risks')->insert([
            'department_year_id' => '1',
            'name' => 'นักศึกษาใช้เวลาในการศึกษามาก',
            'risk_type_id' => '1',
            'likelihood' => '4',
            'risk_impact_id' => '1',
            'impact' => '3',
            'risk_strategy_id' => '1',
            'created_by' => '1',
            'created_at' => new DateTime,
            'updated_by' => '1',
            'updated_at' => new DateTime,
        ]);
    }
}
