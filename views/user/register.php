<?php include ROOT . '/views/layouts/auth_header.php'; ?>

<main class="form-signin">

    <form action="" method="POST" class="register_form">
        <h1 class="h3 mb-3 fw-normal">Please register</h1>
        <input  data-validation='first_name' type="text" name="firstName"  class="form-control mb-3 register_input line" placeholder="First name"
               value="<?php if (isset($errors) && is_array($errors)) echo $_POST["firstName"]?>">
        <span class="error_1"></span>


        <input  data-validation='last_name' type="text" name="lastName"  class="form-control mb-3 register_input line" placeholder="Last name"
               value="<?php if (isset($errors) && is_array($errors)) echo $_POST["lastName"]?>">
        <span class="error_2" style="text-align: left;"></span>

        <input  data-validation='email' type="text" name="email"  class="form-control mb-3 register_input line" placeholder="Email address"
               value="<?php if (isset($errors) && is_array($errors)) echo $_POST["email"]?>">
        <span class="error_3" style="text-align: left;"></span>

        <input  data-validation='password' type="password" name="password"  class="form-control mb-3 register_input line" placeholder="Password">
        <span class="error_4"></span>
		<?php if (isset($errors) && is_array($errors)): ?>
            <ul class="reg_error_style">
                <?php foreach ($errors as $error): ?>
                    <li> * <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
		<?php endif; ?>
        <input name="sign-up" class="w-100 btn btn-lg btn-primary line sign_up" type="submit" value="Register">
    </form>

    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
</main>

<?php include ROOT . '/views/layouts/auth_footer.php'; ?>