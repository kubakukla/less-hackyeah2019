<?php

namespace App\Repository;

use App\Entity\Order;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use App\Helper\OrderHelper;

/**
 * @method Order|null find($id, $lockMode = null, $lockVersion = null)
 * @method Order|null findOneBy(array $criteria, array $orderBy = null)
 * @method Order[]    findAll()
 * @method Order[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderRepository extends ServiceEntityRepository
{
    /** @var string  */
    const TOTALS = "totals";
    const LATEST_ORDERS_LIMIT = 5;

    /** @var OrderHelper  */
    private $helper;

    /**
     * OrderRepository constructor.
     * @param ManagerRegistry $registry
     * @param OrderHelper $orderHelper
     */
    public function __construct(
        ManagerRegistry $registry,
        OrderHelper $orderHelper
    ) {
        parent::__construct($registry, Order::class);
        $this->helper = $orderHelper;
    }

    /**
     * @return OrderHelper
     */
    public function getHelper() :OrderHelper
    {
        return $this->helper;
    }

    /**
     * @param Order $order
     * @return array
     */
    public function calculateTrashData(Order $order) :array
    {
        return $this->helper->calculateTrashData($order);
    }

    /**
     * @param Order $order
     * @return array
     */
    public function getPrunedTrashData(Order $order) :array
    {
        return $this->helper->getPrunedTrashData($order);
    }

    /**
     * @param Order $order
     * @param array $data
     * @return array
     */
    public function addOrderTrashData(Order $order, array $data = []) :array
    {
        $trash = $this->getPrunedTrashData($order);
        if (!isset($data[self::TOTALS])) {
            $data[self::TOTALS] = $trash;
        } else {
            $data[self::TOTALS] = array_merge($data[self::TOTALS], $trash);
        }
        return $data;
    }

    /**
     * @param int $userId
     * @return Order[]
     */
    public function getLatestOrdersForUser(int $userId)
    {
        $result = [];

        $orders = $this->findBy(
            ['user_id' => $userId],
            ['created_at' => 'desc'],
            self::LATEST_ORDERS_LIMIT
        );

        foreach ($orders as $order) {
            $resultItem = [
                'id' => $order->getId(),
                'created_at' => $order->getCreatedAt()->getTimestamp(),
                'item_count' => count($order->getOrderItems()),
            ];
            $resultItem = $this->addOrderTrashData($order, $resultItem);
            $result[] = $resultItem;
        }

        return $result;
    }

    public function getNotification($userId)
    {
        $order = $this->findOneBy(
            ['user_id' => $userId],
            ['created_at' => 'desc']
        );

        return [
            'id' => $order->getId(),
            'created_at' => $order->getCreatedAt()->getTimestamp(),
            'item_count' => count($order->getOrderItems()),
        ];
    }
}
