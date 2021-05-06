<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Dashboard</title>
    <link href="/template/css/bootstrap.min.css" rel="stylesheet">
    <link href="/template/css/style.css" rel="stylesheet">
</head>
<body>

<?php
    foreach ($arr as $products) {

        echo "<div class='container' style='margin-top: 100px;'>" .
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

                        '<button class="description_btn"><a href="/">' . "&lsaquo;&lsaquo; Back" . "</a></button>" .
                    '</div>' .

                    "<div class='col-6'>" .
                        "<img src=" . '"/uploads/' . $products['image'] . '"' . " " . 'width="400" height="400"' . ">" .
                    "</div>" .
                "</div>" .
            "</div>";
        }
?>

<?php include ROOT . '/views/layouts/dashboard_footer.php'; ?>
