<?php

namespace App\Models;

class OrderItem
{
    private $pdo;

    // Constructor to initialize the PDO instance
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Get all items for an order
    public function getItemsByOrderId($orderId)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM orderitems WHERE orderID = :orderId");
        $stmt->bindParam(':orderId', $orderId);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}