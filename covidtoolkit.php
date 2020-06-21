<?php 
	define("API_KEY","AIzaSyATmyqWLIrZWv7bmGN7IETElbbgdX7UYqQ") ?>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>How to Get Current Location using Google Map Javascript API</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="sample.css">
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
</head>
<body>
	<p class="top">For more details visit: <a href="https://www.mohfw.gov.in/"><i>mohfw.gov.in</i></a></p>
	<h1 class="heading" style="float:left">Covid-19 Toolkit</h1>
	<img id="seventyfive" src="corona.png"/>

	<div class="dropdown" style="float:right;">
		<button class="dropbtn">My Account</button>
		<div class="dropdown-content" style="left:0;">
			<a href="javascript:showProfileCard()">Profile</a>
			<a href="javascript:lastLocation()">Last Location</a>
			<a href="javascript:logout()">Logout</a>
		</div>
	</div>

	<div class="navbar">
		<ul>
			<li><a class="nav-link active-navlink" href="#" >Home</a></li>
			<li style="float:right" id="navLogin"><a class="nav-link open-button" href="#" onclick="openLoginForm(); return false;"  >Login</a></li>
			<li style="float:right"><a class="nav-link open-button" href="#" onclick="openSignupForm(); return false;" id-"navSignup">Sign-Up</a></li>
		</ul>
	</div>

	<div class="form-popup" id="myLoginForm">
		<form action="/action_page.php"  class="form-container">
			<h1>Login</h1>

			<label for="email"><b>Email</b></label>
			<input type="text" placeholder="Enter Email" name="email" required>

			<label for="psw"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="psw" required>

			<button type="submit" class="btn">Login</button>
			<button type="submit" class="btn cancel" onclick="closeLoginForm()">Close</button>
		</form>
	</div>

	<div class="form-popup" id="mySignupForm">
		<form action="/action_page.php"  class="form-container">
			<h1>Sign-Up</h1>
			<label for="fname"><b>First Name</b></label>
			<input type="text" placeholder="Enter First Name" name="fname" required>

			<label for="lname"><b>Last Name</b></label>
			<input type="text" placeholder="Enter Last Name" name="lname" required>

			<label for="email"><b>Email</b></label>
			<input type="text" placeholder="Enter Email" name="email" required>

			<label for="psw"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="psw" required>

			<button type="submit" class="btn">Sign-Up</button>
			<button type="submit" class="btn cancel" onclick="closeSignupForm()">Close</button>
		</form>
	</div>

	<div class="card" id="profcard">
		<img src="/w3images/team2.jpg" alt="name" style="width:200px">
		<h1>John Doe</h1>
		<p class="title">CEO & Founder, Example</p>
		<p>Harvard University</p>
		<div style="margin: 24px 0;">
			<a class="anch" href="#"><i class="fa fa-dribbble"></i></a> 
			<a class="anch" href="#"><i class="fa fa-twitter"></i></a>  
			<a class="anch" href="#"><i class="fa fa-linkedin"></i></a>  
			<a class="anch" href="#"><i class="fa fa-facebook"></i></a> 
		</div>
		<p><button onClick="closeCard()">Close</button></p>
	</div>

	<div id="map"></div> 
	
	<div id="button-layer"><button id="btnAction" onClick="locate()">My Current Location</button></div>

	<!-- <script type="text/javascript" src="sample.js"></script>  -->
	<script
		src="https://maps.googleapis.com/maps/api/js?key=<?php echo API_KEY; ?>&callback=initMap"
		async defer></script>
	<script type="text/javascript">	
	
	var map;
	var marker;

	function initMap() {
		var mapLayer = document.getElementById("map");
		var coordinates = new google.maps.LatLng(28.6139, 77.2090);
		var defaultOptions = { center: coordinates, zoom: 11 }

		map = new google.maps.Map(mapLayer, defaultOptions);
		marker = new google.maps.Marker({
								position: coordinates,
								map: map,
								
							});
		marker.setPosition(coordinates);
	}

	function locate(){
		document.getElementById("btnAction").disabled = true;
		document.getElementById("btnAction").innerHTML = "Processing...";
		if ("geolocation" in navigator){
			navigator.geolocation.getCurrentPosition(function(position){ 
				var Lat = position.coords.latitude;
				var Long = position.coords.longitude;

				var currentLocation = { lat: Lat, lng: Long };

				map.setCenter(currentLocation);
				marker.setPosition(currentLocation);
				document.getElementById("btnAction").style.display = 'none';
				setInterval(locate, 3000);
			});
		}
	}

	function openLoginForm() {
		document.getElementById("mySignupForm").style.display = "none";
		document.getElementById("myLoginForm").style.display = "block";
	}

	function closeLoginForm() {
		document.getElementById("myLoginForm").style.display = "none";
	}

	function openSignupForm() {
		document.getElementById("myLoginForm").style.display = "none";
		document.getElementById("mySignupForm").style.display = "block";
	}

	function closeSignupForm() {
		document.getElementById("mySignupForm").style.display = "none";
	}

	function showProfileCard(){
		document.getElementById("profcard").style.display = "block";
	}

	function closeCard(){
		document.getElementById("profcard").style.display = "none";
	}

	function lastLocation(){
		document.getElementById("button-layer").style.display = "block";
		alert("in function");
	}
	</script>
	
</body>
</html>

