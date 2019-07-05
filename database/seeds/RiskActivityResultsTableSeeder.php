<?php

use Illuminate\Database\Seeder;

class RiskActivityResultsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('risk_activity_results')->insert([
            'risk_activity_id' => '1',
            'ordinal' => '1',
            'risk_activity_status_id' => '1',
            'note' => 'กิจกรรมมันดีอย่างนู้น อย่างนี้',
            'created_by' => '1',
            'created_at' => new DateTime,
            'updated_by' => '1',
            'updated_at' => new DateTime,
        ]);
    }
}
