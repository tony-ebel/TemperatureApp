##### Simple Temperature App #####


Simple web application that accepts a location as input and displays current temperature into the page.
*Includes vagrant vm (Ubuntu 14.05)*

![img](https://tonyebel.com/example.gif)

HOW TO:

	1. Clone this Git repo
	2. In terminal start vm with vagrant from repo directory (vagrant up)
	3. In browser visit http://192.168.33.10/ or http://localhost:8000/

PROCESS:

	1. Client enters location
	2. Validation client side on input
	3. AJAX calls getTemp.php as POST request
	4. Validation server side on POST data
	5. PHP calls API with curl as GET request
	6. Returns JSON from API to client
	7. Client parses returned data and injects into page

REQUIRES:

	* Vagrant
	* VM Hypervisor


Examples of valid input:
	
	1. Omaha
	2. Omaha, NE
	3. Overland Park
	4. Overland Park, KS
	5. London, GB

