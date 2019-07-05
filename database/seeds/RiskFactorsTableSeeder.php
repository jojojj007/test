<?php

use Illuminate\Database\Seeder;

class RiskFactorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('risk_factors')->insert([
            'risk_id' => 1,
            'detail' => 'มีหลักสูตรทางด้านพลังงานและสิ่งแวดล้อมเปิดสอนมากขึ้น',
            'created_by' => '1',
            'created_at' => new DateTime,
            'updated_by' => '1',
            'updated_at' => new DateTime,
        ]);
        DB::table('risk_factors')->insert([
            'risk_id' => 1,
            'detail' => 'แนวโน้มการเรียนต่อในระดับบัณฑิตศึกษาลดลง',
            'created_by' => '1',
            'created_at' => new DateTime,
            'updated_by' => '1',
            'updated_at' => new DateTime,
        ]);
    }
}
