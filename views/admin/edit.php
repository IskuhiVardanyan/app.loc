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

  <div class="container">
      <div class="row">
          <div class="col-10" style="margin-left: 200px;">
              <form action="" method="post" enctype="multipart/form-data" id="edit_form"><br>
<?php
                  foreach ($all_products as $products) {
                      echo '<div class="row">' .
                              '<div class="col-6">' .
                                  '<label for="product_name">Product name:</label>' .
                                  '<input type = "text" id = "product_name_edit" name = "product_name" value="' . $products['product_name'] .
                                  '">' . '<br><br>' .

                                  '<label for="price">Price:</label>' .
                                  '<input type = "text" id = "price_edit" name = "price" style = "margin-left: 69px;" value="' .
                                  $products['price'] . '"><br><br>' .
                                  '<span class="price_error_edit">* Only numbers</span><br><br>' .

                                  '<label for="product_count">Count:</label>' .
                                  '<input type = "text" id = "count_edit" name = "product_count" style = "margin-left: 69px;" value="' .
                                  $products['product_count'] . '"><br><br>' .
                                  '<span class="count_error_edit">* Only numbers</span><br><br>' .

                                  '<label for="description">Description</label><br>' .
                                  '<textarea rows = "5" cols = "5" name = "text" id="description_edit">' . $products['description'] . '</textarea>' .
                                  '<br><br>' .

                                  '<input type = "submit" name = "edit" value = "Edit" class="edit">' .
                              '</div>' .
                              '<div class="col-6">' .
                                  ' <div class="image-preview" id="imagePreview">';

                              if($products['image'] != NULL){
                                 echo "<img src=" . '"/uploads/' . $products['image'] . '"' . " " .
                                     'class="image-preview__image"' . 'style="width:200px; height:200px;" ' .
                                     'id="edit_image"' . ">" .
                                  '<span class="image-preview__default-text">Image Preview</span>';
                              }else{
                                  echo ' <img src="" class="image-preview__image" id="edit_image">'.
                                  '<span class="image-preview__default-text" style="margin-right: 70px;">Image Preview</span>';
                              }
                              echo '</div>';


                  }
                              echo  '<input type="file" name="inpFile" id="inpFile">'.
                              '</div>' .
                           '</div>';
?>
                    <span class="edit_error"></span>
                  </form>
          </div>
      </div>
  </div>

  </div>
</div>
<?php include ROOT . '/views/layouts/dashboard_footer.php'; ?>
<script src="/template/js/jquery-3.4.1.min.js"></script>
<script>
    window.addEventListener('load', function(event) {
        // alert("test");
    });
</script>
</body>
</html>