<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		echo 111;exit();
		$this->render('index');
	}
}