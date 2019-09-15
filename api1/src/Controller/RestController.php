<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Swagger\Annotations as SWG;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class RestController extends AbstractController
{
    /**
     * @Route("/simulate", name="simulate", methods={"POST"})
     * @return Response
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     * @throws \Exception
     */
    public function simulate()
    {
        $storeId = random_int(1, 3);
        $productCode = random_int(1, 10);
        $productQuantity = random_int(1, 3);

        $client = HttpClient::create();

        $response = $client->request('POST', 'http://api.hackyeah.bluepaprica.ovh/order/save', [
            'json' => [
                'store_id' => $storeId,
                'products' => [
                    ["code" => $productCode, "quantity" => $productQuantity]
            ]],
        ]);

        $statusCode = $response->getStatusCode();
        $content = $response->getContent();

        return new Response($content, $statusCode);
    }
}