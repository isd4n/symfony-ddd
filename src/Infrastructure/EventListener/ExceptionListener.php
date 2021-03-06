<?php
declare(strict_types=1);

namespace App\Infrastructure\EventListener;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

class ExceptionListener
{
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();

        $response = new JsonResponse([
            'message' => $exception->getMessage(),
        ]);

        $response->setStatusCode($exception->getCode() > 0
            ? $exception->getCode()
            : Response::HTTP_INTERNAL_SERVER_ERROR
        );

        $event->setResponse($response);
    }
}
