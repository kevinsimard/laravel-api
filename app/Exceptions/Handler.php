<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as CoreHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\Debug\Exception\FlattenException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends CoreHandler
{
    /**
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Validation\ValidationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
    ];

    /**
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\JsonResponse
     */
    public function render($request, Exception $e)
    {
        list($code, $message, $errors) = $this->getExceptionParts($e);

        if (config('app.debug', false)) {
            $backtrace = $this->getDebugInfo($e);

            return response()->json(compact([
                'code', 'message', 'errors', 'backtrace',
            ]), $code);
        }

        return response()->json(compact([
            'code', 'message', 'errors',
        ]), $code);
    }

    /**
     * @param  \Exception  $e
     * @return array
     */
    protected function getExceptionParts(Exception $e)
    {
        $errors = [];
        $code = $e->getCode() ?: 500;
        $message = $e->getMessage();

        if (method_exists($e, 'getResponse') && $e->getResponse()) {
            $code = $e->getResponse()->getStatusCode();
            $message = $e->getResponse()->getContent();
        } elseif ($e instanceof ValidationException) {
            $errors = $e->validator->messages();
            $e = new HttpException(422, $e->getMessage());
        } elseif ($e instanceof AuthorizationException) {
            $e = new HttpException(403, $e->getMessage());
        } elseif ($e instanceof ModelNotFoundException) {
            $e = new NotFoundHttpException($e->getMessage(), $e);
        }

        if ($this->isHttpException($e)) {
            $code = $e->getStatusCode();
            $message = $this->getMessageByCode($code);
        }

        return [$code, $message, $errors];
    }

    /**
     * @param  int  $code
     * @return string
     */
    protected function getMessageByCode($code)
    {
        return isset(Response::$statusTexts[$code])
            ? Response::$statusTexts[$code] : 'Unknown Status';
    }

    /**
     * @param  \Exception  $exception
     * @return array
     */
    protected function getDebugInfo(Exception $exception)
    {
        return FlattenException::create($exception)->toArray();
    }
}
