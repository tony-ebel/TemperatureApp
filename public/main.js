function createTile(){
	var mainSection = document.querySelector('#main');
	var template = document.createElement('template');
	var tileHTML = '<section class="tile"><input class="inLocation" placeholder="Enter a location..." type="text" maxlength="35" autofocus autocomplete="off" pattern="^([^,]+)(,[^,]+)?(,[^,]+)?$" title="Examples: Kansas City or Kansas City, MO or Kansas City, MO, US" onkeypress="checkEnter(event);"><input class="inSearch" type="button" value="Search" onclick="validate(event);"></section>';

	template.innerHTML = tileHTML;
	mainSection.appendChild(template.content.firstChild);
}

function checkEnter(e){
	if (e.key === 'Enter' || e.keyCode === 13){
		validate(e);
	}
}

function validate(e){
	tile = e.target.parentElement
	inLocation = tile.querySelector('.inLocation');
	if (inLocation.checkValidity()){
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200){
				buildContent(tile, JSON.parse(this.response));
			}
		};
		xhttp.open("POST", "getTemp.php", true);
		xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhttp.send("location=" + inLocation.value);
	} else {
		inLocation.style.backgroundColor = 'red';
		setTimeout(function(){inLocation.style.backgroundColor = '';}, 1000);
	}
}

function buildContent(tile, apiData){
	console.log(apiData);
	var city = apiData['name'];
	var temp = apiData['main']['temp'];
	var iconURL = '//openweathermap.org/img/wn/' + apiData['weather']['0']['icon'] + '.png';
	var desc = apiData['weather']['0']['description'];
	var outContent = '<section class="outContent"><h4>' + city + '</h4>' + '<section><img src=' + iconURL + '><h2>' + temp + '</h2></section><p>' + desc + '</p></section>';
	console.log(outContent);
 

	var template = document.createElement('template');
	template.innerHTML = outContent;
	tile.appendChild(template.content);
}
