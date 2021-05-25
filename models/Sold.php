<?php


class User
{
    public static function register($firstName, $lastName, $email, $password)
    {
        $db = Db::getConnection();
        $sql = 'INSERT INTO sold (first_name, last_name, email, password) '
            . 'VALUES (:first_name, :last_name, :email, :password)';
        $result = $db->prepare($sql);
        $result->bindParam(':first_name', $firstName, PDO::PARAM_STR);
        $result->bindParam(':last_name', $lastName, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
    }
}