<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employeeCount = (int)$this->command->ask('How many employees do you want?', 500);
        $companies = Company::all();
        Employee::factory($employeeCount)
        ->make()
        ->each(function($employee) use ($companies){
            $employee->company_id = $companies->random()->id;
            $employee->save();
        });
    }
}
