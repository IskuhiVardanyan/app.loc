<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Home</title>
    <link href="/template/css/bootstrap.min.css" rel="stylesheet">
    <link href="/template/css/style.css" rel="stylesheet">

</head>
<body class="d-flex h-100 text-center text-white bg-white"
      style="background-image: url('/uploads/admin_img.jpeg'); background-size: cover;">

<div class="container">
    <header class="row">
        <div class="col-12">
            <div class="row  nav_home" style=" position: fixed;z-index: 1; ">
                <div class="col-3">
                    <main class="px-md-3 welcome">
                        <h1>Welcome</h1>
                    </main><br>
                </div>
                <nav class="nav col-9">
                    <div class="nav_body nav-masthead">
                        <?php

                            echo  '<ul>' .
                                    '<li><a class="nav-link" aria-current="page" href="/" style="color: #1a1a1a">Home</a></li>' .
                                    '<li><a class="nav-link active" href="/user/register" style="color: #1a1a1a">Register</a></li>' .
                                    '<li><a class="nav-link" href="/user/login" style="color: #1a1a1a">Sign in</a></li>' .
                                    '<li><a class="nav-link" href="/home/cart" style="color: #1a1a1a">
                                    <img src="/uploads/basket_icon.png" width="36px" height="36px"><span class=cart_item_value></span></a></li>' .
                                  '</ul>';
                        ?>
                    </div>
                </nav>
            </div>
        </div>
    </header>

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