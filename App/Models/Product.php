<?php

namespace App\Models;

class Product
{
    private $pdo;

    // Constructor to initialize the PDO instance
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Get all products from the database
    public function getAllProducts()
    {
        $stmt = $this->pdo->prepare("
            SELECT p.*, c.categoryName 
            FROM products p
            JOIN categories c ON p.categoryID = c.categoryID
        ");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Get a single product by its ID
    public function getProductById($id)
    {
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $stmt = $this->pdo->prepare("
            SELECT p.*, c.categoryName 
            FROM products p
            JOIN categories c ON p.categoryID = c.categoryID
            WHERE p.productID = :id
        ");
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    // Update a product in the database
    public function updateProduct($id, $name, $price, $description, $categoryID)
    {
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $price = filter_var($price, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $description = filter_var($description, FILTER_SANITIZE_STRING);
        $categoryID = filter_var($categoryID, FILTER_SANITIZE_NUMBER_INT);

        $stmt = $this->pdo->prepare("UPDATE products SET productName = :name, listPrice = :price, description = :description, categoryID = :categoryID WHERE productID = :id");
        $stmt->bindParam(':name', $name, \PDO::PARAM_STR);
        $stmt->bindParam(':price', $price, \PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, \PDO::PARAM_STR);
        $stmt->bindParam(':categoryID', $categoryID, \PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
    }

    // Add a new product to the database
    public function addProduct($name, $price, $description, $categoryID, $dateAdded)
    {
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $price = filter_var($price, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $description = filter_var($description, FILTER_SANITIZE_STRING);
        $categoryID = filter_var($categoryID, FILTER_SANITIZE_NUMBER_INT);
        $dateAdded = filter_var($dateAdded, FILTER_SANITIZE_STRING);

        // Generate a unique product code
        $productCode = uniqid('prod_');

        // Convert dateAdded to the correct format for MySQL datetime
        $dateAdded = date('Y-m-d H:i:s', strtotime($dateAdded));

        $stmt = $this->pdo->prepare("INSERT INTO products (productCode, productName, listPrice, description, categoryID, dateAdded) VALUES (:productCode, :name, :price, :description, :categoryID, :dateAdded)");
        $stmt->bindParam(':productCode', $productCode, \PDO::PARAM_STR);
        $stmt->bindParam(':name', $name, \PDO::PARAM_STR);
        $stmt->bindParam(':price', $price, \PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, \PDO::PARAM_STR);
        $stmt->bindParam(':categoryID', $categoryID, \PDO::PARAM_INT);
        $stmt->bindParam(':dateAdded', $dateAdded, \PDO::PARAM_STR);
        $stmt->execute();
    }

    // Delete a product from the database
    public function deleteProduct($id)
    {
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $stmt = $this->pdo->prepare("DELETE FROM products WHERE productID = :id");
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
    }
}