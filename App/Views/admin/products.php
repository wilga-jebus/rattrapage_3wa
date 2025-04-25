<?php

require_once __DIR__ . '/../header.php';
?>
     <div class="row limited">
        <section class="column small-12  form-title">
            <h1>Manage Products</h1> 
        </section>
    </div>


    <div class="row limited">
        <!-- List of products -->
        
            <?php if (isset($products) && is_array($products)): ?>
                <?php foreach ($products as $product): ?>
                    <section class="column small-6 medium-4 large-3">
                        <img src="public/images/products/<?php echo htmlspecialchars($product['productCode']); ?>.png" alt="<?php echo htmlspecialchars($product['productName']); ?>" class="rotated-image">
                        <h2><?php echo htmlspecialchars($product['productName']); ?></h2>
                        <p><?php echo htmlspecialchars($product['description']); ?></p>
                        <p>Price: $<?php echo htmlspecialchars($product['listPrice']); ?></p>
                        <div class="product-actions">
                            <a href="index.php?route=admin/edit_product&id=<?php echo htmlspecialchars($product['productID']); ?>">Edit</a>
                            <a href="index.php?route=admin/delete_product&id=<?php echo htmlspecialchars($product['productID']); ?>">Delete</a>
                        </div>
                </section>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No products found.</p>
            <?php endif; ?>
        
    </div>
    <div><a href="index.php?route=admin/add_product">Add Product</a></div>


<?php require_once __DIR__ . '/../footer.php'; ?>
