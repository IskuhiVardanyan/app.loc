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
      style="background-image: url('/uploads/home_img.jpeg'); background-size: cover;">

<div class="container">
    <header class="row">
        <div class="col-12">
            <div class="row  nav_home" style=" position: fixed;z-index: 1; margin: 0 auto;">
                <div class="col-3">
                    <main class="px-md-3 welcome">
                        <h1>Welcome</h1>
                    </main><br>
                </div>
                <nav class="nav col-9">
                    <div class="nav_body nav-masthead">
                        <?php
                        if(isset($_SESSION["id"])){
                       echo '<ul>' .
                            '<li><a class="nav-link active" aria-current="page" href="/" style="color: #f2f2f2">' . "Home" . '</a></li>' .
                            '<li><a class="nav-link" href="/admin" style="color: #1a1a1a">' . "Admin" . '</a></li>' .
                            '<li><a class="nav-link" href="/user/logout" style="color: #1a1a1a">' . "Sign out" . '</a></li>' .
                        '</ul>';
                        }else{

                          echo  '<ul>' .
                            '<li><a class="nav-link active" aria-current="page" href="/" style="color: #f2f2f2">Home</a></li>' .
                            '<li><a class="nav-link" href="/user/register" style="color: #1a1a1a">Register</a></li>' .
                            '<li><a class="nav-link" href="/user/login" style="color: #1a1a1a">Sign in</a></li>' .
                            '<li><a class="nav-link" href="/home/cart" style="color: #1a1a1a">
                            <img src="/uploads/basket_icon.png" width="36px" height="36px">
                            <span class="cart_item_value"></span></a></li>' .
                        '</ul>';
                        }
                        ?>
                    </div>
                </nav>
            </div>
        </div>
    </header>
