<?php
    include ROOT . '/views/layouts/dashboard_header.php';
?>

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
  </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-8" style="margin-left: 200px;">
            <form action = "" method = "post" enctype = "multipart/form-data" id="add_form">
                <div class="row add_form_row">

                    <div class="col-8">
                        <label for="product_name"> * Product name:</label>
                        <input type = "text" id = "product_name" name = "product_name"
                           value="<?php if (isset($_POST['submit'])) {
                                echo $_POST["product_name"];
                                }?>"><br><br>

                         <label for="price" > * Price:</label >
                         <input type = "text" id = "price" name = "price" style = "margin-left: 69px;" value="<?php if (isset($_POST['submit'])) {
                             echo $_POST["price"];
                         }?>"><br><br>

                        <span class="price_error">* Only numbers</span><br><br>

                        <label for="price" >* Count:</label >
                        <input type = "text" id = "count" name = "product_count" style = "margin-left: 69px;" value="<?php if (isset($_POST['submit'])) {
                            echo $_POST["product_count"];
                        }?>"><br><br>

                        <span class="count_error">* Only numbers</span><br><br>

                        <label for="description"> * Description</label><br>
                        <textarea rows = "5" name = "text" id="description"><?php if (isset($_POST['submit'])) {
                                echo $_POST["text"];
                            }?></textarea>
                        <br><br>
                        <input type = "submit" id = "submit" name = "submit" value = "Add">
                    </div>

                    <div class="col-4" style = "display: inline-block;">
                       <div class="image-preview" id="imagePreview">
                            <img src="" class="image-preview__image" style="max-width: 200px; min-height: 200px;" id="edit_image" alt="Image Preview">
                            <span class="image-preview__default-text" ></span>
                       </div>
                        <?php
                        if (isset($_POST['submit'])) {
                            $productName = $_POST['product_name'];
//            die($productName);
                            $price = $_POST['price'];
                            $product_count = $_POST['product_count'];
                            $description = $_POST['text'];
                            $created_by = $_SESSION["id"];
//            die($description);
                            $fileName = $_FILES['inpFile']['name'];
                            $fileTmpName = $_FILES['inpFile']['tmp_name'];
                            $fileSize = $_FILES['inpFile']['size'];
                            $fileError = $_FILES['inpFile']['error'];
                            $fileType = $_FILES['inpFile']['type'];
                            $fileExt = explode('.', $fileName);
                            $fileActualExt = strtolower(end($fileExt));
                            $allowed = array('jpg', 'jpeg', 'png', 'pdf');
                            if (in_array($fileActualExt, $allowed)) {
                                if ($fileError === 0) {
                                    if ($fileSize < 5000000) {
                                        $fileNewName = uniqid('', true) . "." . $fileActualExt;
                                        $image = $fileNewName;
                                        //                    Products::updatePic($fileNewName);
                                        //die($fileNewName);
                                        $fileDestination = 'uploads/' . $fileNewName;
                                        move_uploaded_file($fileTmpName, $fileDestination);

                                        Products::addProduct( $productName, $price, $description, $image, $created_by, $product_count);
                                        header("Location: /admin");

                                    } else {
                                        echo "<div class='img_message' style='width: 200px; background-color: #adb5bd;' name='button'>" .
                                            "Your file is too big" .
                                            '<button id="img_button">OK</button>' .
                                            "</div>";
                                    }
                                } else {
                                    echo "<div class='img_message' style='width: 200px; background-color: #adb5bd;' name='button'>" .
                                        "File uploading error" .
                                        '<button id="img_button" >OK</button>' .
                                        "</div>";
                                }
                            } else {
                                echo "<div class='img_message' style='width: 200px; background-color: #adb5bd;' name='button'>" .
                                    "File uploading error" .
                                    '<button type="button" id="img_button">OK</button>' .
                                    "</div>";
                            }
                        }
                        ?>
                         <input type="file" name="inpFile" id="inpFile">
                    </div>

                </div>
                <span class="add_error"></span>
            </form>
        </div>
    </div>
</div>
<?php include ROOT . '/views/layouts/dashboard_footer.php'; ?>
