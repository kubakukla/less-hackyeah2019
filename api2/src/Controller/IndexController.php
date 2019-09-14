<?php

namespace App\Controller;

use App\Entity\Order;
use App\Entity\OrderItem;
use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/order/save", name="order_save", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function saveOrder(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $items = $data['products'];

        $productRepository = $this->getDoctrine()->getRepository(Product::class);
        $entityManager = $this->getDoctrine()->getManager();

        $order = new Order();
        $order->setCreatedAt(new \DateTime());
        $order->setUserId(1);
        $entityManager->persist($order);

        foreach ($items as $item) {
            /** @var Product $product */
            $product = $productRepository->findOneBy(['code' => $item['code']]);
            $quantity = $item['quantity'];

            $orderItem = new OrderItem();
            $orderItem->setProduct($product);
            $orderItem->setOrder($order);
            $orderItem->setQuantity($quantity);
            $entityManager->persist($orderItem);
        }

        $entityManager->flush();

        return new JsonResponse($data);
    }
}
