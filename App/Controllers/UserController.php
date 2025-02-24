<?php

namespace App\Controllers;

use App\Models\User;

class UserController
{
    private $pdo;

    // Constructor to initialize the PDO instance
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Display the login page
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

            $userModel = new User($this->pdo);
            $user = $userModel->getUserByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['user_id'] = $user['userID']; 
                $_SESSION['isadmin'] = $user['isAdmin']; 

                if ($user['isAdmin'] == 1) {
                   
                    require_once __DIR__ . '/../Views/admin/index.php';
                } else {
                    header('Location: index.php?route=profile'); // Redirect to user profile
                }
                exit();
            } else {
                $error = "Invalid email or password.";
            }
        }

        require_once __DIR__ . '/../views/user/login.php';
    }

    // Handle user registration
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
            $firstName = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING);
            $lastName = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING);
            $isadmin = isset($_POST['isadmin']) ? 1 : 0;

            $userModel = new User($this->pdo);
            $userModel->createUser($email, $password, $firstName, $lastName, $isadmin);

            
            header('Location: index.php?route=login');
            exit();
        }

        require_once __DIR__ . '/../Views/user/register.php';
    }

    // Handle administrator registration
    public function adminRegister()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Check if the user is an administrator
        if (!isset($_SESSION['isadmin']) || $_SESSION['isadmin'] != 1) {
            header('Location: index.php?route=login');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
            $firstName = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING);
            $lastName = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING);
            $isadmin = 1; // Always set to 1 for admin registration

            $userModel = new User($this->pdo);
            $userModel->createAdmin($email, $password, $firstName, $lastName);

            
            header('Location: index.php?route=admin');
            exit();
        }

        require_once __DIR__ . '/../Views/admin/admin_register.php';
    }

    // Display the user profile page
    public function profile()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?route=login');
            exit();
        }

        $userModel = new User($this->pdo);
        $user = $userModel->getUserById($_SESSION['user_id']);

        require_once __DIR__ . '/../views/user/profile.php';
    }

    // Handle user logout
    public function logout()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        session_unset();
        session_destroy();
        header('Location: index.php?route=login');
        exit();
    }
}