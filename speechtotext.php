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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="sample.css">
    <title>Contact Us</title>
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
                                            <!-- NAVBAR -->
        <div class="navigbar">
                <ul>
                    <li><a class="nav-link" href="sample.php" >Home</a></li>
                    <li><a class="nav-link active-navlink" href="#" >Contact Us</a></li>
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
		<div style="margin: 24px 0;">
			<a class="anch" href="#"><i class="fa fa-twitter"></i></a>  
			<a class="anch" href="#"><i class="fa fa-linkedin"></i></a>  
			<a class="anch" href="#"><i class="fa fa-facebook"></i></a> 
		</div>
		<p><button onClick="closeCard()">Close</button></p>
	</div>
                                        <!-- FORM -->
                                        												<!-- FORMS -->
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

        <div class="mainhead" style="width:60%; margin: 20px auto 0px auto; font-size: 45px; color:rgb(196, 152, 11); font-weight: 700">
            CONTACT US
        </div>
                                            <!-- CONTACT US FORM -->
        <div class="contactForm rounded" style="max-width:60%; margin:10px auto;">
            <form class="needs-validation" method="POST" action="contactSubmit.php" novalidate>
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="firstname">FIRST NAME</label>
                            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name" required />
                            <div class="invalid-feedback">
                            Input is invalid!.
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="lasname">LAST NAME</label>
                            <input type="text" class="form-control" name="lastname" id="lasname" placeholder="Last Name" required />
                            <div class="invalid-feedback">
                            Input is invalid!.
                            </div>
                        </div>
                    
                        <p style="margin-bottom:5px; padding-left: 2px;">EMAIL</p>
                        <div class="input-group mb-3">
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email Address" aria-label="Recipient's username" aria-describedby="basic-addon2" required pattern="^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$"/>
                                <div class="input-group-append">
                                  <span class="input-group-text"  id="basic-addon2">name@example.com</span>
                                </div>
                                <div class="invalid-feedback">
                                Please enter a valid Email.
                                </div>
                        </div>

                        <p style="margin-bottom:5px; padding-left: 2px;">MOBILE</p>
                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"  id="basic-addon1">+91</span>
                                </div>
                                <input type="text" name="mobile" class="form-control" placeholder="Mobile Number" aria-label="Username" aria-describedby="basic-addon1" required pattern="^[0-9]*$" minlength="10" maxlength="10"/>
                                <div class="invalid-feedback">
                                Please enter a valid Mobile Number.
                                </div>
                        </div>

                        <p style="margin-bottom:5px; padding-left: 2px;">ADDRESS</p>
                        <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text muted"><img src="images/addr2.png" style="width:70px;"/></span>
                                </div>
                                <textarea class="form-control" name="address" aria-label="With textarea" required></textarea>
                                <div class="invalid-feedback">
                                Please enter a valid Address.
                                </div>
                            </div>
                            

                            
                            <div style="margin-top: 17px;" class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">SELECT STATE</label>
                                <select class="form-control" name="state" id="exampleFormControlSelect1">
                                        
                                                <option value=”Andhra Pradesh”>Andhra Pradesh</option>
                                                <option value=”Andaman and Nicobar Islands”>Andaman and Nicobar Islands</option>
                                                <option value=”Arunachal Pradesh”>Arunachal Pradesh</option>
                                                <option value=”Assam”>Assam</option>
                                                <option value=”Bihar”>Bihar</option>
                                                <option value=”Chandigarh”>Chandigarh</option>
                                                <option value=”Chhattisgarh”>Chhattisgarh</option>
                                                <option value=”Dadar and Nagar Haveli”>Dadar and Nagar Haveli</option>
                                                <option value=”Daman and Diu”>Daman and Diu</option>
                                                <option value=”Delhi”>Delhi</option>
                                                <option value=”Lakshadweep”>Lakshadweep</option>
                                                <option value=”Puducherry”>Puducherry</option>
                                                <option value=”Goa”>Goa</option>
                                                <option value=”Gujarat”>Gujarat</option>
                                                <option value=”Haryana”>Haryana</option>
                                                <option value=”Himachal Pradesh”>Himachal Pradesh</option>
                                                <option value=”Jammu and Kashmir”>Jammu and Kashmir</option>
                                                <option value=”Jharkhand”>Jharkhand</option>
                                                <option value=”Karnataka”>Karnataka</option>
                                                <option value=”Kerala”>Kerala</option>
                                                <option value=”Madhya Pradesh”>Madhya Pradesh</option>
                                                <option value=”Maharashtra”>Maharashtra</option>
                                                <option value=”Manipur”>Manipur</option>
                                                <option value=”Meghalaya”>Meghalaya</option>
                                                <option value=”Mizoram”>Mizoram</option>
                                                <option value=”Nagaland”>Nagaland</option>
                                                <option value=”Odisha”>Odisha</option>
                                                <option value=”Punjab”>Punjab</option>
                                                <option value=”Rajasthan”>Rajasthan</option>
                                                <option value=”Sikkim”>Sikkim</option>
                                                <option value=”Tamil Nadu”>Tamil Nadu</option>
                                                <option value=”Telangana”>Telangana</option>
                                                <option value=”Tripura”>Tripura</option>
                                                <option value=”Uttar Pradesh”>Uttar Pradesh</option>
                                                <option value=”Uttarakhand”>Uttarakhand</option>
                                                <option value=”West Bengal”>West Bengal</option>
                                                
                                </select>
                            </div>
                            <!-- <div style="margin-top: 17px;"class="form-group col-md-6">
                                    <label for="fname">STATE</label>
                                    <input type="text" class="form-control" name="state" id="fname" placeholder="Kerela">
                                </div> -->

                                <div style="margin-top: 17px;" class="form-group col-md-6">
                                    <label for="lname">PIN CODE</label>
                                    <input type="text" class="form-control" name="pin" id="lname" placeholder="eg.201013" required minlength="6" maxlength="6" pattern="^[0-9]*$"/>
                                    <div class="invalid-feedback">
                                    Please enter a valid Pin Code.
                                    </div>
                                </div>
                           
                        <p style="margin-bottom:5px;margin-top: 10px; padding-left: 2px;">COMMENT</p>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary" id="talk" type="button" style="background-color: #E9ECEF;"><img src="images/mic.jpg" style="width:70px; height:70px;"/></button>
                            </div>
                            <textarea class="form-control" name="comment" id="content" aria-label="With textarea" placeholder="Speak to add text..." required></textarea>
                            <div class="invalid-feedback">
                                Speak to enter your Comment...
                            </div>
                        </div>
                        
                        <button type="submit" style="width:15%; margin: 2px 2px;" class="btn btn-primary mb-2">SUBMIT</button>
            </form>
        </div>
        </div>
				<script src="speechtotext.js"></script>

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
    
</body>
</html>
