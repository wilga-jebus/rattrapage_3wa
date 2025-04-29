
<?php require_once __DIR__ . '/../../header.php'; ?>
<div class="row limited">
    <section class="column small-12 row-center-h1">
        <h1>Edit User</h1>
    </section>
</div>
 <div class="row limited ">
<?php if ($user): ?>
    <section class="column small-12  large-6 section-form">
    <form method="post" action="index.php?route=admin_update_user&id=<?php echo htmlspecialchars($user['userID']); ?>" class="edit-user-form">
        <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['emailAddress']); ?>" required>
        </div>
        <br>
        <div>
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" value="<?php echo htmlspecialchars($user['firstName']); ?>" required>
        </div>
        <br>
        <div>
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" value="<?php echo htmlspecialchars($user['lastName']); ?>" required>
        </div>
        <br>
        <div>
        <button type="submit">Update User</button>
        </div>
    </form>
<?php else: ?>
    <p>User not found.</p>
<?php endif; ?>
<div>
<a href="index.php?route=admin_manage_users">Back to Users</a>
</div>
</section>

</div>
<?php require_once __DIR__ . '/../../footer.php'; ?>