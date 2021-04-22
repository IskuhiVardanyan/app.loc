<?php

class PageErrorController{

	public function actionNotFound(){
//		header("Location: /not-found-page.php");
		require_once(ROOT . '/not-found-page.php');
		return true;
	}

}