<?php
$title = 'Delete Product';
require_once __DIR__ . '/../../header.php';
?>
<h1>Delete Product</h1>

<?php if ($product): ?>
    <p>Are you sure you want to delete the product
        <strong><?php echo htmlspecialchars($product['productName']); ?></strong>?</p>
    <form method="post" action="index.php?route=admin/delete_product&id=<?php echo $product['productID']; ?>">
        <button type="submit">Yes, Delete</button>
        <a href="index.php?route=admin/products">Cancel</a>
    </form>
<?php else: ?>
    <p>Product not found.</p>
    <a href="index.php?route=admin/products">Back to Products</a>
<?php endif; ?>
<?php require_once __DIR__ . '/../../footer.php';
