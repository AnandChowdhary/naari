<?php
	$to = $_POST["to"];
	$message = $_POST["message"];
	$file_name = "xchat/" . $to . ".html";
	touch($file_name);
	$myfile = fopen($file_name, "a") or die("Unable to open file!");
	$txt = "<!--" . $_SERVER["REMOTE_ADDR"] . "-->" . $message . PHP_EOL;
	fwrite($myfile, $txt);
	fclose($myfile);
?>