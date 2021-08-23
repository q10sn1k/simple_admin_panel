<?
	//on errors reporting
	error_reporting(E_ALL);
	ini_set("display_errors", "on");

	//session start
	session_start();

	//connect
	$host = 'localhost';
	$user = 'root';
	$passwd = 'root';
	$dbName = '45cms';

	$link = mysqli_connect($host, $user, $passwd, $dbName);
	mysqli_query($link, "SET NAMES 'utf8' ")

?>