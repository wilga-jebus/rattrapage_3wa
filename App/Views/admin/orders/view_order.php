<!DOCTYPE html>
<html>
<head>
    <title>View Order</title>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
</head>
<body>
    <h1>View Order</h1>

    <?php if ($order): ?>
        <p><strong>Order ID:</strong> <?php echo htmlspecialchars($order['orderID']); ?></p>
        <p><strong>User ID:</strong> <?php echo htmlspecialchars($order['userID']); ?></p>
        <p><strong>Order Date:</strong> <?php echo htmlspecialchars($order['orderDate']); ?></p>
        <p><strong>Total Amount:</strong> $<?php echo htmlspecialchars($order['totalAmount']); ?></p>
        <p><strong>Status:</strong> <?php echo htmlspecialchars($order['status']); ?></p>

        <h2>Order Items</h2>
        <table>
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orderItems as $item): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['productID']); ?></td>
                        <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                        <td>$<?php echo htmlspecialchars($item['price']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Order not found.</p>
    <?php endif; ?>

    <a href="/admin/orders">Back to Orders</a>
</body>
</html>