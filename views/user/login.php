<?php include ROOT . '/views/layouts/auth_header.php'; ?>

<main class="form-signin">

  <form action="" method="post" class="login_form">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
    <input type="text" data-validation='email' name="email"  class="form-control mb-3 login_input line" placeholder="Email address">
      <span class="error_l1"></span>
    <input type="password" data-validation='password' name="password"  class="form-control mb-3 login_input line" placeholder="Password">
      <span class="error_l2"></span>
      <div id="db_error_list">
		  <?php if (isset($errors) && is_array($errors)): ?>
              <ul class="login_error">
				  <?php foreach ($errors as $error): ?>
                      <li><?php echo $error; ?></li>
				  <?php endforeach; ?>
              </ul>
		  <?php endif; ?>
      </div>
    <input name="sign-in" class="w-100 btn btn-lg btn-primary line" type="submit" value="Sign in">
      <div id="reg_btn"><a id="reg_btn" href="/user/register">Create New Account</a></div>
  </form>

    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
</main>

<?php include ROOT . '/views/layouts/auth_footer.php'; ?>