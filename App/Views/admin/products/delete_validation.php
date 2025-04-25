<?php
$title = 'Delete Product';
require_once __DIR__ . '/../../header.php';
?>
<div class="row limited">
        <section class="column small-12  form-title">
            <h1>Delete Products</h1> 
        </section>
    </div>

<div class="row limited">
<?php if ($product): ?>
    <section class="column small-12">
    <p>Are you sure you want to delete the product
        <strong><?php echo htmlspecialchars($product['productName']); ?></strong>?</p>
        <br><br><br><br><br><br>
    <form method="post" action="index.php?route=admin/delete_product&id=<?php echo $product['productID']; ?>">
        <button type="submit">Yes, Delete</button>
        <br><br><br><br><br><br><br><br><br><br>
        <div>
        <a href="index.php?route=admin/products">Cancel</a>
        </div>
    </form>
<?php else: ?>
    <p>Product not found.</p>

    <div>
    <a href="index.php?route=admin/products">Back to Products</a>
    </div>
<?php endif; ?>
</section>
</div>
<?php require_once __DIR__ . '/../../footer.php';
