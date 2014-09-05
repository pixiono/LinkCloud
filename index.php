<?php
$json = file("data.json");
$arr = json_decode($json[0]);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>LinkCloud</title>
		<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="style.css"></link>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'></link>
		<meta name="viewport" content="width=300px, initial-scale=1" />
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="script.js"></script>
	</head>
	<body>
		<header>
			<p class="header">LinkCloud</p>
		</header>
		<article>
			<ul class="window">
				<li id="addlinkbox">				
					<!--<form action="api.php" method="post">-->
						<input id="addlinktitle" name="title" type="text" placeholder="Titel" size="20"></input></br>
						<input id="addlinkurl" name="url" type="text" placeholder="Link" size="20"></input></br>
						<select id="addlinkfolder" name="folder">
							<?php
								foreach($arr->folders as $folder) {
									echo '<option value="' . $folder->name . '">' . $folder->name . '</option>';
								}
							?>
						</select></br>
						<input name="action" value="addlink" type="hidden">
						<input id="addlinksubmit" value="Speichern" type="submit" ></input>
					<!--</form>-->
				</li>
				<li id="createfolderbox">
					<!--<form action="api.php" method="post">-->
						<input id="createfoldername" name="name" type="text" placeholder="Titel" size="20"></input></br>
						<input id="createfoldersubmit" type="submit" size="20" value="Erstellen"></input>
					<!--</form>-->
				</li>
				<a href="#" id="addlink"class="button"><li>Link speichern</li></a>
				<a href="#" id="createFolder" class="button"><li>Ordner erstellen</li></a>
				<?php
					//<li><img src="images/delete.png" class="$item->title"</img><a href="$item->url>$item->title</li></a>"</li>
					//$i++;
					$i = 0;
					foreach($arr->folders as $folder) {
						echo "<li class='" . $folder->name . "'>";
						echo $folder->name;
						echo "<ul class='" . $folder->name . "'>";
						foreach($arr->links as $link) {
							$new_url = str_replace("\/", "/", $link->url);
							if($link->folder == $folder->name) {
								echo "<li class='link'><img src='images/delete.png' id='" . $link->title . "'></img><a href='" . $new_url . "'>" . $link->title . "</a></li>";
							}
						}
						echo "</ul>";
						$i++;
					}
				?>
			</ul>
		</article>
		<footer>
			<a href="https://www.google.com/fonts/specimen/Open+Sans">Die verwendete Schrift "Open Sans" ist urheberrechtlich geschützt von Steve Mattensound (Apache License 2.0) und wird von Google Web Fonts geladen</a></br>
			<a href="https://jquery.org/">jQuery (MIT License)</a></br>
		</footer>
	</body>
</html>	