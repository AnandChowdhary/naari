<?php
	$with = $_POST["with"];
	$file_name = "xchat/" . $with . ".html";
	touch($file_name);
	$myfile = fopen($file_name, "r") or die("Unable to open file!");
	$ip = $_SERVER["REMOTE_ADDR"];
	while(!feof($myfile)) {
		$text = fgets($myfile);
		if ($text != "") {
			$info = explode("-->", str_replace("<!--", "", $text), 2);
			if ($info[0] == $ip) {
				echo "<div class='message message-mine'><div>$text</div></div>";
			} else {
				echo "<div class='message'><div>$text</div></div>";
			}
		}
	}
	fclose($myfile);
?>