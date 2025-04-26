<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,700;1,300&display=swap"
        rel="stylesheet">
    
    <link rel="stylesheet" href="./public/css/sass.css">


    <title>Home | Ma Prmiere Guitare Shop</title>

</head>

<body>
    <header >
        <div class="row limited">
            <section class="column small-12">
                <h1>Ma Premiere</h1>
                <h2>Guitare Shop</h2>
            </section>
        </div> <!-- end row -->
    </header>
    <nav >
        <div class="row limited">
            <button id="guitarBtn">&#9776;</button>
            <ul class="primaryNav ">
                <li class="active"><a href="index.php?route=home">HOME</a></li>
                <?php if (isset($_SESSION['isadmin']) && $_SESSION['isadmin'] == 0): ?>
                    <li><a href="index.php?route=products">Guitars</a></li>
                    <li><a href="index.php?route=categories">Categories</a></li>
                    <li><a href="index.php?route=logout">Logout</a></li>
                <?php elseif (isset($_SESSION['isadmin']) && $_SESSION['isadmin'] == 1): ?>
                    <li><a href="index.php?route=back_to_dashboard">Admin Menu</a></li>
                    <li><a href="index.php?route=logout">Logout</a></li>
                <?php else: ?>
                    <li><a href="index.php?route=products">Guitars</a></li>
                    <li><a href="index.php?route=categories">Categories</a></li>
                    <li><a href="index.php?route=cart">CART</a></li>
                    <li><a id="login-logout-link" href="index.php?route=login">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <main>