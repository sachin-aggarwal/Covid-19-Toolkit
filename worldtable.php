<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


    
    
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="sample.css">
    <title>Speech to Text</title>
</head>
<body>
        
        <p class="top">For more details visit the official government website: <a href="https://www.mohfw.gov.in/"><i>mohfw.gov.in</i></a></p>
        <h1 class="main-heading" style="float:left">Covid-19 Toolkit</h1>
        <img id="seventyfive" src="corona.jpg"/>

        <!-- DROPDOWN -->

	<form id="form1" action="logout.php" method="POST" style="display:none;">
		<input type="number" id="lati" name="lati" step="any"/>
		<input type="number" id="longi" name="longi" step="any"/>
	</form> 
	<div class="dropdown" id="dropdown" style="float:right;display:none;">
		<button class="dropbtn rounded" id="dropbutt">My Account</button>
		<div class="dropdown-content" style="left:0;" id="accName">
			<a href="javascript:showProfileCard()">Profile</a>
			<!-- <a href="#" >Last Location</a> -->
			<a href="javascript:getLocation()">Logout</a>
		</div>
	</div>

      
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
		<div style="margin: 24px 0;">
			<a class="anch" href="#"><i class="fa fa-twitter"></i></a>  
			<a class="anch" href="#"><i class="fa fa-linkedin"></i></a>  
			<a class="anch" href="#"><i class="fa fa-facebook"></i></a> 
		</div>
		<p><button onClick="closeCard()">Close</button></p>
	</div>

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

                                            <!-- NAVBAR -->
        <div class="navigbar">
                <ul>
                    <li><a class="nav-link" href="sample.php" >Home</a></li>
                    <li><a class="nav-link" href="speechtotext.php" >Contact Us</a></li>
                    <li><a class="nav-link" href="dailydata.php" >Daily Data</a></li>
                    <li><a class="nav-link" href="statedata.php" >Statewise Data</a></li>
                    <li><a class="nav-link  active-navlink" href="#" >World Data</a></li>
                    <li style="float:right" id="navLogin"><a class="nav-link open-button" href="#" id="navLoginLink" onclick="openLoginForm(); return false;"  >Login</a></li>
			        <li style="float:right" id="navSignup"><a class="nav-link open-button" href="#" id="navSignupLink" onclick="openSignupForm(); return false;" id-"navSignup">Sign-Up</a></li>

                </ul>
        </div> 
        <p style="background-color: rgb(86, 175, 80);font-size: 5px; ">.</p>
        <div style="float: left; width:60%;">
            <h1 style="font-weight: 700; color:rgb(87, 142, 163); padding: 20px 0 0 1%; max-resolution: 3px;px 1%;">COVID-19 CASES AROUND THE WORLD</h1>         
        </div>
        <form style="float:right; width:40%;padding: 20px 0 30px 0;text-align: left; " onsubmit=" return searchfunc()" >
                <input type="text" name="search" class="searchbar" id="searchinp" placeholder="Search State ..">
        </form>
        <div style="font-size:6px">.</div>
        <p class="text-muted" style="margin:0px 1%;"> This data was last updated on: <span id="muted"></span></p>
        
                                                <!-- TABLE -->
    <div  style="width:98%; margin:auto;">
            <table class="table table-dark table-bordered table-striped text-center table-hover" id="tbval";style="max-width:98%">
                <tr>
                
                <th style="border: 2px solid rgb(109, 109, 109);" >COUNTRY NAME</th>
                <th style="border: 2px solid rgb(109, 109, 109);">TOTAL CONFORMED</th>
                <th style="border: 2px solid rgb(109, 109, 109);">TOTAL RECOVERED</th>
                <th style="border: 2px solid rgb(109, 109, 109);">TOTAL DEATHS</th>
                <th style="border: 2px solid rgb(109, 109, 109);">NEW CASES</th>
                <th style="border: 2px solid rgb(109, 109, 109);">NEW RECOVERED</th>
                <th style="border: 2px solid rgb(109, 109, 109);">NEW DEATHS</th>

                
                </tr>
            </table>
                
            </div>
            <button id="rel" onclick="setTimeout(reload,2000)"> Reload </button>
        
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
<script>
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
  </script>

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

