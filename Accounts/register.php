<?php

$link = mysqli_connect("localhost", "root", "","oldHome");

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if (isset($_POST['register'])) {
// Escape user inputs for security
$role = $_POST['role'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$dateOfBirth = $_POST['dateOfBirth'];

$sql = "SELECT * FROM accounts WHERE email='$email'";
$res = mysqli_query($link, $sql);

if (mysqli_num_rows($res) > 0){
  $email_error = "Sorry... email already taken";
}else {
  // Attempt insert query execution
  $sql = "INSERT INTO accounts (role, first_name, last_name, email, password, phone, dateOfBirth) VALUES ('$role', '$first_name', '$last_name', '$email', '$password', '$phone', '$dateOfBirth')";
  if (mysqli_query($link, $sql)) {
      echo "Records added successfully.";
      header("Location:loginPage.php");
  } else {
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
  }
}
}

// Close connection
mysqli_close($link);
?>
