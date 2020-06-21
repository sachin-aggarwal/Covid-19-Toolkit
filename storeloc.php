<?php

session_start();

/* header('Location: sample.php'); */

$db = mysqli_connect("localhost", "root", "", "covid19toolkit");

if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$lat = mysqli_real_escape_string($db, $_POST['lastlati']);
$long = mysqli_real_escape_string($db, $_POST['lastlongi']);


$query = "UPDATE users SET lastlat=$lat,lastlong=$long WHERE username='".$_SESSION['username']."' LIMIT 1";


$results = mysqli_query($db, $query);
   

mysqli_close($db);

?>

