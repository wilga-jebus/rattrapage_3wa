<?php
$title = 'Manage Orders';
require_once __DIR__ . '/../header.php';

?>


<div>
    <h1>Manage Orders</h1>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?php echo htmlspecialchars($order['orderID']); ?></td>
                    <td><?php echo htmlspecialchars($order['userID']); ?></td>
                    <td><?php echo htmlspecialchars($order['orderDate']); ?></td>
                    <td><?php echo htmlspecialchars($order['cardType']); ?></td>
                    <td>
                        <a
                            href="index.php?route=admin_view_order&id=<?php echo htmlspecialchars($order['orderID']); ?>">View</a>
                        <a
                            href="index.php?route=admin_update_order_status&id=<?php echo htmlspecialchars($order['orderID']); ?>">Update
                            Status</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__ . '/../footer.php'; ?>