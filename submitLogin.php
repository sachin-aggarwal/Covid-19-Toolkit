
<?php
session_start();

$errors = array();

$db = mysqli_connect("localhost", "root", "", "covid19toolkit");

if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
$username = mysqli_real_escape_string($db, $_POST['uname']);
$password = mysqli_real_escape_string($db, $_POST['pass']);

if(empty($username)){
    array_push($errors,"username is required");
}

if(empty($password)){
    array_push($errors,"Password is required");
}

if(count($errors)==0){
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $results = mysqli_query($db, $query);
if(mysqli_num_rows($results)){
    $row = mysqli_fetch_assoc($results);
    $_SESSION['fname'] = $row["fname"];
    $_SESSION['lname'] = $row["lname"];
    $_SESSION['lat'] = $row["lastlat"];
    $_SESSION['long'] = $row["lastlong"];
    $_SESSION['profilepicture'] = $row["profilepicture"];
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "logged in successfully";
    header('Location: sample.php');
    /* include 'sample.php'; */
}

else{
    array_push($errors,"Check your username or password and Login again or Sign Up for new account.");
    include 'errors.php';
}
 
}

mysqli_close($db);

?>



<?php 
exit();
?>