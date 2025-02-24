<?php

namespace App\Models;

class Order
{
    private $pdo;

    // Constructor to initialize the PDO instance
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Get all orders for a user
    public function getOrdersByUserId($userId)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM orders WHERE userID = :userId");
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Get a single order by its ID
    public function getOrderById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM orders WHERE orderID = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    // Get order items by order ID
    public function getOrderItemsByOrderId($orderId)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM order_items WHERE orderID = :orderId");
        $stmt->bindParam(':orderId', $orderId);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Add a new order to the database
    public function addOrder($userId, $orderDate, $totalAmount, $status)
    {
        $stmt = $this->pdo->prepare("INSERT INTO orders (userID, orderDate, totalAmount, status) VALUES (:userId, :orderDate, :totalAmount, :status)");
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':orderDate', $orderDate);
        $stmt->bindParam(':totalAmount', $totalAmount);
        $stmt->bindParam(':status', $status);
        $stmt->execute();
    }

    // Delete an order from the database
    public function deleteOrder($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM orders WHERE orderID = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    // Update an order in the database
    public function updateOrder($id, $status)
    {
        $stmt = $this->pdo->prepare("UPDATE orders SET status = :status WHERE orderID = :id");
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    // Get all orders from the database
    public function getAllOrders()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM orders");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}