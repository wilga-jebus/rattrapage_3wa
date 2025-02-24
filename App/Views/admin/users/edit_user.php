
    <title>Edit User</title>
    <?php require_once __DIR__ . '/../../header.php'; ?>
    <h1>Edit User</h1>

    <?php if ($user): ?>
        <form method="post" action="index.php?route=admin_update_user&id=<?php echo $user['userID']; ?>">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['emailAddress']); ?>" required>
            <br>
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" value="<?php echo htmlspecialchars($user['firstName']); ?>" required>
            <br>
            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" value="<?php echo htmlspecialchars($user['lastName']); ?>" required>
            <br>
            <button type="submit">Update User</button>
        </form>
    <?php else: ?>
        <p>User not found.</p>
    <?php endif; ?>

    <a href="index.php?route=admin_manage_users">Back to Users</a>
<?php require_once __DIR__ . '/../../footer.php'; ?>