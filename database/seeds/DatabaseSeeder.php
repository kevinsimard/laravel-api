<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * @var array
     */
    protected $factories = [
        App\Modules\Auth\Entities\User::class,
    ];

    /**
     * @return void
     */
    public function run()
    {
        foreach ($this->factories as $entityClass) {
            foreach (range(0, rand(5, 15)) as $i) {
                factory($entityClass)->create();
            }
        }
    }
}
