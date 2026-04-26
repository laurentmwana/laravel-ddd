<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;

class ApiExceptionRenderer
{
   public function render(Throwable $e): \Illuminate\Http\JsonResponse
   {
      return response()->json([
         'message' => $this->message($e),
         'errors'  => $this->errors($e),
         'traces'  => $this->traces($e),
      ], $this->status($e));
   }

   private function status(Throwable $e): int
   {
      return match (true) {
         $e instanceof ValidationException => 422,
         $e instanceof AuthenticationException => 401,
         $e instanceof AuthorizationException => 403,
         $e instanceof NotFoundHttpException => 404,
         $e instanceof MethodNotAllowedHttpException => 405,
         default => 500,
      };
   }

   private function message(Throwable $e): string
   {
      return match (true) {
         $e instanceof ValidationException => __('exceptions.validation_error'),
         $e instanceof AuthenticationException => __('exceptions.unauthenticated'),
         $e instanceof AuthorizationException => __('exceptions.forbidden'),
         $e instanceof NotFoundHttpException => __('exceptions.not_found'),
         $e instanceof MethodNotAllowedHttpException => __('exceptions.method_not_allowed'),
         default => app()->isProduction()
            ? __('exceptions.server_error')
            : $e->getMessage(),
      };
   }

   private function errors(Throwable $e): mixed
   {
      return $e instanceof ValidationException
         ? $e->errors()
         : null;
   }

   private function traces(Throwable $e): mixed
   {
      return app()->isProduction()
         ? null
         : array_slice($e->getTrace(), 0, 10);
   }
}
