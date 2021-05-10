<?php include ROOT . '/views/layouts/home_header.php'; ?>

<div class="row">

    <div class="col-9 products_table">
        <h1>Products</h1>
        <?php
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
                    foreach($all_products as $all_p) {
                        echo '<tr>' .
                            '<td>' . $all_p['product_name'] . '</td>' .
                            '<td>' . $all_p['price'] . '</td>' .
                            '<td>' . '<a href="/home/more/' . $all_p['product_id'] . '" class="description_btn">' .
                            '<span>' . "Description" . '</span></a>' . '</td>' .
                            '<td>' . "<img src=" . '"uploads/' . $all_p['image'] . '"' .
                            'height="250px" width="250px"' . " " . 'style="object-fit: cover"' . ">" . '</td>';
                    }
            echo '</tbody>' .
            '</table>' ;
        ?>
    </div>
</div>

</div>

<?php include ROOT . '/views/layouts/home_footer.php'; ?>

