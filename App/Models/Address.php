<?php

namespace App\Models;

class Address
{
    private $pdo;

    // Constructor to initialize the PDO instance
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Get all addresses for a user
    public function getAddressesByUserId($userId)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM addresses WHERE userID = :userId");
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}