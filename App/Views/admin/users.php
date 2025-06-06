<?php
$title = 'Manage Users';
require_once __DIR__ . '/../header.php';

?>
<div class="row limited">
    <section class="column small-12 row-center-h1">
        <h1>Manage Users</h1>
    </section>
</div>

<div  class="row limited">
    
    <session class="column small-12 section-form">
    <!-- List of users -->
    <h2>User List</h2>
    <table class="user-edit-form">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Email</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($users) && is_array($users)): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($user['userID']); ?></td>
                        <td><?php echo htmlspecialchars($user['emailAddress']); ?></td>
                        <td><?php echo htmlspecialchars($user['firstName']); ?></td>
                        <td><?php echo htmlspecialchars($user['lastName']); ?></td>
                        <td>
                            <a href="index.php?route=admin_edit_user&id=<?php echo htmlspecialchars($user['userID']); ?>">Edit</a>
                            <a href="index.php?route=admin_delete_user&id=<?php echo htmlspecialchars($user['userID']); ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No users found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    </session>
</div>

<?php
require_once __DIR__ . '/../footer.php';
?>