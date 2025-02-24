<?php

namespace App\Models;

class Cart
{
    // Constructor to initialize the session
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }

    // Get all items in the cart
    public function getCartItems()
    {
        return $_SESSION['cart'];
    }

    // Add a product to the cart
    public function addProduct($productId, $productCode)
    {
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]['quantity'] += 1;
        } else {
            $_SESSION['cart'][$productId] = [
                'productId' => $productId,
                'productCode' => $productCode,
                'quantity' => 1
            ];
        }
    }

    // Remove a product from the cart
    public function removeProduct($productId)
    {
        if (isset($_SESSION['cart'][$productId])) {
            unset($_SESSION['cart'][$productId]);
        }
    }

    // Update the quantity of a product in the cart
    public function updateProductQuantity($productId, $quantity)
    {
        if (isset($_SESSION['cart'][$productId])) {
            if ($quantity > 0) {
                $_SESSION['cart'][$productId]['quantity'] = $quantity;
            } else {
                $this->removeProduct($productId);
            }
        }
    }

    // Clear the cart
    public function clearCart()
    {
        $_SESSION['cart'] = [];
    }
}