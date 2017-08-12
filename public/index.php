<!doctype html>
<html lang="en-US">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<title>Temp App</title>

		<!-- Include jQuery Google CDN -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script>
			function btnPress(){
				/* Validation will go here */

				$.post(document.location.href + 'getTemp.php',
					{
						location: $("#inLocation").val()
					},
					function(data, httpStatus){
						var parsedData = JSON.parse(data);
						if (httpStatus === "success" && parsedData['cod'] == 200){
							buildContent(parsedData);
						} else {
							$("#outContent").html("\n<p>Oops! City not found!</p>");
						};
					}
				);
				
				$("#inLocation").val('');
				$("#inLocation").focus();
			}
			
			function buildContent(apiData){ 
				var temp = apiData['main']['temp'];
				var city = apiData['name'] + ", " + apiData['sys']['country'];
				var content = '<h2>' + temp + '</h2>' + '<h4>' + city + '</h4>';
				
				$("#outContent").html(content);
				//icon base url: https://openweathermap.org/img/w/
			}
			
			function checkEnter(e){
				var charCode;
				if (e && e.which){
					charCode = e.which;
				};
				if (charCode == 13){
					btnPress();
				} else {
					return true;
				};
			}
		</script>
	</head>

	<body>
		<header>
			<h1>Temperature App</h1>
		</header>

		<section>
			<input id="inLocation" placeholder="Search a location..." type="text" maxlength="35" autofocus onkeypress="checkEnter(event);">
			<input id="inSearch" type="button" value="Update" onclick="btnPress();">

			<section id="outContent">...</section>
		</section>

	</body>

</html> 