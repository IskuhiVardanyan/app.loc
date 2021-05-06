<?php


class HomeController
{
    public function actionIndex()
    {
        $all_products = Products::getAllProducts();
        require_once(ROOT . '/views/home.php');
        return true;
    }

    public function actionMore($id)
    {
        $arr = Products::getProductsById($id);
        require_once(ROOT . '/views/user/more.php');
        return true;
    }


}