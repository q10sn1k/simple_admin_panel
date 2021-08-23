<?
Include '../connect.php';

$title = 'login page';

if (!empty($_POST['login']) and !empty($_POST['password']))
{
	$login = $_POST['login'];
	$password = $_POST['password'];

	$query = "SELECT * FROM users WHERE login = '$login' AND password = '$password' ";
	$result = mysqli_query($link, $query);

	//преобразования ответа БД в понятный PHP
	$user = mysqli_fetch_assoc($result);

	if (!empty($user))
	{
		$_SESSION['auth'] = true;

		$_SESSION['message'] = [
			'text' => 'You login successefylly!',
			'status' => 'success'
		];

		header('Location: /admin/'); die();
	}
	else
	{

		$_SESSION['auth'] = null;

		$_SESSION['message'] = [
			'text' => 'You login incorrect, deny of success!',
			'status' => 'error'
		];

		ob_start();
		include '../elems/formAuth.php';
		$content = ob_get_clean();
	}


}
else
{
	$_SESSION['auth'] = null;

	$_SESSION['message'] = [
		'text' => 'Forms loggin and password must filled, pleace log in',
		'status' => 'error'
	];

	ob_start();
	include '../elems/formAuth.php';
	$content = ob_get_clean();
}

Include '../elems/layoutAdmin.php';