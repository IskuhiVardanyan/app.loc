<?php


class AdminController
{

    public function actionIndex(): bool
    {
        $all_info = User::getInfo($_SESSION["id"]);
		if($_SESSION["id"] > 0){
			require_once(ROOT . '/views/admin/dashboard.php');
			return true;
		}else{
			header("Location: /");
		}
    }
}