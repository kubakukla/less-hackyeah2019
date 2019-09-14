<?php

namespace App\Controller;

use App\Entity\Order;
use App\Entity\OrderItem;
use App\Entity\Product;
use App\Repository\OrderRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class OrderController extends AbstractController
{
    const ITEMS = "items";

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

    /**
     * @Route("/order/get/{id}", name="order_get")
     * @param int $id
     * @return JsonResponse
     */
    public function getOrder(int $id)
    {
        $data = [];
        /** @var OrderRepository $orderRepository */
        $orderRepository = $this->getDoctrine()->getRepository(Order::class);
        /** @var Order $order */
        $order = $orderRepository->find($id);
        if (!$order) {
            return new JsonResponse(
                [
                    'Order does not exist'
                ],
                400
            );
        }
        $items = $order->getOrderItems();
        $data = $orderRepository->addOrderTrashData($order, $data);
        /** @var ProductRepository $productRepository */
        $productRepository = $this->getDoctrine()->getRepository(Product::class);
        foreach ($items as $item)
        {
            $data = $productRepository->addProductTrashData($item->getProduct(), $item->getQuantity(), $data);
        }

        return new JsonResponse($data, 200);
    }
}
