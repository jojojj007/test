<?php

use Illuminate\Database\Seeder;

class RiskResultsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('risk_results')->insert([
            'risk_id' => '1',
            'ordinal' => '1',
            'likelihood' => '5',
            'impact' => '4',
            'created_by' => '1',
            'created_at' => new DateTime,
            'updated_by' => '1',
            'updated_at' => new DateTime,
        ]);
    }
}
