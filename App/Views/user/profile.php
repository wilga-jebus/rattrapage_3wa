<?php

require_once __DIR__ . '/../header.php';
?>

<div class="row limited">
    <section class="column small-12 ">
        <h1 class="row-center-h1">Profile</h1>
    </section>
</div>
<div class="row limited">
    <section class="column small-12">
        <table class="login-form">
            <tr>
                <td>
                    <p>Email: <?php echo htmlspecialchars($user['emailAddress']); ?></p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>First Name: <?php echo htmlspecialchars($user['firstName']); ?></p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Last Name: <?php echo htmlspecialchars($user['lastName']); ?></p>
                </td>
            </tr>
            <tr>
                <td> <a href="index.php?route=logout" class="logout-button">Logout</a></td>
            </tr>
        </table>
    </section>
</div>

<?php require_once __DIR__ . '/../footer.php'; ?>