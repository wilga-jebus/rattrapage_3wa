<?php
  require_once __DIR__ . '/../header.php';
?>

<div role="main" class="main-content">
    <div class="category-container">
        <h1 class="category-title">Categories</h1>
        <ul class="category-list">
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
    </div>
</div>

<?php require_once __DIR__ . '/../footer.php'; ?>