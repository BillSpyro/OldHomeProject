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

$sql = "SELECT id FROM accounts WHERE email = '$email' and password = '$password'";
$result = mysqli_query($link,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$count = mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row

if($count == 1) {
  if (mysqli_query($link, $sql)) {
    $_SESSION['email'] = $email;
    $_SESSION["password"] = $password;
    $_SESSION['loggedin'] = true;
    echo "Logged in successfully.";
  } else {
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
  }
}else {
   $error = "Your Email or Password is invalid";
}
}
/*
session_start();

$_SESSION["role"] = $role;
$_SESSION["first_name"] = $first_name;
$_SESSION["last_name"] = $last_name;
$_SESSION["email"] = $email;
$_SESSION["phone"] = $phone;
$_SESSION["password"] = $password;
$_SESSION["dateOfBirth"] = $dateOfBirth;

setcookie("role", $role, time() + 3600, "/", "", 0);
setcookie("first_name", $first_name, time() + 3600, "/", "", 0);
setcookie("last_name", $last_name, time() + 3600, "/", "", 0);
setcookie("email", $email, time() + 3600, "/", "", 0);
setcookie("phone", $phone, time() + 3600, "/", "", 0);
setcookie("password", $password, time() + 3600, "/", "", 0);
setcookie("dateOfBirth", $dateOfBirth, time() + 3600, "/", "", 0);
*/

// Close connection
mysqli_close($link);
?>
