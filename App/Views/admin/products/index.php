<?php
$title = 'Products';
require_once __DIR__ . '/../../header.php';
?>
<!-- ici était products-section -->

        <div class="row limited">
            <section class="column small-12 row-center-h1">
                <h1>Products</h1>
            </section>
        </div><!-- end row -->

    <div class="row limited">
        <?php if (is_array($products) || is_object($products)): ?>
            <?php foreach ($products as $product): ?>
                <section class="column small-6 medium-4  large-3">
                    <img src="public/images/products/<?php echo htmlspecialchars($product['productCode']); ?>.png" alt="<?php echo htmlspecialchars($product['productName']); ?>">
                    <h2><?php echo htmlspecialchars($product['productName']); ?></h2>
                    <p><?php echo htmlspecialchars($product['description']); ?></p>
                    <p class="price" data-price=<?php echo htmlspecialchars($product['listPrice']); ?>><?php echo htmlspecialchars($product['listPrice']); ?><span class="currency"></span></p>
                    <label for="currency-selector-<?php echo htmlspecialchars($product['productID']); ?>">Choose currency:</label>
                    <select name="currency-selector" class="currency-selector" id="currency-selector"<?php echo htmlspecialchars($product['productID']); ?>>
                        <option value="USD">USD</option>
                        <option value="EUR">EUR</option>
                        <option value="GBP">GBP</option>
                    </select>
                    
                    <div class="product-actions">
                        <a href="index.php?route=product&id=<?php echo htmlspecialchars($product['productID']); ?>">View Details</a>
                        <a href="index.php?route=cart_add&id=<?php echo htmlspecialchars($product['productID']); ?>&code=<?php echo htmlspecialchars($product['productCode']); ?>">Add to Cart</a>
                    </div>
                </section>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No products available.</p>
        <?php endif; ?>
    </div>


<?php
require_once __DIR__ . '/../../footer.php';
?>