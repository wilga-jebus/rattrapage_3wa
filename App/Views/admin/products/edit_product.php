<?php

$title = 'Edit Product';
require_once __DIR__ . '/../../header.php';
?>
<div class="row limited">
        <section class="column small-12  form-title">
            <h1 class="row-center-h1">Edit Products</h1> 
        </section>
    </div>

<div class="row limited">
    
    
    <?php if ($product): ?>
        <section class="column small-12">
        <form method="post" action="index.php?route=admin/update_product&id=<?php echo $product['productID']; ?>
        &price=<?php echo $product['listPrice']; ?>&description=<?php echo $product['description']; ?>&categoryID=<?php echo $product['categoryID']; ?>"
        class="login-form login-form-height">
             <div>
            <label for="name">Product Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($product['productName']); ?>" required>
            </div>
            
            <div>
            <label for="price">Price:</label>
            <input type="text" id="price" name="price" value="<?php echo htmlspecialchars($product['listPrice']); ?>" required>
           </div>   
                      
            <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description" required><?php echo htmlspecialchars($product['description']); ?></textarea>
            </div>
            
            <label for="categoryID">Category:</label>
            <select id="categoryID" name="categoryID" required>
                <option value="1" <?php echo $product['categoryID'] == 1 ? 'selected' : ''; ?>>Category 1</option>
                <option value="2" <?php echo $product['categoryID'] == 2 ? 'selected' : ''; ?>>Category 2</option>
                <option value="3" <?php echo $product['categoryID'] == 3 ? 'selected' : ''; ?>>Category 3</option>
                <option value="4" <?php echo $product['categoryID'] == 4 ? 'selected' : ''; ?>>Category 4</option>
            </select>
            
            <button type="submit">Update Product</button>
        </formm>
        </section>
        
    <?php else: ?>
        <p>Product not found.</p>
    <?php endif; ?>
    <div class="login-form">
    <a href="index.php?route=admin/products">Back to Products</a>
    </div>
    
</div>

<?php require_once __DIR__ . '/../../footer.php'; ?>
