<?php
$title = 'Profile';
require_once __DIR__ . '/../header.php';
?>

<div role="main" class="main-content">
    <div class="profile-container">
        <h1>Profile</h1>
        <p>Email: <?php echo htmlspecialchars($user['emailAddress']); ?></p>
        <p>First Name: <?php echo htmlspecialchars($user['firstName']); ?></p>
        <p>Last Name: <?php echo htmlspecialchars($user['lastName']); ?></p>
        <a href="index.php?route=logout" class="logout-button">Logout</a>
    </div>
</div>

<?php require_once __DIR__ . '/../footer.php'; ?>