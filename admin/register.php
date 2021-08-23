<?
Include '../connect.php';

$title = 'register page';

ob_start();
include '../elems/formRegistration.php';
$content = ob_get_clean();


if (!empty($_POST['login']) and !empty($_POST['password']) and !empty($_POST['confirm']) and !empty($_POST['email']) and !empty($_POST['birthday_date']))
{

	$login = $_POST['login'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$birthday_date = $_POST['birthday_date'];
	$date = date('Y-m-d');

	function check_login($login)
	{
		return strlen($login) >= 4 && strlen($login) <= 10;
	}

	if (check_login($login) === false)
	{
		$_SESSION['message'] = [
			'text' => 'login range must be from 4 to 10',
			'status' => 'error'
		];
	}

	$query = "SELECT * FROM users WHERE login='$login'";
	$user = mysqli_fetch_assoc(mysqli_query($link, $query));


	if (empty($user))
	{

		if ($_POST['password'] == $_POST['confirm'])
		{
			$query = "INSERT INTO `users` (`id`, `login`, `password`, `type`, `email`, `birthday_date`, `registration_date`) VALUES (NULL, '$login', '$password', '2', '$email', '$birthday_date', '$date' )";
			// type users = 2: user ; type users = 1:admin
			mysqli_query($link, $query);

			// Пишем в сессию пометку об авторизации:
			$_SESSION['auth'] = true;// авторизация при успешной регистрации

			// Получаем id вставленной записи и пишем его в сессию:
			$id = mysqli_insert_id($link);
			$_SESSION['id'] = $id;
		}

		else
		{
			$_SESSION['message'] = [
				'text' => 'password mismaths',
				'status' => 'error'
			];
		}
	}

	else
	{
	$_SESSION['message'] = [
			'text' => 'the login you entered is busy',
			'status' => 'error'
		];
	}
}




Include '../elems/layoutAdmin.php';


