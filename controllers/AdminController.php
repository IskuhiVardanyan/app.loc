<?php


class AdminController
{
    public function actionIndex(): bool
    {
		if($_SESSION["id"] > 0){

            $all_products = Products::getOwnProducts();
            $all_info = User::getInfo($_SESSION["id"]);
			require_once(ROOT . '/views/admin/dashboard.php');
			return true;
		}else{
			header("Location: /");
		}
    }

    public function actionAdd(): bool
    {

            require_once(ROOT . '/views/admin/add_new_products.php');
            return true;
    }

    public function actionEdit($id): bool
    {
        $all_products = Products::getProductsById($id);
//        die("test");

        if (isset($_POST['edit'])) {
            foreach($all_products as $parr) {
                $productName = $_POST['product_name'];
                $price = $_POST['price'];
                $description = $_POST['text'];

                if (is_uploaded_file($_FILES['inpFile']['tmp_name'])) {
                    // user has uploaded a file

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
                                $fileDestination = 'uploads/' . $fileNewName;
                                move_uploaded_file($fileTmpName, $fileDestination);
                                Products::updateImage($parr['product_id'], $fileNewName);

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
                    Products::editProductByAdmin($id, $productName, $price, $description);
                    header("Location: /admin");
                }else{
                    $productName = $_POST['product_name'];
                    $price = $_POST['price'];
                    $description = $_POST['text'];

                    Products::editProductByAdmin($id, $productName, $price, $description);
                    header("Location: /admin");
                }

            }
        }

        require_once(ROOT . '/views/admin/edit.php');
        return true;
    }

    public function actionDelete($id): bool
    {
        Products::deleteProduct($id);
        header("Location: /admin");
    }

    public function actionDescription($id): bool
    {
        $arr = Products::getProductsById($id);
        require_once(ROOT . '/views/admin/description.php');
        return true;
    }
}