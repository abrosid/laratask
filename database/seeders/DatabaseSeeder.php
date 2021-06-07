<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $companies = Company::factory(100)->create();

        User::factory(100)->create()
            ->each(function ($user) use ($companies) {
                $user->update([
                    "company_id" => $companies->random()->id
                ]);
            });
    }
}
