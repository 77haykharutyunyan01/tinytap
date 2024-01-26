<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {
        dd($e);
        if (Str::contains($e->getMessage(), __('errors.duplicate_entry'))) {
            return response()->json([
                'message' => __('errors.duplicate_entry'),
                'errors' => $e->getMessage()
            ], 400);
        }

        $httpCode = ResponseAlias::HTTP_INTERNAL_SERVER_ERROR;
        $statusCode =  $e->getCode();

        $details = [
            'message' => $e->getMessage(),
        ];

        if ($e instanceof ValidationException) {
            $httpCode = ResponseAlias::HTTP_UNPROCESSABLE_ENTITY;
            $statusCode = BusinessLogicException::VALIDATION_FAILED;
            $details['message'] = $e->getMessage();
            foreach ($e->errors() as $key => $error) {
                $details['errors'][$key] = $error[0] ?? __('errors.unknown_error');
            }
        }

        if ($e instanceof NotFoundHttpException || $e instanceof ModelNotFoundException) {
            $httpCode = ResponseAlias::HTTP_NOT_FOUND;
            $statusCode = ResponseAlias::HTTP_NOT_FOUND;
            $details['message'] = __('errors.not_found');

            return redirect('not_found');
        }

        if ($e instanceof BadRequestHttpException) {
            $httpCode = ResponseAlias::HTTP_BAD_REQUEST;
            $statusCode = ResponseAlias::HTTP_BAD_REQUEST;
            $details['message'] = __('errors.bad_request');
        }

        if ($e instanceof MethodNotAllowedHttpException) {
            $httpCode = ResponseAlias::HTTP_METHOD_NOT_ALLOWED;
            $statusCode = ResponseAlias::HTTP_METHOD_NOT_ALLOWED;
            $details['message'] = __('errors.method_not_allowed');
        }

        if ($e instanceof AuthorizationException || $e instanceof AuthenticationException) {
            $httpCode = ResponseAlias::HTTP_UNAUTHORIZED;
            $statusCode = ResponseAlias::HTTP_UNAUTHORIZED;
            $details['message'] = __('errors.unauthorized');

            return redirect('login');
        }


        if ($e instanceof BusinessLogicException) {
            $httpCode = $e->getHttpStatusCode();
            $statusCode = $e->getStatus();
            $details['message'] = $e->getStatusMessage();
        }

        $data = [
            'success' => false,
            'status' => $statusCode,
            'errors' => $details,
        ];

        if (str_starts_with($httpCode, 5) && !config('app.debug')) {
            $data['errors'] = [
                'message' => __('errors.server_error'),
            ];
        }

        return response()->json($data, $httpCode);
    }
}
