<?php

use App\Modules\Auth\Entities\User;

class UserSeeder extends DatabaseSeeder
{
    /**
     * @return void
     */
    public function run()
    {
        factory(User::class, rand(5, 15))->create();
    }
}
