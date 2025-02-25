<?php
$title = 'Products';
require_once __DIR__ . '/../../header.php';
?>
<!-- ici était products-section -->
<section class="main-content products-content"> 
    <h1>Products</h1>

    <div class="products-grid">
        <?php if (is_array($products) || is_object($products)): ?>
            <?php foreach ($products as $product): ?>
                <div class="product-card">
                    <img src="public/images/products/<?php echo htmlspecialchars($product['productCode']); ?>.png" alt="<?php echo htmlspecialchars($product['productName']); ?>">
                    <h2><?php echo htmlspecialchars($product['productName']); ?></h2>
                    <p><?php echo htmlspecialchars($product['description']); ?></p>
                    <p>Price: <span class="price" data-price="<?php echo htmlspecialchars($product['listPrice']); ?>"><?php echo htmlspecialchars($product['listPrice']); ?> USD</span></p>
                    <label for="currency-selector-<?php echo $product['productID']; ?>">Choose currency:</label>
                    <select id="currency-selector-<?php echo $product['productID']; ?>" class="currency-selector">
                        <option value="USD">USD</option>
                        <option value="EUR">EUR</option>
                        <option value="GBP">GBP</option>
                    </select>
                    <div class="product-actions">
                        <a href="index.php?route=product&id=<?php echo $product['productID']; ?>">View Details</a>
                        <a href="index.php?route=cart_add&id=<?php echo $product['productID']; ?>&code=<?php echo $product['productCode']; ?>">Add to Cart</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No products available.</p>
        <?php endif; ?>
    </div>
</section>

<?php
require_once __DIR__ . '/../../footer.php';
?>