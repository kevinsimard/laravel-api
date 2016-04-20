<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as CoreHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

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
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function render($request, Exception $e): Response
    {
        if ($e instanceof ValidationException) {
            return response()->json([
                'code' => $code = 422,
                'message' => $this->getHttpMessage($code),
                'errors' => $e->validator->getMessageBag()->toArray(),
            ], $code);
        }

        return parent::render($request, $e);
    }

    /**
     * @param  \Symfony\Component\HttpKernel\Exception\HttpException  $e
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function renderHttpException(HttpException $e): Response
    {
        $code = $e->getStatusCode();
        $message = $this->getHttpMessage($code);

        return response()->json([
            'code' => $code,
            'message' => $message,
        ], $code, $e->getHeaders());
    }

    /**
     * @param  \Exception  $e
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function convertExceptionToResponse(Exception $e): Response
    {
        return response()->json([
            'code' => 500,
            'message' => $e->getMessage(),
        ], 500);
    }

    /**
     * @param  int  $code
     * @return string
     */
    protected function getHttpMessage(int $code): string
    {
        return Response::$statusTexts[$code] ?? 'Unknown Status';
    }
}
