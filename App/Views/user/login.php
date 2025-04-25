<?php

require_once __DIR__ . '/../header.php';
?>

    <div class="row limited">
        <section class="column small-12  form-title">
            <h1>Login</h1> 
        </section>
    </div>

    <div class="row limited">>
       <section class="column small-12 ">
        
        <?php if (isset($error)): ?>
            <p ><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form method="post" action="index.php?route=login"class="login-form">
            <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required aria-required="true">
            </div>
            <br><br><br>
            <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required aria-required="true">
            </div>
            <br><br><br>
            <div>
            <input type="submit">
            </div>
        </form>
        </section>
        <br><br>
            
        
    </div>
   <br><br><br>
    <div class="row limited">
    <section class="column small-12">
        <p class="login-form">if you don't have an account? <a href="index.php?route=register">Register here</a></p>
      </section>
    </div>
        


<?php require_once __DIR__ . '/../footer.php'; ?>

