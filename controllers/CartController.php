<?php


class CartController
{
    public function actionBuy(): bool
    {
       // die("dfg");
        if(isset($_POST['buy'])){
//die($_POST['id']);
            $productId = $_POST['id'];
            $productCount = $_POST['cnt'];
            Products::updateProductCount($productId, $productCount);
            header("Location: /home/cart");
        }
          //die($productCount);
          //Products::updateProductCount($id, $productCount);
//        Products::deleteProduct($id);
        require_once(ROOT . '/views/user/cart.php');
        return true;
    }
}

