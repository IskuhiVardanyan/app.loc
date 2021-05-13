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
                                '<li><a class="nav-link active" aria-current="page" href="/" style="color: #f2f2f2">Home</a></li>' .
                                '<li><a class="nav-link" href="/user/register" style="color: #1a1a1a">Register</a></li>' .
                                '<li><a class="nav-link" href="/user/login" style="color: #1a1a1a">Sign in</a></li>' .
                                '</ul>';

                        ?>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <div class="col-9 cart-items">
        <h4>Shopping Cart</h4>
        <div class="row">
            <div class="col-12 items_titles_content">
                <ul>
                    <li><span class="items_titles">Item</span></li>
                    <li><span class="items_titles">Price</span></li>
                    <li><span class="items_titles">Quantity</span></li>
                </ul>
            </div>
        </div>
        <div class="row item_container">
            <div class="col-4">
                <img src="/uploads/home_img.jpeg" width="200px" height="200px"><br>
                <span class="product_item_name">fh</span>
            </div>
            <div class="col-4">
                <span class="item_price">45</span>
            </div>
            <div class="col-4">
                <input class="cart-quantity-input" type="number" value="1">
                <button class="btn btn-danger btn_remove" type="button">Remove</button>
            </div>
        </div>
        <div class="row">
            <div class="col-4 subtotal">
                <span class="subtotal_name">Subtotal</span>
                <span class="subtotal_price">5263</span>
            </div>
        </div>
    </div>

<?php include ROOT . '/views/layouts/auth_footer.php'; ?>