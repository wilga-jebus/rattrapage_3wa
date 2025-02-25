<?php

$title = 'Edit Product';
require_once __DIR__ . '/../../header.php';
?>

<div role="main" class="main-content">
    <h1>Edit Product</h1>
    
    <?php if ($product): ?>
        <form method="post" action="index.php?route=admin/update_product&id=<?php echo $product['productID']; ?>
        &price=<?php echo $product['listPrice']; ?>&description=<?php echo $product['description']; ?>&categoryID=<?php echo $product['categoryID']; ?>">
            <label for="name">Product Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($product['productName']); ?>" required>
            <br>
            <label for="price">Price:</label>
            <input type="text" id="price" name="price" value="<?php echo htmlspecialchars($product['listPrice']); ?>" required>
            <br>
            <label for="description">Description:</label>
            <textarea id="description" name="description" required><?php echo htmlspecialchars($product['description']); ?></textarea>
            <br>
            <label for="categoryID">Category:</label>
            <select id="categoryID" name="categoryID" required>
                <option value="1" <?php echo $product['categoryID'] == 1 ? 'selected' : ''; ?>>Category 1</option>
                <option value="2" <?php echo $product['categoryID'] == 2 ? 'selected' : ''; ?>>Category 2</option>
                <option value="3" <?php echo $product['categoryID'] == 3 ? 'selected' : ''; ?>>Category 3</option>
                <option value="4" <?php echo $product['categoryID'] == 4 ? 'selected' : ''; ?>>Category 4</option>
            </select>
            <br>
            <button type="submit">Update Product</button>
        </form>
    <?php else: ?>
        <p>Product not found.</p>
    <?php endif; ?>

    <a href="index.php?route=admin/products">Back to Products</a>
</div>

<?php require_once __DIR__ . '/../../footer.php'; ?>
