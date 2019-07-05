<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'department_id' => '2',
            'employee_id' => '1',
            'role_id' => '1',
            'created_by' => '1',
            'created_at' => new DateTime,
            'updated_by' => '1',
            'updated_at' => new DateTime,
        ]);

    }
}
