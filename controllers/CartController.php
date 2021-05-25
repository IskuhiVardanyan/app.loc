<?php

class CartController
{
    public function actionBuy($id): bool
    {
          $productCount =
//        Products::updateProductCount($id, $productCount);
//        Products::deleteProduct($id);
          header("Location: /home/cart");
    }
}

