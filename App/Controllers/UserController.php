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

            $errors = []; 

            if (strlen(trim($password)) < 8) {
                $errors[] = "La longueur du mot de passe doit être d'au moins 8 caractères.";
            }
            
            
            
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Veuillez renseigner une adresse email valide.";
            }
            
            // More validations possible

    
            if(empty($errors)) {
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
                    exit();
                }
                
            } 
                
                header('Location: index.php?route=profile');
                exit();
            } else {
                require_once __DIR__ . '/../Views/user/login.php';

            }

            
        }

        require_once __DIR__ . '/../Views/user/login.php';
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

            $errors = [];

            if (strlen(trim($password)) < 8) {
                $errors[] = "La longueur du mot de passe doit être d'au moins 8 caractères.";// translate in english in final version.
            }
            
            if(empty(trim($firstName)) || strlen(trim($firstName)) < 2) {
                $errors[] = "Veuillez renseigner votre firstName.(minimum 2 lettres)";
            }
            
            if(empty(trim($lastName)) || strlen(trim($lastName)) < 2) {
                $errors[] = "Veuillez renseigner votre lastName.(minimum 2 lettres)";
            }
            
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Veuillez renseigner une adresse email valide.";
            }
            
            // More validations possible

    
            if(empty($errors)) {
                $userModel = new User($this->pdo);
                $userModel->createUser($email, $password, $firstName, $lastName, $isadmin);
                header('Location: index.php?route=login');
                exit();
            } else {
                require_once __DIR__ . '/../Views/user/register.php';

            }


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
        $user = $userModel->getUserById(filter_var($_SESSION['user_id'], FILTER_SANITIZE_NUMBER_INT));

        require_once __DIR__ . '/../Views/user/profile.php';
    }

    // Handle user logout
    public function logout()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        session_unset();
        session_destroy();
        header('Location: index.php?route=home');
        exit();
    }
}