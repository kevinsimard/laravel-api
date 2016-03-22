<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as CoreHandler;
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
        \Illuminate\Foundation\Validation\ValidationException::class,
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
        $code = $e->getCode();
        $message = $e->getMessage();

        if ($e instanceof ModelNotFoundException) {
            $e = new NotFoundHttpException($e->getMessage(), $e);
        } elseif ($e instanceof AuthorizationException) {
            $e = new HttpException(403, $e->getMessage());
        } elseif (method_exists($e, 'getResponse') && $e->getResponse()) {
            $code = $e->getResponse()->getStatusCode();
            $message = $e->getResponse()->getContent();
        }

        if ($this->isHttpException($e)) {
            $code = $e->getStatusCode();
            $message = $this->getMessageByCode($code);
        }

        return response()->json(compact('message'), $code);
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
}
