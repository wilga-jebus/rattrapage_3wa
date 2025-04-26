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



        //*****************************************************************************
        // Routes allowed to all users (signed in Or not)
        //*****************************************************************************

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



        //****************************************************************************************************
        // Routes allowed once signed in (users or admin)
        //*****************************************************************************************************

        case 'profile':
            (new App\Controllers\MiddlewareController())->isConnected();

            $controller = new App\Controllers\UserController($pdo);
            $controller->profile();
            break;

        case 'logout':
            (new App\Controllers\MiddlewareController())->isConnected();

            $controller = new App\Controllers\UserController($pdo);
            $controller->logout();
            break;

        case 'checkout':
            (new App\Controllers\MiddlewareController())->isConnected();

            $controller = new App\Controllers\CheckoutController($pdo);
            $controller->index();
            break;



 //*******************************************************************************************
//                                    Routes: only admin allowed
//*******************************************************************************************

        case 'back_to_dashboard':
            (new App\Controllers\MiddlewareController())->hasRoleAdmin();
            require_once __DIR__ . '/App/Views/admin/index.php';
            break;

        case 'admin/register':
            (new App\Controllers\MiddlewareController())->hasRoleAdmin();

            $controller = new App\Controllers\UserController($pdo);
            $controller->adminRegister();
            break;

        case 'admin_dashboard':
            (new App\Controllers\MiddlewareController())->hasRoleAdmin();

            $controller = new App\Controllers\AdminController($pdo);
            $controller->index();
            break;

        case 'admin/products':
            (new App\Controllers\MiddlewareController())->hasRoleAdmin();

            $controller = new App\Controllers\AdminController($pdo);
            $controller->manageProducts();
            break;

        case 'admin/add_product':
            (new App\Controllers\MiddlewareController())->hasRoleAdmin();

            $controller = new App\Controllers\AdminController($pdo);
            $controller->addProduct();
            break;

        case 'admin/edit_product':
            (new App\Controllers\MiddlewareController())->hasRoleAdmin();

            if (isset($_GET['id'])) {
                $controller = new App\Controllers\AdminController($pdo);
                $controller->editProduct($_GET['id']);
            } else {
                header('Location: index.php?route=admin/products');
                exit();
            }
            break;

        case 'admin/delete_product':
            (new App\Controllers\MiddlewareController())->hasRoleAdmin();

            if (isset($_GET['id'])) {
                $controller = new App\Controllers\AdminController($pdo);
                $controller->deleteProduct($_GET['id']);
            } else {
                header('Location: index.php?route=admin/products');
                exit();
            }
            break;

        case 'admin/update_product':
            (new App\Controllers\MiddlewareController())->hasRoleAdmin();

            if (isset($_GET['id'])) {
                $controller = new App\Controllers\AdminController($pdo);
                $controller->updateProduct($_GET['id']);
            } else {
                header('Location: index.php?route=admin/products');
                exit();
            }
            break;

        case 'admin/user':
            (new App\Controllers\MiddlewareController())->hasRoleAdmin();

            $controller = new App\Controllers\AdminController($pdo);
            $controller->manageUsers();
            break;

        case 'admin_manage_users':
            (new App\Controllers\MiddlewareController())->hasRoleAdmin();

            $controller = new App\Controllers\AdminController($pdo);
            $controller->manageUsers();
            break;

        case 'admin_edit_user':
            (new App\Controllers\MiddlewareController())->hasRoleAdmin();

            if (isset($_GET['id'])) {
                $controller = new App\Controllers\AdminController($pdo);
                $controller->editUser($_GET['id']);
            } else {
                header('Location: index.php?route=admin_manage_users');
                exit();
            }
            break;

        case 'admin_delete_user':
            (new App\Controllers\MiddlewareController())->hasRoleAdmin();

            if (isset($_GET['id'])) {
                $controller = new App\Controllers\AdminController($pdo);
                $controller->deleteUser($_GET['id']);
            } else {
                header('Location: index.php?route=admin_manage_users');
                exit();
            }
            break;

        case 'admin_update_user':
            (new App\Controllers\MiddlewareController())->hasRoleAdmin();

            if (isset($_GET['id'])) {
                $controller = new App\Controllers\AdminController($pdo);
                $controller->updateUser($_GET['id']);
            } else {
                header('Location: index.php?route=admin_manage_users');
                exit();
            }
            break;

        case 'admin_view_order':
            (new App\Controllers\MiddlewareController())->hasRoleAdmin();

            if (isset($_GET['id'])) {
                $controller = new App\Controllers\AdminController($pdo);
                $controller->viewOrder($_GET['id']);
            } else {
                header('Location: index.php?route=admin_manage_users');
                exit();
            }
            break;

        case 'admin/orders':
            (new App\Controllers\MiddlewareController())->hasRoleAdmin();

            $controller = new App\Controllers\AdminController($pdo);
            $controller->manageOrders();
            break;

        case 'invoices':
            (new App\Controllers\MiddlewareController())->hasRoleAdmin();

            $controller = new App\Controllers\InvoiceController($pdo);
            $controller->index();
            break;

        case 'invoice_view':
            (new App\Controllers\MiddlewareController())->hasRoleAdmin();

            if (isset($_GET['id'])) {
                $controller = new App\Controllers\InvoiceController($pdo);
                $controller->view($_GET['id']);
            } else {
                header('Location: index.php?route=invoices');
                exit();
            }
            break;

        case 'invoice_create':
            (new App\Controllers\MiddlewareController())->hasRoleAdmin();

            $controller = new App\Controllers\InvoiceController($pdo);
            $controller->create();
            break;

        case 'invoice_delete':
            (new App\Controllers\MiddlewareController())->hasRoleAdmin();

            if (isset($_GET['id'])) {
                $controller = new App\Controllers\InvoiceController($pdo);
                $controller->delete($_GET['id']);
            } else {
                header('Location: index.php?route=invoices');
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