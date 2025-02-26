
    <title>Add Product</title>
    
    <?php require_once __DIR__ . '/../header.php'; ?>

        
    <h1>Add Product</h1>

    <form method="post" action="index.php?route=admin/add_product">
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="price">Price:</label>
        <input type="text" id="price" name="price" required>
        <br>
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>
        <br>
        <label for="category">Category:</label>
        <select id="category" name="category" required>
            
                <option value="3" >3</option>  
                <option value="4" >4</option> 
                <option value="5" >5</option>
                <option value="6" >6</option>                                
        </select>
        <br>
        <label for="created_at">Created At:</label>
        <input type="datetime-local" id="created_at" name="created_at" value="<?php echo date('Y-m-d\TH:i'); ?>" required>
        <br>
        <button type="submit">Add Product</button>
    </form>

    <a href="index.php?route=admin/products">Back to Products</a>

    <?php require_once __DIR__ . '/../footer.php'; ?>