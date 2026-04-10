<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\ApiKeyMiddleware;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        api: __DIR__.'/../routes/api.php'
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'api.key' => ApiKeyMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (ValidationException $e, $request) {
            if (!$request->expectsJson()) {
                return null;
            }

            $errors = collect($e->errors())->flatten();

            $requiredFields = [];
            $otherErrors = [];

            foreach ($errors as $msg) {
                if (str_contains($msg, 'field is required')) {
                    preg_match('/The (.+?) field is required/', $msg, $matches);
                    if (isset($matches[1])) {
                        $requiredFields[] = $matches[1];
                    }
                } else {
                    $otherErrors[] = rtrim($msg, '.');
                }
            }

            $message = null;

            if (!empty($requiredFields)) {
                if (count($requiredFields) === 1) {
                    $message = "The {$requiredFields[0]} field is required";
                } else {
                    $last = array_pop($requiredFields);
                    $fields = implode(', ', $requiredFields) . " and " . $last;
                    $message = "The {$fields} fields are required";
                }
            }

            if (!empty($otherErrors)) {
                $extra = implode(', ', $otherErrors);
                $message = $message ? $message . ', ' . $extra : $extra;
            }

            return response()->json([
                'error' => $message
            ], 400);
        });

        $exceptions->render(function (\Throwable $e, $request) {
            if (!$request->expectsJson()) {
                return null;
            }

            $status = 500;
            $message = $e->getMessage() ?: 'Server Error';

            if ($e instanceof ModelNotFoundException) {
                $status = 404;
                $message = 'Data not found';
            }

            if ($e instanceof HttpException) {
                $status = $e->getStatusCode();
                $message = $message ?: 'HTTP Error';
            }

            return response()->json([
                'error' => $message
            ], $status);
        });
    })
    ->create();