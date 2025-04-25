<?php
  require_once __DIR__ . '/../header.php';
?>
  <div class="row limited">
        <section class="column small-12  form-title">
            <h1>Categories</h1> 
        </section>
    </div>
     <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class="row limited">
  <section class="column small-12">
    
        <ul class="login-form">
            <?php if (isset($categories) && is_array($categories)): ?>
                <?php foreach ($categories as $category): ?>
                    <li class="category-item">
                        <a class="category-link" href="index.php?route=category&name=<?php echo htmlspecialchars($category['categoryName']); ?>&id=<?php echo htmlspecialchars($category['categoryID']); ?>">
                            <?php echo htmlspecialchars($category['categoryName']); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>No categories found.</li>
            <?php endif; ?>
        </ul>
 </section>
</div>

<?php require_once __DIR__ . '/../footer.php'; ?>