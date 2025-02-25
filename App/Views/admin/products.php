<?php
$title = 'Manage Products';
require_once __DIR__ . '/../header.php';
?>

<div role="main" class="main-content">
    <h1>Manage Products</h1>

    <div class="product-management-container">
        <!-- Form to add a new product -->
        <div class="add_product_form">
            <h2>Add New Product</h2>
            <form method="post" action="index.php?route=admin/add_product">
            
                <label for="name">Product Name:</label>
                <input type="text" id="name" name="name" required>
                <br>
                <label for="price">Price:</label>
                <input type="text" id="price" name="price" required>
                <br>
                <select id="category" name="category" required>
            
                <option value="3" >3</option>  
                <option value="4" >4</option> 
                <option value="5" >5</option>
                <option value="6" >6</option>                                
               </select>
                <br>
                <label for="description">Description:</label>
                <textarea id="description" name="description" required></textarea>
                <br>
                <button type="submit">Add Product</button>
            </form>
        </div>

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
                            <a href="index.php?route=admin/edit_product&id=<?php echo $product['productID']; ?>">Edit</a>
                            <a href="index.php?route=admin/delete_product&id=<?php echo $product['productID']; ?>">Delete</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No products found.</p>
            <?php endif; ?>
        </div>
    </div>
 </div>

<?php require_once __DIR__ . '/../footer.php'; ?>
