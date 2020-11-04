<?php

$link = mysqli_connect("localhost", "root", "","oldHome");

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$role = $_POST['role'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$dateOfBirth = $_POST['dateOfBirth'];


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

// Attempt insert query execution
$sql = "INSERT INTO accounts (role, first_name, last_name, email, phone, password, dateOfBirth) VALUES ('$role', '$first_name', '$last_name', '$email', '$password', '$phone', '$dateOfBirth')";
if (mysqli_query($link, $sql)) {
    echo "Records added successfully.";
    header("Location:login.php");
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?>
