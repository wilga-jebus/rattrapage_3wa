<?php

namespace App\Controllers;

use App\Models\Product;

class HomeController
{
    private $pdo;

    // Constructor to initialize the PDO instance
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Display the home page
    public function index()
    {
        $productModel = new Product($this->pdo);
        $products = $productModel->getAllProducts();
        require_once __DIR__ . '/../Views/home/index.php';
    }
}