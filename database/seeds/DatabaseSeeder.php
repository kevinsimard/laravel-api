<?php

use Faker\Generator;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * @param  \Faker\Generator  $faker
     * @return void
     */
    public function __construct(Generator $faker)
    {
        $this->faker = $faker;
    }

    /**
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
    }
}
