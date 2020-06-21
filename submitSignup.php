
<?php
session_start();






$errors = array();

$db = mysqli_connect("localhost", "root", "", "covid19toolkit");

if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
$fname = mysqli_real_escape_string($db, $_POST['fname']);
$lname = mysqli_real_escape_string($db, $_POST['lname']);
$username = mysqli_real_escape_string($db, $_POST['username']);
$password = mysqli_real_escape_string($db, $_POST['password']);

$location = "<script type='text/javascript'>document.write(getLocation());</script>";



if(empty($fname)){
    array_push($errors,"First name is required");
};

if(empty($lname)){  array_push($errors,"Last name is required");};
if(empty($username)){   array_push($errors,"Email is required");};
if(empty($password)){   array_push($errors,"Password is required");};

$user_check_query = "SELECT * FROM users WHERE username = '$username' LIMIT 1";


$results = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($results); 

if ($user){

    if ($user['username']=== $username){
        array_push($errors,"Email already exists. Try Loggin in ..");
    }
}


if(count($errors) == 0){
    $sql = "INSERT INTO users (fname,lname,username,password) VALUES ('$fname','$lname','$username', '$password')";
    if(mysqli_query($db, $sql)){
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
    }
    $_SESSION['username'] = $username;
    $_SESSION['fname'] = $fname;
    $_SESSION['lname'] = $lname;
    $_SESSION['lat'] = 0;
    $_SESSION['long'] = 0;
    $_SESSION['profilepicture'] = "profilepics/default.png";
    $SESSION['success'] = "You Are Now Logged in";

    header('Location: sample.php');
} 
else{
    include 'errors.php';
}   

mysqli_close($db);

?>

<?php 
exit();?>