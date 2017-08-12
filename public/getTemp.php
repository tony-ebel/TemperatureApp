<?php
	/* Validation will go here (Server Side)*/
	if($_POST['location']){
		$location = urlencode($_POST['location']);
	} else {
		exit('{"cod":400,"message":"No location given"}');
	}

	$url = "http://api.openweathermap.org/data/2.5/weather?q={$location}&units=imperial&APPID=141074e8a2059d7ec47d6e662cd5089a";

	// create curl resource
	$request = curl_init();
	// set curl options
	curl_setopt($request, CURLOPT_URL, $url);
	curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);

	// assign return string to variable
	$data = curl_exec($request);
	// close connection
	curl_close($request);

	echo($data);
?>