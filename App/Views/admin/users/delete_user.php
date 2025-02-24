
    <title>Delete User</title>
    <?php require_once __DIR__ . '/../../header.php'; ?>
    <h1>Delete User</h1>

    <?php if ($user): ?>
        <p>Are you sure you want to delete the user <strong><?php echo htmlspecialchars($user['emailAddress']); ?></strong>?</p>
        <form method="post" action="index.php?route=admin_delete_user&id=<?php echo $user['userID']; ?>">
            <button type="submit">Yes, Delete</button>
            <a href="index.php?route=admin_manage_users">Cancel</a>
        </form>
    <?php else: ?>
        <p>User not found.</p>
        <a href="index.php?route=admin_manage_users">Back to Users</a>
    <?php endif; ?>

   <?php require_once __DIR__ . '/../../footer.php'; ?> 
