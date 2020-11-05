<?php

$link = mysqli_connect("localhost", "root", "","oldHome");

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM accounts WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($link, $sql);

if (mysqli_query($link, $sql)) {
    echo "Logged in successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

echo '<br>';
echo 'Hello user';
echo $result;

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
