<form method = "POST">
		title:<br>
		<input name="title" value="<?= $title ?>" placeholder="type title"><br><br>

		url:<br>
		<input name="url" value="<?= $url ?>" placeholder="type url"><br><br>

		text:<br>
		<textarea name="text" placeholder="type text"><?= $text ?></textarea><br><br>
		<input type="submit">
</form>