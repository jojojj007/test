<?php

use Illuminate\Database\Seeder;

class RiskIndicatorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('risk_indicators')->insert([
            'risk_id' => '1',
            'name' => '',
            'goal' => 'จะทำให้นักศึกษาอยู่เยอะขึ้น',
            'created_by' => '1',
            'created_at' => new DateTime,
            'updated_by' => '1',
            'updated_at' => new DateTime,
        ]);
    }
}
