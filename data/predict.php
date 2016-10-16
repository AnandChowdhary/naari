<?php
	$hours = $_POST["hours"];
	$leak = $_POST["leak"];
	$discomfort = $_POST["discomfort"];
	$flow = $_POST["flow"];
	$activity = $_POST["activity"];
	$content = '{"dataset":[{"hours":"$hours","leak":"$leak","discomfort":"$discomfort","flow":"$flow","activity":"$activity"}]}';
	$url = "http://api.havenondemand.com/1/api/sync/predict/v2?json=";
	$url .= urlencode($content);
	$url .= "&model_name=tamp1&fields=%7B+%22fields%22%3A+%5B+%7B+%22name%22%3A+%22hours%22%2C+%22type%22%3A+%22STRING%22+%7D%2C+%7B+%22name%22%3A+%22leak%22%2C+%22type%22%3A+%22STRING%22+%7D%2C+%7B+%22name%22%3A+%22discomfort%22%2C+%22type%22%3A+%22STRING%22+%7D%2C+%7B+%22name%22%3A+%22flow%22%2C+%22type%22%3A+%22STRING%22+%7D%2C+%7B+%22name%22%3A+%22activity%22%2C+%22type%22%3A+%22STRING%22+%7D%2C+%7B+%22name%22%3A+%22label%22%2C+%22type%22%3A+%22STRING%22+%7D+%5D+%7D&apikey=0b58a0d7-aad5-4112-b5db-9e1c671c9958";
	$ch = cURL_init();
	$timeout = 5;
	cURL_setOpt($ch, CURLOPT_URL, $url);
	cURL_setOpt($ch, CURLOPT_RETURNTRANSFER, 1);
	cURL_setOpt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$html = cURL_exec($ch);
	cURL_close($ch);
	$data = json_decode($html);
	if (is_object($data)) {
		echo $data->dataset[0]->prediction;
	} else {
		echo "error";
	}
?>