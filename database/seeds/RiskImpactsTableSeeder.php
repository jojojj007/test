<?php

use Illuminate\Database\Seeder;

class RiskImpactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('risk_impacts')->insert([
            'symbol' => 'ผลกระทบที่หนึ่ง',
            'name' => 'ผลกระทบด้านการเงิน',
            //'detail' => '',
            'created_by' => '1',
            'created_at' => new DateTime,
            'updated_by' => '1',
            'updated_at' => new DateTime,
        ]);
        DB::table('risk_impacts')->insert([
            'symbol' => 'ผลกระทบที่สอง',
            'name' => 'ผลกระทบด้านเวลา',
            //'detail' => '',
            'created_by' => '1',
            'created_at' => new DateTime,
            'updated_by' => '1',
            'updated_at' => new DateTime,
        ]);
        DB::table('risk_impacts')->insert([
            'symbol' => 'ผลกระทบที่สาม',
            'name' => 'ผลกระทบด้านชื่อเสียงขององค์กร',
            //'detail' => '',
            'created_by' => '1',
            'created_at' => new DateTime,
            'updated_by' => '1',
            'updated_at' => new DateTime,
        ]);
        DB::table('risk_impacts')->insert([
            'symbol' => 'ผลกระทบที่สี่',
            'name' => 'ผลกระทบด้านความปลอดภัย',
            //'detail' => '',
            'created_by' => '1',
            'created_at' => new DateTime,
            'updated_by' => '1',
            'updated_at' => new DateTime,
        ]);
        DB::table('risk_impacts')->insert([
            'symbol' => 'ผลกระทบที่ห้า',
            'name' => 'ผลกระทบด้านบุคลากร',
            //'detail' => '',
            'created_by' => '1',
            'created_at' => new DateTime,
            'updated_by' => '1',
            'updated_at' => new DateTime,
        ]);
        DB::table('risk_impacts')->insert([
            'symbol' => 'ผลกระทบที่หก',
            'name' => 'ผลกระทบด้านประสิทธิผล',
            //'detail' => '',
            'created_by' => '1',
            'created_at' => new DateTime,
            'updated_by' => '1',
            'updated_at' => new DateTime,
        ]);
        DB::table('risk_impacts')->insert([
            'symbol' => 'ผลกระทบที่เจ็ด',
            'name' => 'ผลกระทบด้านการดำเนินงานตามแผน',
            //'detail' => '',
            'created_by' => '1',
            'created_at' => new DateTime,
            'updated_by' => '1',
            'updated_at' => new DateTime,
        ]);
        DB::table('risk_impacts')->insert([
            'symbol' => 'ผลกระทบที่แปด',
            'name' => 'ผลกระทบด้านความพึงพอใจ',
            //'detail' => '',
            'created_by' => '1',
            'updated_by' => '1',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);
        DB::table('risk_impacts')->insert([
            'symbol' => 'ผลกระทบที่เก้า',
            'name' => 'ผลกระทบด้านผลงานวิจัย',
            //'detail' => '',
            'created_by' => '1',
            'created_at' => new DateTime,
            'updated_by' => '1',
            'updated_at' => new DateTime,
        ]);
        DB::table('risk_impacts')->insert([
            'symbol' => 'ผลกระทบที่สิบ',
            'name' => 'ผลกระทบด้านระบบเทคโนสารสนเทศ',
            //'detail' => '',
            'created_by' => '1',
            'created_at' => new DateTime,
            'updated_by' => '1',
            'updated_at' => new DateTime,
        ]);
        DB::table('risk_impacts')->insert([
            'symbol' => 'ผลกระทบที่สิบเอ็ด',
            'name' => 'ผลกระทบด้านเป้าหมายขององค์กร',
            //'detail' => '',
            'created_by' => '1',
            'created_at' => new DateTime,
            'updated_by' => '1',
            'updated_at' => new DateTime,
        ]);
    }
}
