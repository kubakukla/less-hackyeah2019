<?php

namespace App\Controller;

use App\Entity\Order;
use App\Repository\OrderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user/{id}/orders", name="user_orders")
     * @param int $id
     * @return JsonResponse
     */
    public function latestOrders($id)
    {
        /** @var OrderRepository $orderRepository */
        $orderRepository = $this->getDoctrine()->getRepository(Order::class);

        $orders = $orderRepository->getLatestOrdersForUser($id);

        return new JsonResponse($orders);
    }

    /**
     * @Route("/user/{id}/notification")
     * @param $id
     * @return JsonResponse
     */
    public function notification($id)
    {
        /** @var OrderRepository $orderRepository */
        $orderRepository = $this->getDoctrine()->getRepository(Order::class);

        $order = $orderRepository->getNotification($id);

        return new JsonResponse($order);
    }
}