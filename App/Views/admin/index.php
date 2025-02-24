<?php require_once __DIR__ . '/../header.php'; ?>

<div role="main" class="main-content">
    <h1>Admin Dashboard</h1>
    
    <div class="admin-dashboard">
        <ul class="admin-dashboard-list">
            <li><a href="index.php?route=admin/products">Manage Products</a></li>
            <li><a href="index.php?route=admin/orders">Manage Orders</a></li>
            <li><a href="index.php?route=admin/user">Manage Users</a></li>
            <li><a href="index.php?route=admin/register">Admin Register</a></li>
        </ul>
    </div>
</div>

<?php require_once __DIR__ . '/../footer.php'; ?>
