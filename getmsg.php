<?php
$db = mysqli_connect("localhost", "root", "", "covid19toolkit");
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$num = mysqli_real_escape_string($db, $_POST['num']);
$num = intval($num);


    $query = "SELECT * FROM comments WHERE id = '$num' LIMIT 1";
    $results = mysqli_query($db, $query);
if(mysqli_num_rows($results)){
    $row = mysqli_fetch_assoc($results);
    $firstname= $row["firstname"];
    $lastname= $row["lastname"];
    $email= $row["email"];
    $mobile= $row["mobile"];
    $address= $row["address"];
    $state= $row["state"];
    $pin= $row["pin"];
    $message = $row["comment"];


include 'speakcomment.php';

echo 'Name : '.$firstname." ".$lastname;
echo "<br>";
echo 'Email : '.$email;
echo "<br>";
echo 'Mobile : '.$mobile;
echo "<br>";
echo 'Address : '.$address;
echo "<br>";
echo 'State : '.$state;
echo "<br>";
echo 'Pin : '.$pin;
echo "<br>";
}
else{
    echo 'could not fetch the data. Check the id given and try again.';
    include 'speakcomment.php';
}
?>

<textarea name="message" id="message"></textarea>
<button class="btn btn-primary" name="sub" id="sub" onclick="readOutLoud()"> Click to Speak</botton>

<script type="text/javascript">
    document.getElementById("message").value= "<?php echo $message; ?>";
</script>