<?php

namespace App\Controllers;

class CheckoutController
{
    private $pdo;

    // Constructor to initialize the PDO instance
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Display the checkout page
    public function index()
    {
        require_once __DIR__ . '/../Views/checkout/index.php';
    }
}