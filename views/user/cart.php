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
<?php
if(isset($_SESSION["id"])){
    echo '<input style="display:none" class="session_num" value="' . $_SESSION["id"] .'">';
}else{
    echo '<input style="display:none" class="session_num" value="">';
}
?>

<input class="save_data" name="data" style="display: none">

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
                        if(isset($_SESSION["id"])) {
                            echo  '<ul>' .
                                '<li><a class="nav-link" aria-current="page" href="/" style="color: #f2f2f2">Home</a></li>' .
                                '<li><a class="nav-link" href="/admin" style="color: #1a1a1a">' . "Admin" . '</a></li>' .
                                '<li><a class="nav-link" href="/user/logout" style="color: #1a1a1a">' . "Sign out" . '</a></li>' .
                                '<li><a class="nav-link active" href="/home/cart" style="color: #1a1a1a">
                                <img src="/uploads/basket_icon.png" width="36px" height="36px">
                                <span class="cart_item_value"></span></a></li>' .
                                '</ul>';
                        }else{
                            echo '<ul>' .
                                '<li><a class="nav-link" aria-current="page" href="/" style="color: #f2f2f2">Home</a></li>' .
                                '<li><a class="nav-link" href="/user/register" style="color: #1a1a1a">Register</a></li>' .
                                '<li><a class="nav-link" href="/user/login" style="color: #1a1a1a">Sign in</a></li>' .
                                '<li><a class="nav-link active" href="/home/cart" style="color: #1a1a1a">
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

    <div class="col-9 cart-items">
        <table class="cart_items_table">
            <thead class="cart_items_thead">
                <tr class="table_tr">
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody class="cart_items_list">

            </tbody>
        </table>
        <div class="row">
            <div class="col-4 subtotal">
                <span class="subtotal_name">Subtotal</span>
                <span>&#36 </span><span class="subtotal_price">0</span>
            </div>
        </div>

    </div>

<script src="/template/js/jquery-3.4.1.min.js"></script>
<script src="/template/js/scripts.js"></script>
<script>

    //.....................Showing and hiding navbar.........................

    let navHome = document.querySelector(".nav_home");
    window.addEventListener("scroll", function () {
        if(window.pageYOffset > 100){
            navHome.style.backgroundColor = "rgb(222, 198, 175, 0.8)";
            navHome.style.boxShadow = "3px 3px 3px #4d4d4d";
        }else{
            navHome.style.backgroundColor = "rgb(222, 198, 175,0)";
            navHome.style.boxShadow = "none";
        }
    });

</script>
</body>
</html>