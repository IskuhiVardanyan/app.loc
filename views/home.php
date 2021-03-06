<?php include ROOT . '/views/layouts/home_header.php'; ?>

<div class="row">

    <div class="col-9 products_table">
        <h1>Products</h1>
        <?php
        if(isset($_SESSION["id"])) {
            echo
                "<table class='table table-dark'>" .
                "<thead>" .
                "<tr>" .
                '<th scope="col">Name</th>' .
                '<th scope="col">Price</th>' .
                '<th scope="col">Description</th>' .
                '<th scope="col" style="width:40%">' . "Image" . '</th>' .

                '</tr>' .
                '</thead>' .
                '<tbody>';
            foreach ($all_products as $all_p) {
                echo '<tr>' .
                    '<td>' . $all_p['product_name'] . '</td>' .
                    '<td>' . $all_p['price'] . '</td>' .
                    '<td>' . '<a href="/home/more/' . $all_p['product_id'] . '" class="description_btn">' .
                    '<span>' . "Description" . '</span></a>' . '</td>' .
                    '<td>' . "<img src=" . '"uploads/' . $all_p['image'] . '"' .
                    'height="250px" width="250px"' . " " . 'style="object-fit: cover"' . ">" . '</td>';
            }
            echo '</tbody>' .
                '</table>';
        }else{
            echo
                "<table class='table table-dark'>" .
                "<thead>" .
                "<tr>" .
                '<th scope="col">Name</th>' .
                '<th scope="col">Price</th>' .
                '<th scope="col">Description</th>' .
                '<th scope="col" style="width:40%">' . "Image" . '</th>' .

                '</tr>' .
                '</thead>' .
                '<tbody>';
            foreach ($all_products as $all_p) {
                echo '<tr>' .
                    '<td>' . '<span class="home_product_name">'. $all_p['product_name'] . '</span>' . '</td>' .
                    '<td>' . '<span class="home_product_price">'. $all_p['price'] . '</span>' . '</td>' .
                    '<td>' . '<a href="/home/more/' . $all_p['product_id'] . '" class="description_btn">' .
                    '<span>' . "Description" . '</span></a>' .
                    '<button class="shop-item-button" type="button">Add to cart</button>' . '</td>' .
                    '<td>' . "<img class='home_product_image' src=" . '"uploads/' . $all_p['image'] . '"' .
                    'height="250px" width="250px"' . " " . 'style="object-fit: cover"' . ">" . '</td>';
            }
            echo '</tbody>' .
                '</table>';
        }
        ?>
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
        }else{
            navHome.style.backgroundColor = "rgb(222, 198, 175,0)";
        }
    });

    //....................Cart..............................


</script>
</body>
</html>

<?php //include ROOT . '/views/layouts/home_footer.php'; ?>

