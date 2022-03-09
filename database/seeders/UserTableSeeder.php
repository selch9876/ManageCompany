<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $selch = User::factory()
        ->selcukOktay()
        ->create();

        $usersCount=max((int)$this->command->ask('How many users you would like?',10), 1);
        $users = User::factory($usersCount)
        ->create();

    }
}
