<?php 
session_start();
	define("API_KEY","AIzaSyATmyqWLIrZWv7bmGN7IETElbbgdX7UYqQ") ?>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Corona Toolkit</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="sample.css">
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
</head>
<body>
												<!-- HEADER -->
	<div>

		<p class="top muted">For more details visit the official government website: <a href="https://www.mohfw.gov.in/" target="blank"><i>mohfw.gov.in</i></a></p>
<!-- 		<img src="https://images.wallpaperscraft.com/image/band_multi-colored_lines_light_color_43711_1280x720.jpg" style="width:100%; height: 200px;"/>
 -->		<h1 class="main-heading" style="float:left;" >Covid-19 Toolkit</h1>
		<img id="seventyfive" src="corona.jpg" />
	</div>

												<!-- DROPDOWN -->

	<form id="form1" action="logout.php" method="POST" style="display:none;">
		<input type="number" id="lati" name="lati" step="any"/>
		<input type="number" id="longi" name="longi" step="any"/>
	</form> 
	<form id="form2" action="storeloc.php" method="POST" style="display:none;">
		<input type="number" id="lastlati" name="lastlati" step="any"/>
		<input type="number" id="lastlongi" name="lastlongi" step="any"/>
	</form> 
	<div class="dropdown" id="dropdown" style="float:right;display:none;">
		<button class="dropbtn rounded" id="dropbutt">My Account</button>
		<div class="dropdown-content" style="left:0;" id="accName">
			<a href="javascript:showProfileCard()">Profile</a>
			<!-- <a href="#" >Last Location</a> -->
			<a href="javascript:getLocation()">Logout</a>
		</div>
	</div>

												<!-- NAVBAR -->
	<div class="navigbar">
		<ul>
			<li id="navhome"><a class="nav-link active-navlink" href="#" >Home</a></li>
			<li id="navspeech"><a class="nav-link" href="speechtotext.php" >Contact Us</a></li>
			<li><a class="nav-link" href="dailydata.php" >Daily Data</a></li>
			<li><a class="nav-link" href="statedata.php" >Statewise Data</a></li>
			<li><a class="nav-link" href="worldtable.php" >World Data</a></li>
			<li style="float:right" id="navLogin"><a class="nav-link open-button" href="#" id="navLoginLink" onclick="openLoginForm(); return false;"  >Login</a></li>
			<li style="float:right" id="navSignup"><a class="nav-link open-button" href="#" id="navSignupLink" onclick="openSignupForm(); return false;" id-"navSignup">Sign-Up</a></li>
		</ul>
	</div>
	<p style="background-color: rgb(86, 175, 80);font-size: 5px;">.</p>
									<!-- PROFILECARD -->

	<div class="card" id="profcard" style="color:rgb(54, 50, 50);">
		<form action="setprofile.php" method="POST" enctype="multipart/form-data">
			<img  class="rounded" onclick="triggerclick()" id="profileDisplay" src="https://www.pngitem.com/pimgs/m/455-4552929_profile-icon-png-transparent-png.png" alt="name" style="width:150px;height:150px;margin-bottom:5px;"> 
			<input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
			<button type="submit" name='save_profile' id="save_profile" style="width:50%;margin:0 auto 0 auto;display:none;"> Upload</button>
		</form>
		<h1 id="cardName">Sachin Aggarwal</h1>
		<p class="title" id="cardUsername">sachin@example.com</p>
		<p id="cardLastLoc">last location: 0.0 0.0</p>
		
		<p><button onClick="closeCard()">Close</button></p>
	</div>

												<!-- SLIDESHOW -->
	<div class="slideshow-container">
		<div class="mySlides fade">
			<div class="numbertext">1 / 5</div>
			<img class="slideimg" src="slide1.jpg" style="width:100%">
			<div class="text"></div>
		</div>

		<div class="mySlides fade">
			<div class="numbertext">2 / 5</div>
			<img class="slideimg" src="slide2.webp" style="width:100%">
			<div class="text"></div>
		</div>

		<div class="mySlides fade">
			<div class="numbertext">3 / 5</div>
			<img class="slideimg" src="arogya4.png" style="width:100%">
			<div class="text"></div>
		</div>

		<div class="mySlides fade">
			<div class="numbertext">4 / 5</div>
			<img class="slideimg" src="slide4.png" style="width:100%">
			<div class="text"></div>
		</div>

		<div class="mySlides fade">
			<div class="numbertext">5 / 5</div>
			<img class="slideimg" src="slide5.gif" style="width:100%">
			<div class="text"></div>
		</div>

	</div>
	<br>

	<div style="text-align:center">
		<span class="dot"></span> 
		<span class="dot"></span> 
		<span class="dot"></span> 
		<span class="dot"></span> 
		<span class="dot"></span> 
	</div>			
												<!-- DATA -->
	<div class="updata">
        <div class="topdata"> WORLD: </div>
		<div class="datas rounded">
                <div class="datavalue" id="confworld">Reload</div>
                <img src="corsy1.png" class="coronasymbol"/>
                <div class="datahead">Total Confirmed</div>
        </div>
		<div class="datas rounded recovered">
                <div class="datavalue" id="recoveredworld">This</div>
                <img src="corsy3.png" class="coronasymbol"/>
                <div class="datahead">Cured/Discharged</div>
        </div>
		<div class="datas rounded deaths">
                <div class="datavalue" id="deathworld">Page</div>
                <img src="corsy2.png" class="coronasymbol"/>
                <div class="datahead">Total Deths</div>
        </div>
        <div>.</div>
    </div>
    <!-- <div>.</div> -->
	<div class="updata">
            <div class="topdata" > INDIA:</div>
            <div class="datas rounded">
                <div class="datavalue" id="confind">------</div>
                <img src="corsy1.png" class="coronasymbol"/>
                <div class="datahead">Total Confirmed</div>
            </div>
            <div class="datas rounded recovered">
                <div class="datavalue" id="recoveredind">------</div>
                <img src="corsy3.png" class="coronasymbol"/>
                <div class="datahead">Cured/Discharged</div> 
            </div>
            <div class="datas rounded deaths">
                <div class="datavalue" id="deathind">------</div>
                <img src="corsy2.png" class="coronasymbol"/>
                <div class="datahead">Total Deaths</div>
            </div>
            <div>.</div>
    </div>		
    <div>.</div>		

	 <?php
    $data = file_get_contents('https://api.covid19india.org/data.json');
    $coronalive=json_decode($data,true);
    $statescount=count($coronalive['cases_time_series']);
	$i=$statescount-1;	
	?>

	<script type="text/javascript">
		document.getElementById("confind").innerHTML = "<?php echo $coronalive['cases_time_series'][$i]['totalconfirmed']?>";
	</script>
	<script type="text/javascript">
		document.getElementById("recoveredind").innerHTML = "<?php echo $coronalive['cases_time_series'][$i]['totalrecovered']?>";
	</script>
	<script type="text/javascript">
		document.getElementById("deathind").innerHTML = "<?php echo $coronalive['cases_time_series'][$i]['totaldeceased']?>";
	</script>		

												<!-- FORMS -->

	<div class="form-popup" id="myLoginForm" style="color:rgb(83, 79, 79);">
		<form action="submitLogin.php"  class="form-container needs-validation" method="POST" novalidate>
			<h1>Login</h1>
		
			<label for="username"><b>Email</b></label>
			<input type="text" placeholder="Enter Email" name="uname" required pattern="^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$">
			<div class="invalid-feedback">
			Please enter a valid Email.
			</div>
		

			<label for="password"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="pass" required minlength="8" maxlength="32">
			<div class="invalid-feedback">
			The length of Password must be 8-32 characters.
			</div>

			<button type="submit" name="login_bt" class="btn sub">Login</button>
			<button type="submit" class="btn cancel" onclick="closeLoginForm()">Close</button>
		</form>
	</div>

	<div class="form-popup" id="mySignupForm" style="color:rgb(83, 79, 79);">
		<form action="submitSignup.php"  class="form-container needs-validation" method="POST" novalidate>

			<h1>Sign-Up</h1>

				<label for="fname"><b>First Name</b></label>
				<input type="text" placeholder="Enter First Name" name="fname" required >
				<div class="invalid-feedback">
				Input is invalid!.
				</div>

			
			<label for="lname"><b>Last Name</b></label>
			<input type="text" placeholder="Enter Last Name" name="lname" required>
			<div class="invalid-feedback">
			Input is invalid!.
			</div>
			
			<label for="email"><b>Email</b></label>
			<input type="text" placeholder="Enter Email" name="username" required pattern="^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$">
			<div class="invalid-feedback">
			Please enter a valid Email.
			</div>

			<label for="psw"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="password" required minlength="8" maxlength="32">
			<div class="invalid-feedback">
			The length of Password must be 8-32 characters.
			</div>

			<!-- <label><b>Upload Profile Picture</b></label>
			<div class="custom-file">
			<input type="file" class="custom-file-input" id="customFile">
			<label class="custom-file-label" for="customFile">Choose file</label>
			</div>
 -->
			<button type="submit" class="btn sub">Sign-Up</button>
			<button type="submit" class="btn cancel" onclick="closeSignupForm()">Close</button>
		</form>
	</div>

											

											<!-- CONTENT -->
	<div class="about">
		<h1 class="aboutHeading" style="margin:20px 35%;">ABOUT COVID 	-19</h1>
		<iframe style="float:right;" width="34%" height="340" src="https://www.youtube.com/embed/mOV1aBVYKGA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen ></iframe>
		<p class="aboutContent">Most people infected with the COVID-19 virus will experience mild to moderate respiratory illness and recover without requiring special treatment.  Older people, and those with underlying medical problems like cardiovascular disease, diabetes, chronic respiratory disease, and cancer are more likely to develop serious illness.</p>

		<p class="aboutContent" >The best way to prevent and slow down transmission is be well informed about the COVID-19 virus, the disease it causes and how it spreads. Protect yourself and others from infection by washing your hands or using an alcohol based rub frequently and not touching your face. </p>

		<p class="aboutContent">The COVID-19 virus spreads primarily through droplets of saliva or discharge from the nose when an infected person coughs or sneezes, so it’s important that you also practice respiratory etiquette (for example, by coughing into a flexed elbow).</p>

		<p class="aboutContent">At this time, there are no specific vaccines or treatments for COVID-19. However, there are many ongoing clinical trials evaluating potential treatments. WHO will continue to provide updated information as soon as clinical findings become available.</p>
		</p>

	</div>

											<!-- SYMPTOMS -->
	<div class="symptoms">
		<img src="images/symptoms2.png" style="width:35%; margin:0px auto; height: 200px;"/>
		<img src="images/symptoms_main.png" style="width:52%; margin:0px auto; height: 400px; float:left;"/>
		<img src="images/symptoms1.png" style="width:35%; margin:0px auto; height: 200px;"/>
		
	</div>

	<div class="his" style="width:45%; margin-left: 5%; float: left;">
		<h2 style="color:rgb(231, 152, 4);font-weight: 600; margin: 2px 26%;">HOW IT SPREADS</h2>
		<img src="images/his1.png" style="width:70%; margin: 5px 15%; height:200px">
		<img src="images/his2.png" style="width:70%; margin: 5px 15%; height:200px">
	</div>

	<div class="prev" style="width:45%; margin-right:5%; float:left;">
		<h2 style="color: rgb(0, 192, 0); margin:2px 37%;font-weight: 600;">PREVENTION</h2>
		<img src="images/prev1.png" style="width:70%; margin: 5px 15%; height:200px">
		<img src="images/prev2.png" style="width:70%; margin: 5px 15%; height:200px">
	</div>
	<div>.</div>


											<!-- LOCATION -->
	<h1 class="awarenessHeading" style="padding: 5px; margin: 3px 1% 0 0;">LOCATON TRACKER</h1>	
	<div style="margin-bottom:40px;">
		<div id="map"></div> 
		<div id="button-layer" style="margin:4px auto;"><button id="btnAction" onClick="locate()">Track Your Location</button></div>
	</div>	
										<!-- MYTH BUSTER -->	
	<div class="mythbuster">
		<h1 style="margin: 10px 2%;">MYTH BUSTERS</h1>
		<h2 style="margin: 10px 2%;">THESE ARE THE FACTS</h2>
	<div class="myths">
		<div class="myth">
			<img src="images/mythBusters/dis_type_1.png" style="float:left"/>
			<p>Cold weather and snow CANNOT kill the CoronaVirus .</p>
		</div>
		<div class="myth">
				<img src="images/mythBusters/dis_type_4.png" style="float:left"/>
				<p>The coronavirus CAN be transmitted in  areas with hot as well as with humid climates.</p>
		</div>
		<div class="myth">
				<img src="images/mythBusters/dis_type_7.png" style="float:left"/>
				<p>The coronavirus CANNOT be transmitted through mosquito bites.</p>
		</div>
		<div class="myth">
				<img src="images/mythBusters/dis_type_14.png" style="float:left"/>
				<p>Taking a hot bath DOES NOT prevent the coronavirus. But has it's own helth benifits.</p>
		</div>
		<div class="myth">
				<img src="images/mythBusters/dis_type_15.png" style="float:left"/>
				<p>Vaccines against pneumonia, such as pneumococcal vaccine and Haemophilus influenzae type b (Hib) vaccine, DO NOT provide protection against the coronavirus.</p>
		</div>
		</div>
	</div>		
	<div class="myths">
			<div class="myth">
				<img src="images/mythBusters/dis_type_2.png" style="float:left"/>
				<p>Hand dryers are NOT effective in killing the coronavirus.</p>
			</div>
			<div class="myth">
					<img src="images/mythBusters/dis_type_5.png" style="float:left"/>
					<p>Ultraviolet light SHOULD NOT be used for sterilization and can cause skin irritation.</p>
			</div>
			<div class="myth">
					<img src="images/mythBusters/dis_type_8.png" style="float:left"/>
					<p>Thermal scanners CAN detect if people have a fever but CANNOT detect whether or not someone has the coronavirus.</p>
			</div>
			<div class="myth">
					<img src="images/mythBusters/dis_type_11.png" style="float:left"/>
					<p>Spraying alcohol or chlorine all over your body WILL NOT kill viruses that have already entered your body.</p>
			</div>
			<div class="myth">
					<img src="images/mythBusters/dis_type_10.png" style="float:left"/>
					<p>There is NO evidence that companion animals/pets such as dogs or cats can transmit the coronavirus.</p>
			</div>
		</div>
	</div>		
	<div class="myths">
			<div class="myth">
				<img src="images/mythBusters/dis_type_3.png" style="float:left"/>
				<p>There is NO evidence that regularly rinsing the nose with saline has protected people from infection with the coronavirus.</p>
			</div>
			<div class="myth">
					<img src="images/mythBusters/dis_type_6.png" style="float:left;"/>
					<p>Garlic is healthy but there is NO evidence from the current outbreak that eating garlic has protected people from the coronavirus.</p>
			</div>
			<div class="myth">
					<img src="images/mythBusters/dis_type_9.png" style="float:left;"/>
					<p>Antibiotics DO NOT work against viruses, antibiotics only work against bacteria</p>
			</div>
			<div class="myth">
					<img src="images/mythBusters/dis_type_13.png" style="float:left;"/>
					<p>To date, there is NO specific medicine recommended to prevent or treat the coronavirus.</p>
			</div><div class="myth">
					<img src="images/mythBusters/dis_type_11.png" style="float:left;"/>
					<p>Drinking alcohol does not protect you against COVID-19 and can be dangerous. </p>
			</div>
		</div>
	</div>		
	<div>.</div>					


										<!-- /* AWARENESS */ -->

	<div class="awareness">
		<h1 class="awarenessHeading" style="margin: 10px 1.6%; padding-top:10px;;">GOVERNMENT GUIDELINES</h1>
		<a href="banner1.pdf" target="_blank"><img src="ban2.png" style="width:30%;float:left;height:350px; margin:1.6%; margin-bottom: 40px;"/></a>	
		<a href="banner2.pdf" target="_blank"><img src="ban1.png" style="width:30%;float:left;height:350px; margin:1.6%; margin-bottom: 40px;"/></a>
		<a href="banner3.pdf" target="_blank"><img src="ban3.png" style="width:30%;float:left;height:350px; margin:1.6%; margin-bottom: 40px;"/></a>
	</div>

	<div class="videos">
		<h1 class="awarenessHeading" style="margin: 20px 1.6%;">INFORMATIONAL VIDEOS</h1>
		<iframe style="width:30%; float:left; margin:1.6%; height:300;" src="https://www.youtube.com/embed/OZcRD9fV7jo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		<iframe style="width:30%; float:left; margin:1.6%; height:300;;" src="https://www.youtube.com/embed/1APwq1df6Mw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		<iframe style="width:30%; float:left; margin:1.6%; height:300;" src="https://www.youtube.com/embed/8c_UJwLq8PI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	</div>
	


									<!-- FOOTER -->
									<!-- Footer -->

