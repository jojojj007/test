<?php

use Illuminate\Database\Seeder;

class DepartmentYearsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('department_years')->insert([
            'department_id' => '2',
            'year_id' => '1',
            'confirmed_by' => '1',            
            'confirmed_at' => new DateTime,
            'approved_by' => '1',       
            'approved_at' => new DateTime,
            'created_by' => '1',
            'created_at' => new DateTime,
            'updated_by' => '1',
            'updated_at' => new DateTime,
        ]);
        DB::table('department_years')->insert([
            'department_id' => '2',
            'year_id' => '2',
            'confirmed_by' => '1',            
            'confirmed_at' => new DateTime,
            'approved_by' => '1',       
            'approved_at' => new DateTime,
            'created_by' => '1',
            'created_at' => new DateTime,
            'updated_by' => '1',
            'updated_at' => new DateTime,
        ]);
        DB::table('department_years')->insert([
            'department_id' => '1',
            'year_id' => '2',
            'confirmed_by' => '1',            
            'confirmed_at' => new DateTime,
            'approved_by' => '1',       
            'approved_at' => new DateTime,
            'created_by' => '1',
            'created_at' => new DateTime,
            'updated_by' => '1',
            'updated_at' => new DateTime,
        ]);
    }
}
