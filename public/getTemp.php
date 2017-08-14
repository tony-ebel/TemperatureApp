<?php
	/* Validation (Server Side)*/

	//ensure POST request and data includes location variable
	if(!$_POST || !$_POST['location']){
		exit(1); //this likely isn't from client, so exit and don't return why

	//regex to validate location variable incase request is not from client, or client validation was tampered
	} elseif (!preg_match("/^[a-zA-Z][a-zA-Z]+\s*[a-zA-Z]+(?:,\s[a-zA-Z]{2})*$/", $_POST['location'])){
		exit(1); //still likely not from client, exit without returning why

	//validation passed. encode/assign and continue
	} else {
		$location = urlencode($_POST['location']);
	}


	/* Call API with curl */

	//build url string with $location as query and API key
	$url = "https://api.openweathermap.org/data/2.5/weather?q={$location}&units=imperial&APPID=141074e8a2059d7ec47d6e662cd5089a";

	// create curl resource
	$request = curl_init();

	// set curl options
	curl_setopt($request, CURLOPT_URL, $url);
	curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);

	// assign return string to variable
	$data = curl_exec($request);
	// close connection
	curl_close($request);

	//return JSON string to client
	echo($data);
	exit(0);
?>
