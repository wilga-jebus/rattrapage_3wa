<!DOCTYPE html>
<html>
<head>
    <title>Update Order Status</title>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
</head>
<body>
    <h1>Update Order Status</h1>

    <?php if ($order): ?>
        <form method="post" action="/admin/orders/update/<?php echo $order['orderID']; ?>">
            <label for="status">Order Status:</label>
            <select id="status" name="status" required>
                <option value="Pending" <?php echo $order['status'] == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                <option value="Processing" <?php echo $order['status'] == 'Processing' ? 'selected' : ''; ?>>Processing</option>
                <option value="Completed" <?php echo $order['status'] == 'Completed' ? 'selected' : ''; ?>>Completed</option>
                <option value="Cancelled" <?php echo $order['status'] == 'Cancelled' ? 'selected' : ''; ?>>Cancelled</option>
            </select>
            <br>
            <button type="submit">Update Status</button>
        </form>
    <?php else: ?>
        <p>Order not found.</p>
    <?php endif; ?>

    <a href="/admin/orders">Back to Orders</a>
</body>
</html>