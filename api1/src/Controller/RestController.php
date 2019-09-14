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
     * @Route("/simulate", name="simulate")
     */
    public function test()
    {

        $client = HttpClient::create();
        $response = $client->request('GET', 'https://api.github.com/repos/symfony/symfony-docs');

        $statusCode = $response->getStatusCode();
        $contentType = $response->getHeaders()['content-type'][0];
        $content = $response->getContent();
        $content = $response->toArray();

        return new JsonResponse($content, 200);
    }
}