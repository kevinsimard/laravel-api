<?php

namespace App\Modules\Auth\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Foundation\Auth\ThrottlesLogins;

class AuthController extends BaseController
{
    use ThrottlesLogins;
}
