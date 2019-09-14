<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class PingController
{
    /**
     * @Route("/ping")
     * @return JsonResponse
     */
    public function ping()
    {
        return new JsonResponse('pong');
    }
}