<?php

use Illuminate\Database\Seeder;

class RiskActivityStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('risk_activity_statuses')->insert([
            'symbol' => 'ยังไม่ดำเนินการ',
            'name' => 'ยังไม่ดำเนินการ',
        //    'detail' => '',
            'created_by' => '1',
            'created_at' => new DateTime,
            'updated_by' => '1',
            'updated_at' => new DateTime,
        ]);
    }
}
