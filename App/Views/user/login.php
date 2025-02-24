<?php
$title = 'Login';
require_once __DIR__ . '/../header.php';
?>

<divdiv role="main" class="main-content">
    <div class="login-container" role="form" aria-labelledby="login-heading">
        <h1 id="login-heading">Login</h1>
        <?php if (isset($error)): ?>
            <p role="alert"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form method="post" action="index.php?route=login">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required aria-required="true">
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required aria-required="true">
            <br>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="index.php?route=register">Register here</a>.</p>
    </div>
</>

<?php require_once __DIR__ . '/../footer.php'; ?>

