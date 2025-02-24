<?php

namespace App\Models;

class Category
{
    private $pdo;

    // Constructor to initialize the PDO instance
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Get all categories from the database
    public function getAllCategories()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM categories");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Get a single category by its ID
    public function getCategoryById($id)
    {
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $stmt = $this->pdo->prepare("SELECT * FROM categories WHERE categoryID = :id");
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    // Get a category by its name
    public function getCategoryByName($name)
    {
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $stmt = $this->pdo->prepare("SELECT * FROM categories WHERE categoryName = :name");
        $stmt->bindParam(':name', $name, \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    // Get products by category ID
    public function getProductsByCategory($categoryId)
    {
        $categoryId = filter_var($categoryId, FILTER_SANITIZE_NUMBER_INT);
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE categoryID = :categoryId");
        $stmt->bindParam(':categoryId', $categoryId, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}