<?php

namespace App\Controllers;

use App\Models\Cart;

class CartController
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Display the cart
    public function index()
    {
        $cartModel = new Cart();
        $cartItems = $cartModel->getCartItems();
        require_once __DIR__ . '/../views/cart/index.php';
    }

    // Add a product to the cart
    public function add($productId, $productCode)
    {
        $productId = filter_var($productId, FILTER_SANITIZE_NUMBER_INT);
        $productCode = filter_var($productCode, FILTER_SANITIZE_STRING);

        $cartModel = new Cart();
        $cartModel->addProduct($productId, $productCode);
        header('Location: index.php?route=products');
        exit();
    }

    // Remove a product from the cart
    public function remove($productId)
    {
        $productId = filter_var($productId, FILTER_SANITIZE_NUMBER_INT);

        $cartModel = new Cart();
        $cartModel->removeProduct($productId);
        header('Location: index.php?route=cart');
        exit();
    }

    // Update the quantity of a product in the cart
    public function update($productId, $quantity)
    {
        $productId = filter_var($productId, FILTER_SANITIZE_NUMBER_INT);
        $quantity = filter_var($quantity, FILTER_SANITIZE_NUMBER_INT);

        $cartModel = new Cart();
        $cartModel->updateProductQuantity($productId, $quantity);
        header('Location: index.php?route=cart');
        exit();
    }

    // Clear the cart
    public function clear()
    {
        $cartModel = new Cart();
        $cartModel->clearCart();
        header('Location: index.php?route=cart');
        exit();
    }
}