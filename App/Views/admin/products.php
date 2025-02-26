<?php
$title = 'Manage Products';
require_once __DIR__ . '/../header.php';
?>

<div role="main" class="main-content">
    <h1>Manage Products</h1>

    <div class="product-management-container">
        <!-- List of products -->
        <div class="products-grid">
            <?php if (isset($products) && is_array($products)): ?>
                <?php foreach ($products as $product): ?>
                    <div class="product-card">
                        <img src="public/images/products/<?php echo htmlspecialchars($product['productCode']); ?>.png" alt="<?php echo htmlspecialchars($product['productName']); ?>" class="rotated-image">
                        <h2><?php echo htmlspecialchars($product['productName']); ?></h2>
                        <p><?php echo htmlspecialchars($product['description']); ?></p>
                        <p>Price: $<?php echo htmlspecialchars($product['listPrice']); ?></p>
                        <div class="product-actions">
                            <a href="index.php?route=admin/edit_product&id=<?php echo htmlspecialchars($product['productID']); ?>">Edit</a>
                            <a href="index.php?route=admin/delete_product&id=<?php echo htmlspecialchars($product['productID']); ?>">Delete</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No products found.</p>
            <?php endif; ?>
        </div>
    </div>
    <div><a href="index.php?route=admin/add_product">Add Product</a></div>
</div>

<?php require_once __DIR__ . '/../footer.php'; ?>
