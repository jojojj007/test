<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DepartmentsTableSeeder::class);
        $this->call(YearsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(DepartmentYearsTableSeeder::class);
        $this->call(RiskTypesTableSeeder::class);
        $this->call(RiskImpactsTableSeeder::class);
        $this->call(RiskStrategiesTableSeeder::class);
        $this->call(RisksTableSeeder::class);
        $this->call(RiskFactorsTableSeeder::class);
        $this->call(RiskActivityStatusesTableSeeder::class);
        $this->call(RiskActivitiesTableSeeder::class);
        $this->call(RiskIndicatorsTableSeeder::class);
        $this->call(RiskResultsTableSeeder::class);
        $this->call(RiskActivityResultsTableSeeder::class);
        $this->call(RiskIndicatorResultsTableSeeder::class);
    }
}
