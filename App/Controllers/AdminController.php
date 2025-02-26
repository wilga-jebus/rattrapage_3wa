<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\User;

class AdminController
{
    private $pdo;

    // Constructor to initialize the PDO instance
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Display the manage orders page
    public function manageOrders()
    {
        // Fetch orders from the database
        $orderModel = new Order($this->pdo);
        $orders = $orderModel->getAllOrders();

        // Pass the orders to the view
        require_once __DIR__ . '/../Views/admin/orders.php';
    }

    // Display the admin dashboard
    public function index()
    {     
        // Instantiate UserController class
        $userController = new UserController($this->pdo);
        // Call the login method
        $userController->login();

        //require_once __DIR__ . '/../Views/admin/index.php';
        header('Location: index.php?route=admin_dashboard');
    }

    // Display the manage products page
    public function manageProducts()
    {
        $productModel = new Product($this->pdo);
        $products = $productModel->getAllProducts();
        require_once __DIR__ . '/../Views/admin/products.php';
    }

    // Display the manage users page
    public function manageUsers()
    {
        $userModel = new User($this->pdo);
        $users = $userModel->getAllUsers();
        require_once __DIR__ . '/../Views/admin/users.php';
    }

    // Handle viewing an order
    public function viewOrder($id)
    {
        $orderModel = new Order($this->pdo);
        $order = $orderModel->getOrderById($id);
        require_once __DIR__ . '/../Views/admin/order.php';
    }

    // Handle editing a user
    public function editUser($id)
    {
        $userModel = new User($this->pdo);
        $user = $userModel->getUserById($id);
        require_once __DIR__ . '/../Views/admin/users/edit_user.php';
    }

    // Handle updating a user
    public function updateUser($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $firstName = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING);
            $lastName = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING);

            $userModel = new User($this->pdo);
            $userModel->updateUser($id, $email, $firstName, $lastName);

            header('Location: index.php?route=admin_manage_users');
            exit();
        }
    }

    // Handle deleting a user
    public function deleteUser($id)
    {
        $userModel = new User($this->pdo);
        $user = $userModel->getUserById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel->deleteUser($id);
            header('Location: index.php?route=admin_manage_users');
            exit();
        }

        require_once __DIR__ . '/../Views/admin/users/delete_user.php';
    }

    // Handle adding a product
    public function addProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
            $categoryID = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
            $dateAdded = filter_var($_POST['created_at'], FILTER_SANITIZE_STRING);

            $productModel = new Product($this->pdo);
            $productModel->addProduct($name, $price, $description, $categoryID, $dateAdded);

            header('Location: index.php?route=admin_manage_products');
            exit();
        }

        require_once __DIR__ . '/../Views/admin/add_product.php';
    }

    // Handle editing a product
    public function editProduct($id)
    {
        $productModel = new Product($this->pdo);
        $product = $productModel->getProductById($id);
        require_once __DIR__ . '/../Views/admin/products/edit_product.php';
    }

    // Handle updating a product
    public function updateProduct($id)
    {
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
        $productModel = new Product($this->pdo);
        $product = $productModel->getProductById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productModel->deleteProduct($id);
            header('Location: index.php?route=admin/products');
            exit();
        }

        require_once __DIR__ . '/../Views/admin/products/delete_validation.php';
    }

    // Handle updating an order status
    public function updateOrderStatus($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $status = filter_var($_POST['status'], FILTER_SANITIZE_STRING);

            $orderModel = new Order($this->pdo);
            $orderModel->updateOrderStatus($id, $status);

            header('Location: index.php?route=admin_manage_orders');
            exit();
        }
    }
}