<?php
	class link {
		//Link erstellen
		public function create ($title, $url, $folder) {
			if(!empty($title) && !empty($url) && !empty($folder)) {
				$file = file("data.json");		
				$list = json_decode($file[0]);
				$new_title = htmlspecialchars($title, ENT_QUOTES);
				$new_url = htmlspecialchars($url, ENT_QUOTES);
				$new_folder = htmlspecialchars($folder, ENT_QUOTES);
				array_push($list->links, array("title"=>$new_title, "url"=>$new_url, "folder"=>$new_folder));
				$jsonlist = json_encode($list);
				$data = fopen("data.json", "w");
				fwrite($data, $jsonlist);
				fclose($data);
			}
		}
		//Link löschen
		public function delete ($title) {
			$file = file("data.json");
			$list = json_decode($file[0]);
			$i = 0;
			foreach($list->links as $link)  {
				if($link->title == $title) {
					$x = $i;
				}
				$i++;
			}
			unset($list->links[$x]);
			$jsonlist = json_encode($list);
			$data = fopen("data.json", "w");
			fwrite($data, $jsonlist);
			fclose($data);
		}
	}
	
	class folder {
		//Ordner erstllen
		public function create ($name) {
				if(!empty($name)) {
				$file = file("data.json");
				$list = json_decode($file[0]);
				$new_name = htmlspecialchars($name, ENT_QUOTES);
				array_push($list->folders, array("name"=>$new_name));
				$jsonlist = json_encode($list);
				$data = fopen("data.json", "w");
				fwrite($data, $jsonlist);
				fclose($data);
			}
		}
	}
?>