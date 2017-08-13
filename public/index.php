<!doctype html>
<html lang="en-US">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<title>Temp App</title>

		<!-- Include jQuery Google CDN -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script>
			function validate(){
				var re = /^[a-zA-Z][a-zA-Z]+\s*[a-zA-Z]+(?:,\s[a-zA-Z]{2})*$/;
				var inputBox = $("#inLocation");

				if (re.test(inputBox.val())){
					$.post(document.location.href + 'getTemp.php',
						{location: $("#inLocation").val()},
						function(data, httpStatus){
							var parsedData = JSON.parse(data);
							if (httpStatus === "success" && parsedData['cod'] == 200){
								buildContent(parsedData);
							} else {
								$("#outContent").html("\n<p>Oops! City not found!</p>");
							};
						}
					);
				} else {
					inputBox.css({"background-color": "indianred"});
					setTimeout(function(){inputBox.removeAttr("style");}, 2000);
				}
				
				inputBox.val('');
				inputBox.focus();
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
					validate();
				} else {
					return true;
				};
			}
		</script>
		<style>
			#inLocation {
				transition: background-color 0.8s;
			}
		</style>
	</head>

	<body>
		<header>
			<h1>Temperature App</h1>
		</header>

		<section>
			<input id="inLocation" placeholder="Search a location..." type="text" maxlength="35" autofocus onkeypress="checkEnter(event);">
			<input id="inSearch" type="button" value="Update" onclick="validate();">

			<section id="outContent">...</section>
		</section>

	</body>

</html>