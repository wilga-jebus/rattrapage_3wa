<?php
$title = 'je suis';
require_once __DIR__ . '/../../header.php';

?>
<div class="row limited">
    <section class="column small-12  form-title">
     <h1>Manage Products</h1>
    </section>
</div>
<div class="row limited">
    <section class="column small-6 medium-4 large-3">
         <h6><?php echo htmlspecialchars($product['productName']); ?></h6>

        <img src="public/images/products/<?php echo htmlspecialchars($product['productCode']); ?>.png"
            alt="<?php echo htmlspecialchars($product['productName']); ?>">
        <p><?php echo htmlspecialchars($product['description']); ?></p>
        <p>Price: $<?php echo htmlspecialchars($product['listPrice']); ?></p>
        <a
            href="index.php?route=cart_add&id=<?php echo htmlspecialchars($product['productID']); ?>&code=<?php echo htmlspecialchars($product['productCode']); ?>">Add
            to Cart</a>
    </section>
</div>
<?php require_once __DIR__ . '/../../footer.php'; ?>