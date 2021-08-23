<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.CSS?v=5">
	<title><?= $title ?></title>
</head>
<body>

		<div id = 'wrapper'>
			<header>
				<a href="/admin/add.php">add new page</a>
				<a href="/admin">main</a>
				<a href="/">main user</a>
				<a href="/admin/logout.php">logout</a>
			</header>

			<main>
				<? include '../elems/info.php'; ?>
				<?= $content ?>

			</main>

			<footer>
				<? Include '../elems/footer.php'; ?>
			</footer>
		</div>

</body>
</html>