</script>

<?php
	}
?>

        <script>
        
        function fetch(){
            $.get("https://api.covid19api.com/summary",
        
            function(data){
                var tbval=document.getElementById('tbval');
                for(var i=1; i<(data['Countries'].length);
                i++){
                var x=tbval.insertRow();
                x.setAttribute("id",data['Countries'][i-1]['Country']);
                console.log(x);
                x.insertCell(0);
                tbval.rows[i].cells[0].innerHTML=data['Countries'][i-1]['Country'];
                tbval.rows[i].cells[0].style.border='2px solid grey';
                tbval.rows[i].cells[0].style.background='#15263b';
                tbval.rows[i].cells[0].style.color='#F4A590';
                    
        
        
                    x.insertCell(1);
                tbval.rows[i].cells[1].innerHTML=data['Countries'][i-1]['TotalConfirmed'];
                tbval.rows[i].cells[1].style.border='2px solid grey';
                tbval.rows[i].cells[1].style.color='#F9D342';
                tbval.rows[i].cells[1];
        
        
        
                    x.insertCell(2);
                tbval.rows[i].cells[2].innerHTML=data['Countries'][i-1]['TotalRecovered'];
                tbval.rows[i].cells[2].style.border='2px solid grey';
                tbval.rows[i].cells[2].style.color='#DDC6B6';
        
        
        
                    x.insertCell(3);
                tbval.rows[i].cells[3].innerHTML=data['Countries'][i-1]['TotalDeaths'];
                tbval.rows[i].cells[3].style.border='2px solid grey';
                tbval.rows[i].cells[3].style.color='#FDF5A6';
        
        
                    x.insertCell(4);
                tbval.rows[i].cells[4].innerHTML=data['Countries'][i-1]['NewConfirmed'];
                tbval.rows[i].cells[4].style.border='2px solid grey';
                tbval.rows[i].cells[4];
        
        
                    x.insertCell(5);
                tbval.rows[i].cells[5].innerHTML=data['Countries'][i-1]['NewRecovered'];
                tbval.rows[i].cells[5].style.border='2px solid grey';
                tbval.rows[i].cells[5].style.color='#F7C5CC';
        
        
                    x.insertCell(6);
                tbval.rows[i].cells[6].innerHTML=data['Countries'][i-1]['NewDeaths'];
                tbval.rows[i].cells[6].style.border='2px solid grey';
                tbval.rows[i].cells[6].style.color='#FFF748';


                document.getElementById("muted").innerHTML=data['Countries'][5]['Date']; 

                console.log(x);
                }
            }
        
            );
          
        
        }
        fetch();

        function reload(){
            var ele = document.getElementById("India");
            if(!ele){
                fetch();
            }
            else{
                document.getElementById("rel").style.display = "none";
            }
        }
        
        
        

        getElementById("muted").innerHTML=data['Countries'][5]['Date']; 



function searchfunc(){
    var sear = document.getElementById("searchinp");
    var state = sear.value;
    state = state[0].toUpperCase() + state.slice(1); 
    var elmnt = document.getElementById(state);
    if(!elmnt){
      alert("invalid input");
    }
    elmnt.scrollIntoView();
    elmnt.style.backgroundColor="rgb(151, 150, 150)";
    setTimeout(normal,3000);
    return false;
}

function normal(){
  var sear = document.getElementById("searchinp");
    var state = sear.value;
    state = state[0].toUpperCase() + state.slice(1); 
    var elmnt = document.getElementById(state);
   elmnt.style.backgroundColor= null; 
   sear.value = null;
}

        </script>
    </body>
</html>