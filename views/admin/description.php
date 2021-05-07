<?php include ROOT . '/views/layouts/dashboard_header.php'; ?>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
          <div class="position-sticky pt-3">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="/admin">
                        <span data-feather="shopping-cart">My products</span>
                    </a>
                </li>
            </ul>
          </div>
        </nav>
<?php
    foreach ($arr as $products) {

        echo "<div class='container' style='margin-left: 300px; margin-top: 50px;'>" .
                "<div class='row'>" .
                   "<div class='col-6'>" .
                        '<label for="product_name">' . "Product name:" . "</label>" .
                        '<input type = "text" id = "product_name" name = "product_name"  value="' . $products['product_name'] .
                        '" readonly><br><br>' .

                        '<label for="price">' . "Price:" . "</label>" .
                        '<input type = "text" id = "price" name = "price" value="' . $products['price'] .
                        '" style = "margin-left: 69px;" readonly><br><br>' .

                        '<label for="description">' . "Description" . '</label><br>' .
                        '<textarea rows = "5" cols = "5" name = "text" readonly>' . $products['description'] . '</textarea>' .
                        '<br><br>' .

                        '<button class="description_btn"><a href="/admin">' . "&lsaquo;&lsaquo; Back" . "</a></button>" .
                    '</div>' .

                    "<div class='col-6'>" .
                        "<img src=" . '"/uploads/' . $products['image'] . '"' . " " . 'width="400" height="400"' . " style='object-fit:cover;'>" .
                    "</div>" .
                "</div>" .
            "</div>";

        }
?>
    </div>
</div>
<?php include ROOT . '/views/layouts/dashboard_footer.php'; ?>
