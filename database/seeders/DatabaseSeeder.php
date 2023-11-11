<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Referrals;
use App\Models\Subscriptions;
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
        \App\Models\User::factory(200)->create();
        Admin::factory(1)->create();
    }
}
