<?php

namespace App\Controllers;

use App\Models\Product;

class ProductController
{
    private $pdo;

    // Constructor to initialize the PDO instance
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Display the list of products
    public function index()
    {
        $productModel = new Product($this->pdo);
        $products = $productModel->getAllProducts();
        require_once __DIR__ . '/../Views/admin/products/index.php';
    }

    // Display a single product
    public function view($id)
    {
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        
        // Fetch product details from the database
        $productModel = new Product($this->pdo);
        $product = $productModel->getProductById($id);

        // Check if the product exists
        if ($product) {
            // Pass the product to the view
            require_once __DIR__ . '/../Views/admin/products/product_view.php';
        } else {
            // Handle the case where the product does not exist
            http_response_code(404);
            echo "Product not found.";
        }
    }

    // Handle adding a new product
    public function addProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
            $categoryID = filter_var($_POST['categoryID'], FILTER_SANITIZE_NUMBER_INT);

            $productModel = new Product($this->pdo);
            $productModel->addProduct($name, $price, $description, $categoryID);

            header('Location: index.php?route=admin/products');
            exit();
        }
    }

    // Display the edit product form
    public function editProductForm($id)
    {
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        
        $productModel = new Product($this->pdo);
        $product = $productModel->getProductById($id);
        require_once __DIR__ . '/../Views/admin/products/edit_product.php';
    }

    // Handle updating a product
    public function updateProduct($id)
    {
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
            $categoryID = filter_var($_POST['categoryID'], FILTER_SANITIZE_NUMBER_INT);

            $productModel = new Product($this->pdo);
            $productModel->updateProduct($id, $name, $price, $description, $categoryID);

            header('Location: index.php?route=admin/products');
            exit();
        } else {
            $productModel = new Product($this->pdo);
            $product = $productModel->getProductById($id);
            require_once __DIR__ . '/../Views/admin/products/edit_product.php';
        }
    }

    // Handle deleting a product
    public function deleteProduct($id)
    {
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        
        $productModel = new Product($this->pdo);
        $product = $productModel->getProductById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productModel->deleteProduct($id);
            header('Location: index.php?route=admin/products');
            exit();
        }

        require_once __DIR__ . '/../Views/admin/products/delete_product.php';
    }
}

