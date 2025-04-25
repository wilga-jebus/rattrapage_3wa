<?php

require_once __DIR__ . '/../header.php';
?>

<div class="row limited">
    <section class="column small-12  form-title">
        <h1>Register</h1>
    </section>
</div>

   <div class="row limited">
    <section class="column small-12 labeled">

    <form method="post" action="index.php?route=register" class="register-form">
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