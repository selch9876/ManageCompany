<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companyCount = (int)$this->command->ask('How many companies do you want?', 50);
        $users = User::all();
        Company::factory($companyCount)
        ->make()
        ->each(function($company) use ($users){
            $company->user_id = $users->random()->id;
            $company->save();
        });
    }
}
