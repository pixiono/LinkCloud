<?php
	include("classes.php");
	$link = new link();
	$folder = new folder();
	if(isset($_POST['action'])) {
		switch($_POST['action']) {
			//Link zur Datenbank hinzufügen
			case "addlink":
				$link->create($_POST['title'], $_POST['url'], $_POST['folder']);
				break;
			//Link aus Datenbank entfernen
			case "deletelink":
				$link->delete($_POST['title']);
				break;
			//Ordner zur Datenbank hinzufügen
			case "createfolder":
				$folder->create($_POST['name']);
				break;
		}
	} else {
		echo "FEHLER";
		header ("Location: index.php"); 
	}
?>