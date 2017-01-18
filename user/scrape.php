<?php

function scrape($url) {
	$cookie = "cookie.txt";

	// Initialize session and set URL.
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);

	// Set so curl_exec returns the result instead of outputting it.
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
	curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
	curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
	curl_setopt($ch, CURLOPT_CAINFO, getcwd() . "/crt/egram.teicm.gr.crt");
	
	// Get the response and close the channel.
	$response = curl_exec($ch);
	if ($response === false)
        echo 'Curl error: '.curl_error($ch).'<br /><br />';
	curl_close($ch);
	
	return $response;
}

?>
