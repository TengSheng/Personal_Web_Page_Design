<?php
    session_name("admin");
	session_start();
	unset($_SESSION['visitor_name']);
	if(!isset($_SESSION['visitor_name']))
	{
		$tiaozhuan='../login_1.php';//页面地址
		header('Location:'.$tiaozhuan);//跳转页面
	}
?>