<?php

namespace App\Controller;

use App\Repository\ShopRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShopController extends AbstractController
{
    /**
     * @Route("/store/{id}", name="store_get")
     * @param $id
     * @return JsonResponse
     */
    public function getShop($id)
    {
        /** @var ShopRepository $shopRepository */
        $shopRepository = $this->getDoctrine()->getRepository(ShopRepository::class);
        $shop = $shopRepository->find($id);

        if (null === $shop) {
            return new JsonResponse(
                ["Store with id ${id} doesn't exist"],
                Response::HTTP_NOT_FOUND
            );
        }

        return new JsonResponse([
            'name' => $shop->getName()
        ]);
    }
}