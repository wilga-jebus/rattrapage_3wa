
<?php require_once __DIR__ . '/../../header.php'; ?>
<div class="row limited">
    <section class="column small-12 row-center-h1">
        <h1>Delete User</h1>
    </section>
</div>
<div class="row limited">

<?php if ($user): ?>
    <section class="column small-12 section-form">
    <p>Are you sure you want to delete the user <strong><?php echo htmlspecialchars($user['emailAddress']); ?></strong>?</p>
    <form method="post" action="index.php?route=admin_delete_user&id=<?php echo htmlspecialchars($user['userID']); ?>"class="edit-user-form">
        <div>
        <button type="submit">Yes, Delete</button>
        </div>
        <div>
        <a href="index.php?route=admin_manage_users">Cancel</a>
        </div>
    </form>
<?php else: ?>
    <div>
    <p>User not found.</p>
    <a href="index.php?route=admin_manage_users">Back to Users</a>
    </div>
<?php endif; ?>
</section>
</div>

<?php require_once __DIR__ . '/../../footer.php'; ?>
