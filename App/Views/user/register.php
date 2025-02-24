<?php
$title = 'Register';
require_once __DIR__ . '/../header.php';
?>

<div role="main" class="main-content">
    <div class="login-container" role="form" aria-labelledby="register-heading">
        <h1 id="register-heading">Register</h1>
        <form method="post" action="index.php?route=register">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required aria-required="true">
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required aria-required="true">
            <br>
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" required aria-required="true">
            <br>
            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" required aria-required="true">
            <br>
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="index.php?route=login">Login here</a>.</p>
    </div>
</div>

<?php require_once __DIR__ . '/../footer.php'; ?>