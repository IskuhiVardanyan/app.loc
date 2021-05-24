<?php

class CartController
{
    public function actionBuy($id): bool
    {
        $arr = Products::getProductsById($id);
//        Products::deleteProduct($id);
        header("Location: /home/cart");
    }
}

