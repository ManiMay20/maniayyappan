<?php

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
        $this->call(AdminSeeder::class);
        $this->call(JobseekerSeeder::class);
        $this->call(IndividualSeeder::class);
        $this->call(AboutSeeder::class);
        $this->call(PrivacyPolicySeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(AppinfoSeeder::class);
    }
}
