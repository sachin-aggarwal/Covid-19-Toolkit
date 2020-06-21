
<?php
session_start();

/* include 'speechtotext.php'; */

$errors = array();

$db = mysqli_connect("localhost", "root", "", "covid19toolkit");

if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
$fname = mysqli_real_escape_string($db, $_POST['firstname']);
$lname = mysqli_real_escape_string($db, $_POST['lastname']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$mobile = mysqli_real_escape_string($db, $_POST['mobile']);
$address = mysqli_real_escape_string($db, $_POST['address']);
$state = mysqli_real_escape_string($db, $_POST['state']);
$pin = mysqli_real_escape_string($db, $_POST['pin']);
$comment = mysqli_real_escape_string($db, $_POST['comment']);


if(empty($fname)){
    array_push($errors,"First name is required");
};

if(empty($lname)){  array_push($errors,"Last name is required");};
if(empty($email)){   array_push($errors,"Email is required");};
if(empty($mobile)){   array_push($errors,"Mobile is required");};


if(count($errors) == 0){
    $sql = "INSERT INTO comments (firstname,lastname,email,mobile,address,state,pin,comment) VALUES ('$fname','$lname','$email', '$mobile','$address', '$state', '$pin', '$comment')";
    if(mysqli_query($db, $sql)){
        header('Location: speechtotext.php');
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
    }
}    

mysqli_close($db);

?>

<script type="text/javascript">

    alert("Your comment has been successfully submitted.");

</script>

<?php 
exit();?>