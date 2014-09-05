<?php
	$file = file("data.json");
				$list = json_decode($file[0]);
				$title = "Twitter";
				$url = "http://www.twitter.com";
				$folder = "SocialMedia";
				array_push($list->links, array("title"=>$title, "url"=>$url, "folder"=>$folder));
				$jsonlist = json_encode($list);
				$data = fopen("data.json", "w");
				fwrite($data, $jsonlist);
				fclose($data);
?>