<?php
	$url = "http://rss.medicalnewstoday.com/womens_health-obgyn.xml";
	$xml = simplexml_load_string(file_get_contents($url)) or die("Error: Cannot create object");
	foreach ($xml->channel->item as $key) {
		echo '
		<ons-list-item modifier="longdivider">
			<div class="center">
				<span class="list__item__title"><a target="_blank" href="' . $key->link . '">' . $key->title . '</a></span>
				<span class="list__item__subtitle" style="margin-top: 10px;"><a target="_blank" href="' . $key->link . '">' . $key->description . '<br>
				<span class="catename">' . $key->category . '</a></span>
			</span></div>
		</ons-list-item>
		';
	}
?>