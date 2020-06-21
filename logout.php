<?php

session_start();

header('Location: sample.php');

$db = mysqli_connect("localhost", "root", "", "covid19toolkit");

if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$lat = mysqli_real_escape_string($db, $_POST['lati']);
$long = mysqli_real_escape_string($db, $_POST['longi']);


$query = "UPDATE users SET lastlat=$lat,lastlong=$long WHERE username='".$_SESSION['username']."' LIMIT 1";


$results = mysqli_query($db, $query);
   

mysqli_close($db);

$_SESSION = array();

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy();

?>

<script type="text/javascript">
    document.getElementById("navLogin").style.display = "block";
    document.getElementById("navSignup").style.display = "block";

    document.getElementById("dropdown").style.display = "none";
</script>