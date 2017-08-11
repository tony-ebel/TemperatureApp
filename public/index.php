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
						if (httpStatus === "success"){
							console.log('good');
							$("#outContent").html(data);
						} else {
							console.log('bad');
							$("#outContent").html("\n<p>Oops! An error occured</p>\n<br>\n<p>Status: " + httpStatus + "</p>\n");
						};
					}
				);
				
				$("#inLocation").val('');
				$("#inLocation").focus();
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