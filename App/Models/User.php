<?php

namespace App\Models;

class User
{
    private $pdo;

    // Constructor to initialize the PDO instance
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Get a user by their email address
    public function getUserByEmail($email)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE emailAddress = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch();
    }

    // Create a new user
    public function createUser($email, $password, $firstName, $lastName, $isadmin)
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->pdo->prepare("INSERT INTO users (emailAddress, password, firstName, lastName, isadmin) VALUES (:email, :password, :firstName, :lastName, :isadmin)");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':isadmin', $isadmin);
        $stmt->execute();
    }

    // Create a new administrator
    public function createAdmin($email, $password, $firstName, $lastName)
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $isadmin = 1; // Always set to 1 for admin registration
        $stmt = $this->pdo->prepare("INSERT INTO users (emailAddress, password, firstName, lastName, isadmin) VALUES (:email, :password, :firstName, :lastName, :isadmin)");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':isadmin', $isadmin);
        $stmt->execute();
    }

    // Delete a user from the database
    public function deleteUser($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE userID = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    // Update a user in the database
    public function updateUser($id, $email, $firstName, $lastName)
    {
        $stmt = $this->pdo->prepare("UPDATE users SET emailAddress = :email, firstName = :firstName, lastName = :lastName WHERE userID = :id");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    // Get all users from the database
    public function getAllUsers()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Get a user by their ID
    public function getUserById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE userID = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }
}