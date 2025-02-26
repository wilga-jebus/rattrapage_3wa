<?php require_once __DIR__ . '/../header.php'; ?>

<div role="main" class="main-content">
    <div class="category-products-container">
        <h1 class="category-products-title"><?php echo htmlspecialchars($category['categoryName']); ?> Products</h1>
        <div class="products-grid">
            <?php foreach ($products as $product): ?>
                <div class="product-card">
                    <img src="public/images/products/<?php echo htmlspecialchars($product['productCode']); ?>.png" alt="<?php echo htmlspecialchars($product['productName']); ?>" class="rotated-image">
                    <h2><?php echo htmlspecialchars($product['productName']); ?></h2>
                    <p><?php echo htmlspecialchars($product['description']); ?></p>
                    <p>Price: $<?php echo htmlspecialchars($product['listPrice']); ?></p>
                    <a href="index.php?route=product&id=<?php echo htmlspecialchars($product['productID']); ?>">View Details</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../footer.php'; ?>