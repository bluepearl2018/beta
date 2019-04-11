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
        $faker = Faker\Factory::create();
        $now = \Carbon\Carbon::now();

        DB::table('users')->insert([[
            'id' => 1,
            'name' => $faker->name,
            'email' => $faker->safeEmail,
            'password' => bcrypt('secret'),
            'remember_token' => str_random(10),
            'created_at' => $now,
            'updated_at' => $now,
        ]]);
    }
}
