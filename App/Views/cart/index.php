<?php

$title = 'Shopping Cart';
require_once __DIR__ . '/../header.php';
?>

<div role="main" class="main-content">
    <h1>Shopping Cart</h1>

    <?php if (!empty($cartItems)): ?>
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Product Image</th>
                    <th>Product ID</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cartItems as $item): ?>
                    <tr>
                        <td>
                            <img class="cart_img_rotation" src="public/images/products/<?php echo htmlspecialchars($item['productCode']); ?>.png" alt="Product Image">
                        </td>
                        <td><?php echo htmlspecialchars($item['productId']); ?></td>
                        <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                        <td>
                            <a href="index.php?route=cart_remove&productId=<?php echo htmlspecialchars($item['productId']); ?>">Remove</a>
                            <form action="index.php?route=cart_update&productId=<?php echo htmlspecialchars($item['productId']); ?>" method="post">
                                <input type="number" name="quantity" value="<?php echo htmlspecialchars($item['quantity']); ?>" min="1">
                                <button type="submit">Update</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="index.php?route=cart_clear" class="clear-cart">Clear Cart</a>
    <?php else: ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>
</div>

<?php
require_once __DIR__ . '/../footer.php';
?>