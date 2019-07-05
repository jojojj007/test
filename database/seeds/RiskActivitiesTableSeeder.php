<?php

use Illuminate\Database\Seeder;

class RiskActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('risk_activities')->insert([
            'risk_id' => '1',
            'name' => '1.จัดหา.....',
            'risk_activity_status_id' => '1',
            'deadline' => '29/09/2562',
            'oic' => 'jojo',
            'created_by' => '1',
            'created_at' => new DateTime,
            'updated_by' => '1',
            'updated_at' => new DateTime,
        ]);
        DB::table('risk_activities')->insert([
            'risk_id' => '1',
            'name' => '2.กัดกิจกรรม....',
            'risk_activity_status_id' => '1',
            'deadline' => '29/09/2562',
            'oic' => 'jojo',
            'created_by' => '1',
            'created_at' => new DateTime,
            'updated_by' => '1',
            'updated_at' => new DateTime,
        ]);
    }
}
