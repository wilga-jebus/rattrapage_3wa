<?php

require_once __DIR__ . '/../../header.php';
?>

<div class="row limited">
    <section class="column small-12">
        <h1 class="row-center-h1">Manage Orders</h1>
    </section>
</div>
    

    <!-- List of orders -->
    <h2>Order List</h2>
    <table class="">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>User ID</th>
                <th>Order Date</th>
                <th>Total Amount</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($orders) && (is_array($orders) || is_object($orders))): ?>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($order['id']); ?></td>
                        <td><?php echo htmlspecialchars($order['user_id']); ?></td>
                        <td><?php echo htmlspecialchars($order['order_date']); ?></td>
                        <td><?php echo htmlspecialchars($order['total_amount']); ?></td>
                        <td><?php echo htmlspecialchars($order['status']); ?></td>
                        <td>
                            <a href="index.php?route=admin/orders/view&id=<?php echo $order['id']; ?>">View</a>
                            <a href="index.php?route=admin/orders/update&id=<?php echo $order['id']; ?>">Update Status</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No orders available.</td>
                </tr>
            <?php endif; ?>
        </tbody>
            </table>

<?php require_once __DIR__ . '/../../footer.php'; ?>