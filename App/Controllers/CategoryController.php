<?php

namespace App\Controllers;

use App\Models\Category;

class CategoryController
{
    private $pdo;

    // Constructor to initialize the PDO instance
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Display all categories
    public function index()
    {
        $categoryModel = new Category($this->pdo);
        $categories = $categoryModel->getAllCategories();
        require_once __DIR__ . '/../Views/category/index.php';
    }

    // Display products within a specific category
    public function view($categoryName)
    {
        $categoryName = filter_var($categoryName, FILTER_SANITIZE_STRING);
        $categoryModel = new Category($this->pdo);
        $category = $categoryModel->getCategoryByName($categoryName);

        if ($category) {
            $products = $categoryModel->getProductsByCategory($category['categoryID']);
            require_once __DIR__ . '/../Views/category/view.php';
        } else {
            // Handle category not found
            header('Location: index.php?route=categories');
            exit();
        }
    }
}