<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Buy</title>
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
                                '<li><a class="nav-link" aria-current="page" href="/" style="color: #f2f2f2">Home</a></li>' .
                                '<li><a class="nav-link" href="/admin" style="color: #1a1a1a">' . "Admin" . '</a></li>' .
                                '<li><a class="nav-link" href="/user/logout" style="color: #1a1a1a">' . "Sign out" . '</a></li>' .
                                '<li><a class="nav-link" href="/home/cart" style="color: #1a1a1a">
                                <img src="/uploads/basket_icon.png" width="36px" height="36px">
                                <span class="cart_item_value"></span></a></li>' .
                                '</ul>';
                        ?>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-8 last_buy_div">
                <?php
                foreach ($buyProduct as $buy){
                    echo
                        '<form method="post" action="" class="buy_form">' .
                            '<label for="product_name">Product name:</label>' .
                            '<input type = "text" id = "product_name" name = "product_name" value="' . $buy["product_name"] . '" readonly><br><br>' .

                            '<label for="product_price">Product price:</label>' .
                            '<input type = "text" id = "product_price" name = "product_price" value="' . '&#36' . ' ' . $buy["price"] . '" readonly><br><br>' .

                            '<label for="sold_product_quantity">Quantity:</label>' .
                            '<input type = "text" id="sold_product_quantity" name = "sold_product_quantity"  readonly><br><br>' .

                            '<label for="sold_product_quantity">The rest: </label>' .
                            '<input type = "text" id="product_quantity" name = "product_quantity" value="' . $buy['product_count'] . '" readonly><br><br>' .

                            '<input style="display:none" type = "text" id = "sold_product_id" name = "sold_product_id" value="'
                            . $buy["product_id"] . '" readonly><br>' .
                            '<div class="buy_cancel_btn">' .
                                '<a href="/home/cart" style="color: #f2f2f2" class="cancel_button" type="button">Cancel</a>' .
                                '<input type = "submit" id = "buy_btn" name = "buy" value = "Buy">' .
                            '</div>' .
                        '</form>' .
                        "<img class='sold_product_img' src=" . '"../../uploads/' . $buy['image'] . '"' . " " . 'width="200" height="200"' . " " .
                        'style="object-fit:cover;"' . ">";
                }
                ?>
            </div>
        </div>
    </div>
    <script src="/template/js/jquery-3.4.1.min.js"></script>
    <script src="/template/js/scripts.js"></script>
    <script>

        function ProductSubtotal(products, bsId) {
            let sum = 0;
            for (let i = 0; i < products.length; i++) {
                if (products[i].sesId === bsId){
                    sum += products[i].price * products[i].quantity;
                }
            }
            return sum;
        }

        if (localStorage.getItem("products").length != null) {
            let subtotal = document.querySelector(".subtotal_price");
            let products = JSON.parse(localStorage.getItem("products") || "[]");
            let newKey = JSON.parse(localStorage.getItem("key") || "[]");
            let bsId = document.querySelector(".session_num");
            let soldProductQuantity = document.querySelector('#sold_product_quantity');
            let soldProductId = document.querySelector('#sold_product_id');
            let buyBtn = document.querySelector('#buy_btn');

            for(let i = 0; i < products.length; i++){
                if(products[i].id === soldProductId.value && products[i].sesId === bsId.value){
                    soldProductQuantity.value = products[i].quantity;
                }
            }
            buyBtn.addEventListener('click', function (){
                for(let i = 0; i < products.length; i++) {
                    if (products[i].id === soldProductId.value && products[i].sesId === bsId.value) {
                        let cartItemValue = document.querySelector(".cart_item_value");
                        for(let n = 0; n < newKey.length; n++){
                            if(newKey[n].sesId === bsId.value){
                                let cartUpdate = newKey[n].eachValue - products[i].quantity;
                                if(cartUpdate === 0){
                                    newKey.splice(n, 1);
                                }else{
                                    newKey[n].eachValue = cartUpdate;
                                }
                                localStorage.setItem("key", JSON.stringify(newKey));
                                if (typeof (cartItemValue) != 'undefined' && cartItemValue != null) {
                                    cartItemValue.innerHTML = cartUpdate;
                                }
                                products.splice(i, 1);
                                localStorage.setItem("products", JSON.stringify(products));
                                let tr = document.querySelectorAll(".product_class");
                                if(typeof(tr) != "undefined" && tr != null) {
                                    tr[i].remove();
                                    subtotal.innerHTML = ProductSubtotal(products, bsId);
                                }
                            }
                        }
                    }
                }
            });
        }
    </script>
</body>
</html>