<footer class="page-footer font-small blue pt-4">

<!-- Footer Links -->
<div class="container-fluid text-center text-md-left" >

  <!-- Grid row -->
  <div class="row" style="background-color:rgb(77, 77, 77); padding:10px;">

	<!-- Grid column -->
	<div class="col-md-6 mt-md-0 mt-3" >

	  <!-- Content -->
	  <h5 class="text-uppercase" style="margin-top: 50px;">COVID-19 TOOLKIT</h5>
	  <p>It is a tool to monitor the movement of the people in the quarintine centers.<br>It helps people to get the updated information about the current situation of the corona positive cases.</p>

	</div>
	<!-- Grid column -->

	<hr class="clearfix w-100 d-md-none pb-3">

	<!-- Grid column -->

	<div class="col-md-3 mb-md-0 mb-3">

			<!-- Links -->
			<h5 class="text-uppercase">Important Links</h5>
	  
			<ul>
			  <li class="footli">
				<a href="https://www.who.int/" target="blank">World Health Organization</a>
			  </li>
			  <li class="footli">
				<a href="https://www.mohfw.gov.in/" target="blank">Ministry of Health, Gov. of India</a>
			  </li>
			  <li class="footli">
				<a href="https://www.mygov.in/covid-19" target="blank">#IndiaFightsCorona Covid-19</a>
			  </li>
			  <li class="footli">
				<a href="https://www.covid19india.org/" target="blank">Covid Hotspots in India</a>
			  </li>
			  <li></li>
			</ul>
	  
		  </div>
		  <!-- Grid column -->

		  
	<div class="col-md-3 mb-md-0 mb-3" style="text-align: center;padding: 0 auto;">

	  <!-- Links -->
	  <h5 class="text-uppercase">Join Us</h5>

	  <ul style="width:90px;margin: auto" >
		<li class="footli" style="margin:0;padding:0; background-color: rgb(77, 77, 77);">
		  <a href="#!"><img src="in.png" style="width:25px;"> </i></a>
		</li>
		<li class="footli" style="margin:0;padding:0;background-color: rgb(77, 77, 77)">
		  <a href="#!"><img src="twitter.png" style="width:25px;"></a>
		</li>
		<li class="footli" style="background-color: rgb(77, 77, 77)">
		  <a href="#!"><img src="g+.png" style="width:25px;"></a>
		</li>
		<li class="footli" style="background-color: rgb(77, 77, 77);">
		  <a href="#!"><img src="fb.png" style="width:25px;"></a>
		</li>
		<li></li>
	  </ul>

	</div>
	<!-- Grid column -->

	<!-- Grid column -->
	
  </div>
  <!-- Grid row -->

