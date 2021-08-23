<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.CSS?v=1">
	<title><?= $title ?></title>
</head>
<body>

		<div id = 'wrapper'>
			<header>
				<? Include 'elems/header.php'; ?>
			</header>

			<main>

				<?= $content ?>

			</main>

			<footer>
				<? Include 'elems/footer.php'; ?>
			</footer>
		</div>

</body>
</html>