<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Swagger\Annotations as SWG;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\HttpClient\HttpClient;

class RestController extends AbstractController
{
    /**
     * @Route("/simulate", name="simulate", methods={"POST"})
     */
    public function simulate()
    {
        $client = HttpClient::create();

        $response = $client->request('POST', 'http://api.hackyeah.bluepaprica.ovh/order/save', [
            'json' => ['products' => [["code" => 1, "quantity" => 1]]],
        ]);

        $statusCode = $response->getStatusCode();
        $content = $response->getContent();

        return new Response($content, $statusCode);
    }
}