</div>
<!-- Footer Links -->

<!-- Copyright -->
<div class="footer-copyright text-center py-3" style="background-color:rgb(43, 43, 43);">© 2020 Copyright:
  <a href="#"> covidtoolkit.com</a>
</div>
<!-- Copyright -->

</footer>
	
<!-- Footer -->
	
					
					
					<!-- <script type="text/javascript" src="sample.js"></script>  -->

					<!-- VALIDATON SCRIPT -->
	
		<script>
          (function() {
            'use strict';
            window.addEventListener('load', function() {
              var forms = document.getElementsByClassName('needs-validation');
              var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                  if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                  }
                  form.classList.add('was-validated');
                }, false);
              });
            }, false);
          })();
		  </script>
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
					<script
		src="https://maps.googleapis.com/maps/api/js?key=<?php echo API_KEY; ?>&callback=initMap"
		async defer></script>
	<script type="text/javascript">	

												/* MAP */
	
	var map;
	var marker;

	function initMap() {
		var mapLayer = document.getElementById("map");
		var coordinates = new google.maps.LatLng(28.6139, 77.2090);
		var defaultOptions = { center: coordinates, zoom: 13 }

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

	function getLocation(){
		if ("geolocation" in navigator){
			navigator.geolocation.getCurrentPosition(function(position){ 
				var Lat = position.coords.latitude;
				var Long = position.coords.longitude;
				document.getElementById('lati').value = Lat;
				document.getElementById('longi').value = Long;
				document.getElementById('form1').submit();

			});
		}
	}
	function getLoc(){
		if ("geolocation" in navigator){
			navigator.geolocation.getCurrentPosition(function(position){ 
				var Lat = position.coords.latitude;
				var Long = position.coords.longitude;
				document.getElementById('lastlati').value = Lat;
				document.getElementById('lastlongi').value = Long;
				document.getElementById('form2').submit();
				
			});
		}
	}
											/* FORMS */
										
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
										/* PROFILE UPLOAD */
	function triggerclick(e) {
		document.querySelector('#profileImage').click();
		document.getElementById("save_profile").style.display="block";
	}
	function displayImage(e) {
	if (e.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e){
		document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
		}
		reader.readAsDataURL(e.files[0]);
	}
	}

										/* SLIDESHOW SCRIPT */

	var slideIndex = 0;
	showSlides();

	function showSlides() {
		var i;
		var slides = document.getElementsByClassName("mySlides");
		var dots = document.getElementsByClassName("dot");
		for (i = 0; i < slides.length; i++) {
			slides[i].style.display = "none";  
		}
		slideIndex++;
		if (slideIndex > slides.length) {slideIndex = 1}    
		for (i = 0; i < dots.length; i++) {
			dots[i].className = dots[i].className.replace(" active", "");
		}
		slides[slideIndex-1].style.display = "block";  
		dots[slideIndex-1].className += " active";
		setTimeout(showSlides, 2000); // Change image every 2 seconds
	}

										/* WORLD DATA */
