<?
function createLink($href, $text)
{
	if (
		(!isset($_GET['page']) and $href == '/') or
		(isset($_GET['page']) and $_GET['page'] == $href)
	)

	{
		$class = ' class="active" ';
	}
	else
	{
		$class = '';
	}

	if($href != '/')
	{
		$hrefPart = '/?page=';
	}
	else
	{
		$hrefPart = '';
	}

	echo "<a href=\"$hrefPart$href\"$class>$text</a>";
}

$query = "SELECT * FROM pages WHERE url!='404' ";
$rezult = mysqli_query($link, $query) or die(mysqli_error($link));
for ($data = []; $row = mysqli_fetch_assoc($rezult); $data[] = $row);
	foreach ($data as $page)
	{
		createLink($page['url'], $page['text']);
	}
