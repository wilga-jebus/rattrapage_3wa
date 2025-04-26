<?php
  require_once __DIR__ . '/../header.php';
?>
  <div class="row limited">
        <section class="column small-12 ">
            <h1 class="row-center-h1">Categories</h1> 
        </section>
    </div>
     
<div class="row limited">
  <section class="column small-12 ">
    
        <table class="login-form">
            <?php if (isset($categories) && is_array($categories)): ?>
                <?php foreach ($categories as $category): ?>
                    <tr>
                        <td>
                        <a class="category-link" href="index.php?route=category&name=<?php echo htmlspecialchars($category['categoryName']); ?>&id=<?php echo htmlspecialchars($category['categoryID']); ?>">
                            <?php echo htmlspecialchars($category['categoryName']); ?>
                        </a>
                        
                        </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
               <tr> <td>No categories found.</td></tr>
            <?php endif; ?>
         </table>
 </section>
</div>


<?php require_once __DIR__ . '/../footer.php'; ?>