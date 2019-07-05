<?php

use Illuminate\Database\Seeder;

class RiskIndicatorResultsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('risk_indicator_results')->insert([
            'risk_indicator_id' => '1',
            'ordinal' => '1',
            'result' => '',
            'created_by' => '1',
            'created_at' => new DateTime,
            'updated_by' => '1',
            'updated_at' => new DateTime,
        ]);
    }
}
