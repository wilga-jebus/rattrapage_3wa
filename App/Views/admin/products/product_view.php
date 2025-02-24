<?php
$title = 'Manage Products';
require_once __DIR__ . '/../../header.php';

?>
    <h1><?php echo htmlspecialchars($product['productName']); ?></h1>
    <div class="product">
        <img src="public/images/products/<?php echo htmlspecialchars($product['productCode']); ?>.png" alt="<?php echo htmlspecialchars($product['productName']); ?>">
        <p><?php echo htmlspecialchars($product['description']); ?></p>
        <p>Price: $<?php echo htmlspecialchars($product['listPrice']); ?></p>
        <a href="index.php?route=cart_add&id=<?php echo htmlspecialchars($product['productID']); ?>&code=<?php echo htmlspecialchars($product['productCode']) ?>">Add to Cart</a>
    </div>
<?php require_once __DIR__ . '/../../footer.php'?>;