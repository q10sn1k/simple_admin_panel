<?
	//включение отображения ошибок
	error_reporting(E_ALL);
	ini_set("display_errors", "on");

	Include 'connect.php';

	if (isset($_GET['page']))
	{
	$page = $_GET['page'];
	}
	else
	{
		$page = '/';
	}

	$query = "SELECT * FROM pages WHERE url='$page' ";
	$rezult = mysqli_query($link, $query) or die(mysqli_error($link));
	$page = mysqli_fetch_assoc($rezult);

	if (!$page)
	{
		$query = "SELECT * FROM pages WHERE url='404' ";
		$rezult = mysqli_query($link, $query) or die(mysqli_error($link));
		$page = mysqli_fetch_assoc($rezult);
		header("HTTP/1.0 404 Not Found");
	}

	$title = $page['title'];
	$content = $page['text'];


	Include 'layout.php';
?>

