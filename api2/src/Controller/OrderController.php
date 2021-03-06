<?php

namespace App\Controller;

use App\Entity\Order;
use App\Entity\OrderItem;
use App\Entity\Product;
use App\Entity\Shop;
use App\Repository\OrderRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
    public function save(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $items = $data['products'];
        $shopId = $data['store_id'];

        $productRepository = $this->getDoctrine()->getRepository(Product::class);
        $shopRepository = $this->getDoctrine()->getRepository(Shop::class);
        $entityManager = $this->getDoctrine()->getManager();

        /** @var Shop $shop */
        $shop = $shopRepository->find($shopId);
        if (null === $shop) {
            return new JsonResponse([
                "Store with id ${shopId} doesn't exist"
            ], Response::HTTP_BAD_REQUEST);
        }

        $order = new Order();
        $order->setCreatedAt(new \DateTime());
        $order->setUserId(1);
        $order->setShop($shop);
        $entityManager->persist($order);

        foreach ($items as $item) {
            /** @var Product $product */
            $product = $productRepository->findOneBy(['code' => $item['code']]);

            if (null === $product) {
                return new JsonResponse([
                    "Product with code ${item['code']} doesn't exist"
                ], Response::HTTP_BAD_REQUEST);
            }

            $quantity = $item['quantity'];

            $orderItem = new OrderItem();
            $orderItem->setProduct($product);
            $orderItem->setOrder($order);
            $orderItem->setQuantity($quantity);
            $entityManager->persist($orderItem);
        }

        $entityManager->flush();

        return new JsonResponse(['id' => $order->getId()]);
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
        $data['store_id'] = $order->getShop()->getId();
        /** @var ProductRepository $productRepository */
        $productRepository = $this->getDoctrine()->getRepository(Product::class);
        foreach ($items as $item)
        {
            $data = $productRepository->addProductTrashData($item->getProduct(), $item->getQuantity(), $data);
        }

        return new JsonResponse($data, 200);
    }
}
