<?php
session_start(); // Start the session

// Include the database configuration and get the PDO instance
require_once __DIR__ . '/config/config.php';
$pdo = getDatabaseConnection();

// Autoload
spl_autoload_register(function ($class) {
    require_once lcfirst(str_replace('\\', '/', $class)) . '.php';
});

// Check if the 'route' parameter exists in the query string
if (array_key_exists('route', $_GET)) {
    switch ($_GET['route']) {
        case 'home':
            $controller = new App\Controllers\HomeController($pdo);
            $controller->index();
            break;

        case 'login':
            $controller = new App\Controllers\UserController($pdo);
            $controller->login();
            break;

        case 'register':
            $controller = new App\Controllers\UserController($pdo);
            $controller->register();
            break;

        case 'back_to_dashboard':

            if ($_SESSION['isadmin'] == 1) {
                require_once __DIR__ . '/App/Views/admin/index.php';
            } else {
                header('Location: index.php?route=login');
            }

            break;

        case 'admin/register':
            $controller = new App\Controllers\UserController($pdo);
            $controller->adminRegister();
            break;

        case 'profile':
            $controller = new App\Controllers\UserController($pdo);
            $controller->profile();
            break;

        case 'logout':
            $controller = new App\Controllers\UserController($pdo);
            $controller->logout();
            break;

        case 'admin_dashboard':
            $controller = new App\Controllers\AdminController($pdo);
            $controller->index();
            break;


        case 'admin/products':
            $controller = new App\Controllers\AdminController($pdo);
            $controller->manageProducts();
            break;


        case 'admin/add_product':
            $controller = new App\Controllers\AdminController($pdo);
            $controller->addProduct();
            break;

        case 'admin/edit_product':
            if (isset($_GET['id'])) {
                $controller = new App\Controllers\AdminController($pdo);
                $controller->editProduct($_GET['id']);
            } else {
                header('Location: index.php?route=admin/products');
                exit();
            }
            break;

        case 'admin/delete_product':
            if (isset($_GET['id'])) {
                $controller = new App\Controllers\AdminController($pdo);
                $controller->deleteProduct($_GET['id']);
            } else {
                header('Location: index.php?route=admin/products');
                exit();
            }
            break;

        case 'admin/update_product':
            if (isset($_GET['id'])) {
                $controller = new App\Controllers\AdminController($pdo);
                $controller->updateProduct($_GET['id']);
            } else {
                header('Location: index.php?route=admin/products');
                exit();
            }
            break;

        case 'admin/user':
            $controller = new App\Controllers\AdminController($pdo);
            $controller->manageUsers();
            break;

        case 'admin_manage_users':
            $controller = new App\Controllers\AdminController($pdo);
            $controller->manageUsers();
            break;

        case 'admin_edit_user':
            if (isset($_GET['id'])) {
                $controller = new App\Controllers\AdminController($pdo);
                $controller->editUser($_GET['id']);
            } else {
                header('Location: index.php?route=admin_manage_users');
                exit();
            }
            break;

        case 'admin_delete_user':
            if (isset($_GET['id'])) {
                $controller = new App\Controllers\AdminController($pdo);
                $controller->deleteUser($_GET['id']);
            } else {
                header('Location: index.php?route=admin_manage_users');
                exit();
            }
            break;

        case 'admin_update_user':
            if (isset($_GET['id'])) {
                $controller = new App\Controllers\AdminController($pdo);
                $controller->updateUser($_GET['id']);
            } else {
                header('Location: index.php?route=admin_manage_users');
                exit();
            }
            break;

        case 'admin/orders':
            $controller = new App\Controllers\AdminController($pdo);
            $controller->manageOrders();
            break;

        case 'products':
            $controller = new App\Controllers\ProductController($pdo);
            $controller->index();
            break;

        case 'product':
            if (isset($_GET['id'])) {
                $controller = new App\Controllers\ProductController($pdo);
                $controller->view($_GET['id']);
            } else {
                header('Location: index.php?route=home');
                exit();
            }
            break;

        case 'cart':
            $controller = new App\Controllers\CartController($pdo);
            $controller->index();
            break;

        case 'cart_add':
            if (isset($_GET['id']) && isset($_GET['code'])) {
                $controller = new App\Controllers\CartController($pdo);
                $controller->add($_GET['id'], $_GET['code']);
            } else {
                header('Location: index.php?route=home');
                exit();
            }
            break;

        case 'cart_remove':
            if (isset($_GET['productId'])) {
                $controller = new App\Controllers\CartController($pdo);
                $controller->remove($_GET['productId']);
            } else {
                header('Location: index.php?route=cart');
                exit();
            }
            break;

        case 'cart_update':
            if (isset($_GET['productId']) && isset($_POST['quantity'])) {
                $controller = new App\Controllers\CartController($pdo);
                $controller->update($_GET['productId'], $_POST['quantity']);
            } else {
                header('Location: index.php?route=cart');
                exit();
            }
            break;

        case 'cart_clear':
            $controller = new App\Controllers\CartController($pdo);
            $controller->clear();
            break;

        case 'checkout':
            $controller = new App\Controllers\CheckoutController($pdo);
            $controller->index();
            break;

        case 'invoices':
            $controller = new App\Controllers\InvoiceController($pdo);
            $controller->index();
            break;

        case 'invoice_view':
            if (isset($_GET['id'])) {
                $controller = new App\Controllers\InvoiceController($pdo);
                $controller->view($_GET['id']);
            } else {
                header('Location: index.php?route=invoices');
                exit();
            }
            break;

        case 'invoice_create':
            $controller = new App\Controllers\InvoiceController($pdo);
            $controller->create();
            break;

        case 'invoice_delete':
            if (isset($_GET['id'])) {
                $controller = new App\Controllers\InvoiceController($pdo);
                $controller->delete($_GET['id']);
            } else {
                header('Location: index.php?route=invoices');
                exit();
            }
            break;

        case 'categories':
            $controller = new App\Controllers\CategoryController($pdo);
            $controller->index();
            break;

        case 'category':
            if (isset($_GET['name'])) {
                $controller = new App\Controllers\CategoryController($pdo);
                $controller->view($_GET['name']);
            } else {
                header('Location: index.php?route=categories');
                exit();
            }
            break;

        default:
            header('Location: index.php?route=home');
            exit();
    }
} else {
    header('Location: index.php?route=home'); // Default route
    exit();
}