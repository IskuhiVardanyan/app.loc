<?php include ROOT . '/views/layouts/dashboard_header.php'; ?>

<div class='container'>
    <div class="row">
        <div class="col-12">
            <div class="popup">
                <p>Are you sure you want to delete this product?</p>
                <div>
                    <button id="ok_btn">OK</button>
                    <button id="cancel_btn">Cancel</button>
                </div>
            </div>
        </div>
    </div>

<?php
echo
         "<div class='row'>" .
             "<div class='col-3 uploaded_pic'>".
                '<form action="" method="post" enctype="multipart/form-data" id="inpFileSubmit">' ;
foreach ($all_info as $all) {
    if ($all['pic'] == NULL) {
//         '<form action="" method="post" enctype="multipart/form-data" id="inpFileSubmit">' .
                echo ' <div class="image-preview" id="imagePreview">' .
                        ' <img src="/avatar.jpg" alt="Image Preview" class="image-preview__image" style="max-width: 200px; min-height: 200px;">' .
                     '</div>';
//                     '<input type="file" name="inpFile" id="inpFile">' .
//                     '<input name="submit" type="submit"><br>' ;
//             '</form>';
    }
    else{
//        echo    '<form action="" method="post" enctype="multipart/form-data" id="inpFileSubmit">' .
        echo  '<div class="image-preview" id="imagePreview">' .
                "<img src=" . '"uploads/' . $all['pic'] . '"' . " "  . 'class="image-preview__image"' . 'id="edit_image"' .">" .
            '<span class="image-preview__default-text">' . "Image Preview" . '</span>' .
              '</div>';
//        .
//        'style="min-height:100%;"' max-width:200px;

    }
          if (isset($_POST['submit'])) {

              $fileName = $_FILES['inpFile']['name'];
//          die("test");
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
                                 User::updatePic($fileNewName);
                                 //die($fileNewName);
                                 $fileDestination = 'uploads/' . $fileNewName;
                                 move_uploaded_file($fileTmpName, $fileDestination);
                                 header("Location: /admin");
                             } else {
                                 echo "<div class='img_message' style='width: 200px; background-color: #adb5bd;'>" .
                                     "Your file is too big" .
                                     '<button id="img_button">OK</button>' .
                                     "</div>";
                             }
                         } else {
                             echo "<div class='img_message' style='width: 200px; background-color: #adb5bd;'>" .
                                 "File uploading error" .
                                 '<button id="img_button">OK</button>' .
                                 "</div>";
                         }
                     } else {
                         echo "<div class='img_message' style='width: 200px; background-color: #adb5bd;'>" .
                             "File uploading error" .
                             '<button id="img_button">OK</button>' .
                             "</div>";
                     }
                 }
    echo   '<input type="file" name="inpFile" id="inpFile">' .
            '<input name="submit" type="submit" value="Change"><br>' .
     '</form><br>';

    echo  "<label>Full name:</label><br>" .
         '<input class="info_input" readonly type="text" value ="' . " " . $all['first_name'] .
         " " . $all['last_name'] . '"' . "><br>" .
         "<label>Email:</label><br>" .
         '<input class="info_input" readonly type="text" value ="' . " " . $all['email'] . '"' . "><br>";

}
echo "</div>";

    echo "<div class='col-9'> " .
        "<table class='table table-dark'>" .
            "<thead>" .
            "<tr>" .
                '<th scope="col">&#8470;</th>' .
                '<th scope="col">Name</th>' .
                '<th scope="col">Price</th>' .
                '<th scope="col">Description</th>' .
                '<th scope="col">Image</th>' .
                '<th scope="col">Edit</th>' .
                '<th scope="col">Delete</th>' .
                '</tr>' .
            '</thead>' .
            '<tbody>';
            $i=1;
            foreach($all_products as $all_p) {

                    echo '<tr>' .
                        '<td>' . $i . '</td>' .
                        '<td>' . $all_p['product_name'] . '</td>' .
                        '<td>' . $all_p['price'] . '</td>' .
                        '<td>' . '<a href="/admin/description/' . $all_p['product_id'] . '">' .
                        '<span>' . "Description" . '</span></a>' . '</td>' .

                        '<td>' . "<img src=" . '"uploads/' . $all_p['image'] . '"' . 'width="200" height="200"' . ">" . '</td>' .

                        '<td>' . '<a href="/admin/edit/' . $all_p['product_id'] . '">' .
                        '<span>' . "Edit" . '</span></a>' . '</td>' .

                        "<td>" . '<a href="/admin/delete/' . $all_p['product_id'] .
                        '" class="delete_btn">' . '<span>' . "Delete" . '</span></a>' . "</td>" .
                        '</tr>';
                    $i++;
            }

            echo '</tbody>' .
            '</table>' .
        "</div>";


            echo "</div>";


?>

</div>

<?php include ROOT . '/views/layouts/dashboard_footer.php'; ?>


