<?php require_once __DIR__.'/../header.php'; ?> 
<div role="main" class="main-content">
    
<h1>Welcome to Guitar E-commerce</h1>

    <div class="products-grid">
        <!-- Loop through products and display them -->
        <?php if (is_array($products) || is_object($products)): ?>
            <?php foreach ($products as $product): ?>
                <div class="product-card">
                    <img src="public/images/products/<?php echo htmlspecialchars($product['productCode']); ?>.png" alt="<?php echo htmlspecialchars($product['productName']); ?>" class="rotated-image">
                    <h2><?php echo htmlspecialchars($product['productName']); ?></h2>
                    <p><?php echo htmlspecialchars($product['description']); ?></p>
                    <p class="price" data-price="<?php echo htmlspecialchars($product['listPrice']); ?>">Price: $<?php echo htmlspecialchars($product['listPrice']); ?></p>
                    <select class="currency-selector">
                        <option value="USD">USD</option>
                        <option value="EUR">EUR</option>
                        <option value="GBP">GBP</option>
                        <!-- Add more currencies as needed -->
                    </select>
                    <a href="index.php?route=cart_add&id=<?php echo htmlspecialchars($product['productID']); ?>">Add to Cart</a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No products available.</p>
        <?php endif; ?>
    </div>
</div>

<?php require_once __DIR__.'/../footer.php'; ?>

