<?php

$title = 'Shopping Cart';
require_once __DIR__ . '/../header.php';

?>
<div class="row limited">
        <section class="column small-12  form-title">
            <h1>Shopping Cart</h1> 
        </section>
    </div>

<div class="row limited">
    

    <?php if (!empty($cartItems)): ?>
        <section class="column small-112">
        <table class="">
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
        <br><br><br><br><br><br><br>
        <div class="login-form">
        <a href="index.php?route=cart_clear" class="clear-cart">Clear Cart</a>
        </div>
    <?php else: ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>
    </section>
</div>

<?php
require_once __DIR__ . '/../footer.php';
?>