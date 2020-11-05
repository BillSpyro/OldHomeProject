<?php

$link = mysqli_connect("localhost", "root", "","oldHome");

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if (isset($_POST['login'])) {
// Escape user inputs for security
$email = $_POST['email'];
$password = $_POST['password'];

//Checks matching email and password
$sql = "SELECT id FROM accounts WHERE email = '$email' and password = '$password'";
$result = mysqli_query($link,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$count = mysqli_num_rows($result);

if($count == 1) {
  if (mysqli_query($link, $sql)) {
    session_start();
    $_SESSION['email'] = $email;
    $_SESSION["password"] = $password;
    $_SESSION['loggedin'] = true;
    header("location:accountPage.php");
  } else {
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
  }
}else {
   $error = "Your Email or Password is invalid";
}
}

// Close connection
mysqli_close($link);
?>
