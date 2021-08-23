<?
	session_start();
	//session_destroy();
	$_SESSION['auth'] = null;
	header('Location: /admin/'); die();
	//echo 'logout';