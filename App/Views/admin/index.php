<?php require_once __DIR__ . '/../header.php'; ?>

<div class="row limited">
        <section class="column small-12  form-title">
            <h1>Admin Dashboard</h1> 
        </section>
    </div>
    
     <br><br><br><br><br><br><br><br><br><br><br><br><br>
    
    <div class="row limited">
    <section class="column small-12">
        <ul class="admin-dashboard-list">
            <li><a href="index.php?route=admin/products">Manage Products</a></li>
            <li><a href="index.php?route=admin/orders">Manage Orders</a></li>
            <li><a href="index.php?route=admin/user">Manage Users</a></li>
            <li><a href="index.php?route=admin/register">Admin Register</a></li>
        </ul>
    </section>    

    </div>


<?php require_once __DIR__ . '/../footer.php'; ?>
