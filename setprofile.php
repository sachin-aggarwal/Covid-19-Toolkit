
<?php
session_start();
$msg = "";
$msg_class = "";
$errors = array();
$conn = mysqli_connect("localhost", "root", "", "covid19toolkit");
if (isset($_POST['save_profile'])) {
  
  $profileImageName = time() . '-' . $_FILES["profileImage"]["name"];
  
  $target_dir = "profilepics/";
  $target_file = $target_dir . basename($profileImageName);
  
  // VALIDATION
  // validate image size. Size is calculated in Bytes
  if($_FILES['profileImage']['size'] > 200000) {
    $msg = "Image size should not be greated than 200Kb";
    array_push($errors,$msg);
  }
  // check if file exists
  if(file_exists($target_file)) {
    $msg = "File already exists";
    $msg_class = "alert-danger";
    array_push($errors,$msg);
  }
  $username = $_SESSION['username'];

  // Upload image only if no errors
  if (empty($errors)) {
    $username = $_SESSION['username'];
    if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
      $sql = "UPDATE users SET profilepicture='$target_file' where username='".$username."'";
      
      /* $sql = "INSERT INTO users (profilepict) VALUES ('$profileImageName') WHERE username='$username'"; */
      if(mysqli_query($conn, $sql)){
        $msg = "Image uploaded and saved in the Database";
        $msg_class = "alert-success";
        $_SESSION['profilepicture'] = $target_file;
        
      } else {
        $msg = "There was an error in the database";
        $msg_class = "alert-danger";
        array_push($errors,$msg);
      }
    } else {
      $error = "There was an erro uploading the file";
      $msg = "alert-danger";
      array_push($errors,$error);
    }
  }
  include 'errors.php';
}

header('Location: sample.php');

?> 