function fetch(){
    $.get("https://api.covid19api.com/summary",

      function(data){
       
          document.getElementById("confworld").innerHTML=data['Global']['TotalConfirmed'];

          document.getElementById("recoveredworld").innerHTML=data['Global']['TotalDeaths'];
          
          document.getElementById("deathworld").innerHTML=data['Global']['TotalRecovered'];

      }

      );

  }
 fetch();

	</script>

											<!-- LOGIN?SIGNUP -->

<?php 
	if(isset($_SESSION['username'])){
?>

<script type="text/javascript">


document.getElementById("navLogin").style.display = "none";
document.getElementById("navSignup").style.display = "none";
document.getElementById("dropdown").style.display = "block";

document.getElementById("cardUsername").innerHTML   = "<?php echo $_SESSION['username']; ?>";
document.getElementById("dropbutt").innerHTML       = "<?php echo "Hi ".$_SESSION['fname']; ?>" ;
document.getElementById("cardName").innerHTML       = "<?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?>" ;
document.getElementById("cardLastLoc").innerHTML    = "<?php echo "Last Loction: ".$_SESSION['lat'].",".$_SESSION['long']; ?>";
document.getElementById("profileDisplay").src = "<?php echo $_SESSION['profilepicture']?>"; 
/* setInterval(getLoc(), 1200000); */
/* getLoc(); */
</script>

<?php
	}
?>


	
</body>
</html>

