<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title ?? 'My Application'); ?></title>
    <link rel="stylesheet" href="/ma_premiere_guitare/public/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script defer src="/ma_premiere_guitare/public/js/script.js"></script>
</head>
<body>
    <header role="banner">
        <nav class="navbar" role="navigation" aria-label="Main Navigation">
            <div class="navbar-left">
                <a href="index.php?route=home" aria-label="Home"><i class="fas fa-home"></i></a>
            </div>
            <div class="navbar-logo">
                <h1>Ma Première Guitare Shop</h1>
            </div>
            <div class="navbar-right">
                <?php if (isset($_SESSION['isadmin']) && $_SESSION['isadmin'] == 0): ?>
                    <a href="index.php?route=products">Guitars</a>
                    <a href="index.php?route=categories">Categories</a>
                    <a href="index.php?route=logout" aria-label="Logout">Logout</a>
                <?php elseif (isset($_SESSION['isadmin']) && $_SESSION['isadmin'] == 1): ?>
                    <a href="index.php?route=back_to_dashboard" aria-label="Admin">Admin Menu</a>
                    <a href="index.php?route=logout" aria-label="Logout">Logout</a>
                <?php else: ?>
                    <a href="index.php?route=products">Guitars</a>
                    <a href="index.php?route=categories">Categories</a>
                    <a href="index.php?route=cart" aria-label="Cart"><i class="fas fa-shopping-cart"></i></a>
                    <a id="login-logout-link" href="index.php?route=login" aria-label="Login">Login</a>
                <?php endif; ?>
                <button id="dark-mode-toggle" aria-label="Toggle Dark Mode"><i class="fas fa-moon"></i></button>
            </div>
        </nav>
    </header>
    <main role="main">