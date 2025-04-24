<?php
$title = 'Login';
require_once __DIR__ . '/../header.php';
?>


    <div class="row limited">
       <section class="column small-12 labeled"> 
        <h1>Login</h1>
        <?php if (isset($error)): ?>
            <p ><?php echo htmlspecialchars($error); ?></p>
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
        </section>
    </div>


<?php require_once __DIR__ . '/../footer.php'; ?>

