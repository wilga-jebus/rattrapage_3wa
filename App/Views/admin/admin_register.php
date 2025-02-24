<?php
$title = 'Admin Register';
require_once __DIR__ . '/../header.php';
?>

<div role="main" class="main-content">
    <h1>Admin Register</h1>
    <form method="post" action="index.php?route=admin/register">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required>
        <br>
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required>
        <br>
        <label for="isadmin">Register as Admin:</label>
        <input type="checkbox" id="isadmin" name="isadmin" value="1" checked disabled>
        <br>
        <button type="submit">Register</button>
    </form>
</div


<?php require_once __DIR__ . '/../footer.php'; ?>