<?php


class User
{
    public static function register($firstName, $lastName, $email, $password)
    {
        $db = Db::getConnection();
        $sql = 'INSERT INTO users (first_name, last_name, email, password) '
            . 'VALUES (:first_name, :last_name, :email, :password)';
        $result = $db->prepare($sql);
        $result->bindParam(':first_name', $firstName, PDO::PARAM_STR);
        $result->bindParam(':last_name', $lastName, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();

    }

	public static function getInfo($id)
	{
		$db = Db::getConnection();

		$sql = 'SELECT `first_name`, `last_name`, `email`, `pic` FROM `users` WHERE user_id =' . $id;
//		die($sql);
		$result = $db->prepare($sql);
		$result->execute();
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}

	public static function updatePic($pic)
	{
		$db = Db::getConnection();
		$sql = 'UPDATE `users` SET `pic` = :pic WHERE `user_id` = ' . $_SESSION['id'];
//		die($sql);
		$result = $db->prepare($sql);
		$result->bindParam(':pic', $pic, PDO::PARAM_STR);

		return $result->execute();
	}


	public static function getPic($id)
	{
		$db = Db::getConnection();
		$sql = "SELECT `pic` FROM `users` WHERE user_id =" . $id;
		//die($sql);
		$result = $db->prepare($sql);
//		$result->bindParam(':pic', $pic, PDO::PARAM_STR);
		return $result->execute();
	}


    public static function checkUserData($email, $password)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM users WHERE email = :email';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        $user = $result->fetch();

        if ($user && password_verify($password, $user["password"])) {
            return [
                "id"   =>  $user['user_id'],
                "first_name" =>  $user['first_name'],
                "last_name" =>  $user['last_name'],
                "email" =>  $user['email']
            ];
        }
        return false;
    }

    public static function auth($user)
    {
        $_SESSION['id'] = $user["id"];
        $_SESSION['first_name'] = $user["first_name"];
        $_SESSION['last_name'] = $user["last_name"];
        $_SESSION['email'] = $user["email"];
    }


    public static function checkLogged()
    {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        header("Location: /user/login");
    }


    public static function checkFirstName($firstName): bool
    {
        if (strlen($firstName) >= 3) {
            return true;
        }
        return false;
    }

    public static function checkLastName($lastName): bool
    {
        if (strlen($lastName) >= 5) {
            return true;
        }
        return false;
    }

    public static function checkPassword($password): bool
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }


    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }


    public static function checkEmailExists($email)
    {

        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM users WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        return false;
    }

    public static function getUserById($id)
    {

        $db = Db::getConnection();

        $sql = 'SELECT * FROM `users` WHERE `user_id` = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }

}