<?php

namespace App\Modules\Auth\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends BaseController
{
    use ResetsPasswords;

    /**
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
}
