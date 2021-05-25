<?php

class Products{

    public static function addProduct($productName, $price, $description, $image, $created_by, $product_count)
    {
        $db = Db::getConnection();

        $sql = "INSERT INTO `products` (`product_name`, `price`, `description`, `image`, `created_by`, `product_count`)
            VALUES (:productName, :price, :description, :image, :created_by, :product_count)";
//die($sql);
        $result = $db->prepare($sql);
        $result->bindParam(':productName', $productName);
        $result->bindParam(':price', $price);
        $result->bindParam(':description', $description);
        $result->bindParam(':image', $image);
        $result->bindParam(':created_by', $created_by);
        $result->bindParam(':product_count', $product_count);
        return $result->execute();
    }

    public static function getAllProducts()
    {
        $db = Db::getConnection();

        $sql_products = 'SELECT * FROM `products`' . ' ' . 'ORDER BY `product_id` DESC';
        $result_products = $db->prepare($sql_products);
        $result_products->execute();
        return $result_products->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getOwnProducts()
    {
        $db = Db::getConnection();

        $sql_products = 'SELECT * FROM `products` WHERE `created_by` =' .  $_SESSION["id"] . ' ' . 'ORDER BY `product_id` DESC';
//        die($sql_products);
        $result_products = $db->prepare($sql_products);
        $result_products->execute();
        return $result_products->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getProductsById($id)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM `products` WHERE `product_id` =' . $id;
        $result = $db->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getUserName($id)
    {
        $db = Db::getConnection();
        $sql = 'SELECT `first_name`, `last_name` FROM `users` WHERE `user_id` =' . $id;
        $result = $db->prepare($sql);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function deleteProduct($num)
    {
        $db = Db::getConnection();
        $sql_delete = 'DELETE FROM `products` WHERE `product_id`=' . $num;
//      die($sql_delete);
        $result_delete = $db->prepare($sql_delete);
        return $result_delete->execute();
    }

    public static function editProductByAdmin($id, $productName, $price, $description, $product_count)
    {
        $db = Db::getConnection();
        $sql = 'UPDATE `products` SET `product_name` =' . "'" . $productName . "'" . ', `price` ='
            . "'" . $price . "'" . ', `description` =' . "'" . $description . "'"  . ', `product_count` =' . "'" . $product_count . "'"  .
            " " . 'WHERE' . ' `product_id`=' . $id;
//   die($sql);
        $result = $db->prepare($sql);
//      $result->bindParam(':status', $status);
        return $result->execute();
    }

    public static function updateImage($id, $image)
    {
        $db = Db::getConnection();
        $sql = 'UPDATE `products` SET `image` = :image WHERE `product_id` = ' . $id;
//		die($sql);
        $result = $db->prepare($sql);
        $result->bindParam(':image', $image, PDO::PARAM_STR);
        return $result->execute();
    }

    public static function updateProductCount($id, $productCount)
    {
        $db = Db::getConnection();
        $sql = 'UPDATE `products` SET `product_count` = :product_count WHERE `product_id` = ' . $id;
//		die($sql);
        $result = $db->prepare($sql);
        $result->bindParam(':image', $image, PDO::PARAM_STR);
        return $result->execute();
    }

}