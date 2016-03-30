<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller;
use Illuminate\Validation\ValidationException;

abstract class BaseController extends Controller
{
    use AuthorizesRequests, DispatchesJobs;

    /**
     * @param  array  $data
     * @param  array  $rules
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validate(array $data, array $rules)
    {
        $validator = \Validator::make($data, $rules);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }
}
