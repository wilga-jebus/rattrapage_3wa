<?php

// Database configuration constants
define('DB_HOST', 'localhost');
define('DB_NAME', 'bdd_test');
define('DB_USER', 'root');
define('DB_PASS', '');

// Establish a database connection using PDO
function getDatabaseConnection() {
    try {
        $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo'bonne connexion';
        return $pdo;
    } catch (PDOException $e) {
        die('Database connection failed: ' . $e->getMessage());
    }
}
