<?php

require_once __DIR__ . '/../header.php';
?>

<div class="row limited">
    <section class="column small-12 ">
        <h1 class="row-center-h1">Register</h1>
    </section>
</div>

   <div class="row limited">
    <section class="column small-12 labeled">

    <?php if (isset($errors) && count($errors) > 0) : ?>
              <section id="errors" class="errors-messages-container">
                <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li class="error-message"><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
              </section>
    <?php endif; ?>

    <form method="post" action="index.php?route=register" class="register-form register-form-height">
            <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required aria-required="true">
           </div>

            <br>
           <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required aria-required="true">
            </div>

            <br>
            <div>
            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" required aria-required="true">
            </div>

            <br>
            <div>
            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" required aria-required="true">
            </div>

            <br>
            <button type="submit">Register</button>
        </form>
    </section>

</div>
<br><br><br>
<div class="row limited">
    <section class="column small-12 ">
        <p class="register-form"> Already have an account? <a href="index.php?route=login">Login here</a>.</p>
    </section>
</div>
<?php require_once __DIR__ . '/../footer.php'; ?>