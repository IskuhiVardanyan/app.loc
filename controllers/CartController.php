<?php


class CartController
{
    public function actionBuy($id): bool
    {
        $buyProduct = Products::getProductsById($id);
        if(isset($_POST['buy'])){
            $productId = $_POST['sold_product_id'];
            $productQuantity = $_POST['product_quantity'];
            $soldProductQuantity = $_POST['sold_product_quantity'];
            $productCount = $productQuantity - $soldProductQuantity;
            Products::updateProductCount($productId, $productCount);
            header("Location: /home/cart");
        }
        require_once(ROOT . '/views/user/buy.php');
        return true;
    }
}

