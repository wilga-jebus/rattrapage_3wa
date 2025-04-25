<?php require_once __DIR__ . '/../header.php'; ?>
 
<div class="row limited">
        <section class="column small-12  form-title">
            <h1>Guitare Electrique</h1> 
        </section>
    </div>
<div class="row limited">
    <h1><?php/* echo htmlspecialchars($category['categoryName']); */?> </h1>
        
            <?php foreach ($products as $product): ?>
      <section class="column small-12 medium-6 large-3">
                
                    <img src="public/images/products/<?php echo htmlspecialchars($product['productCode']); ?>.png" alt="<?php echo htmlspecialchars($product['productName']); ?>" class="rotated-image">
                    <h6><?php echo htmlspecialchars($product['productName']); ?></h6>
                    <p><?php echo htmlspecialchars($product['description']); ?></p>
                    <p>Price: $<?php echo htmlspecialchars($product['listPrice']); ?></p>
                    <a href="index.php?route=product&id=<?php echo htmlspecialchars($product['productID']); ?>">View Details</a>
            </section>            
            <?php endforeach; ?>
        
    
</div>

<?php require_once __DIR__ . '/../footer.php'; ?>