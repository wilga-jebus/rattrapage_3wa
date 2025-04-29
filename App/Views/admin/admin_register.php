<?php

require_once __DIR__ . '/../header.php';
?>

<div class="row limited">
    <section class="column small-12 row-center-h1">
        <h1>Admin Register</h1>
    </section>
</div>

<div class="row limited">
    <section class="column small-12 section-form">
    <form method="post" action="index.php?route=admin/register" class="edit-user-form">
        <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        </div>
        <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        </div>
        <div>
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required>
        </div>
        <br>
        <div>
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required>
        </div>
        <div>
        <label for="isadmin">Register as Admin:</label>
        <input type="checkbox" id="isadmin" name="isadmin" value="1" checked disabled>
        </div>
        <div>
        <button type="submit">Register</button>
        </div>
    </form>
    </section>
</div


<?php require_once __DIR__ . '/../footer.php'; ?>