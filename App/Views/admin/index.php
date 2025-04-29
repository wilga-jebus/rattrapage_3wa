<?php require_once __DIR__ . '/../header.php'; ?>

<div class="row limited">
        <section class="column small-12 ">
            <h1 class="row-center-h1">Admin Dashboard</h1> 
        </section>
    </div>
            
    <div class="row limited">
    <section class="column small-12 section-form">
        <table class="edit-user-form">
            <tr>>
            <td><a href="index.php?route=admin/products">Manage Products</a></td>
            </tr>
            <tr>
            <td><a href="index.php?route=admin/orders">Manage Orders</a></td>
            </tr>
            <tr>
            <td><a href="index.php?route=admin/user">Manage Users</a></td>
            </tr>
            <tr>
            <td><a href="index.php?route=admin/register">Admin Register</a></td>
            <tr>
</table>
    </section>    

    </div>


<?php require_once __DIR__ . '/../footer.php'; ?>
