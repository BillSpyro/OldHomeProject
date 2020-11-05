<?php

$link = mysqli_connect("localhost", "root", "","oldHome");

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if (isset($_POST['registerPatient'])) {
  session_start();
  $role = $_SESSION['role'];
  $first_name = $_SESSION["first_name"];
  $last_name = $_SESSION['last_name'];
  $email = $_SESSION['email'];
  $phone = $_SESSION["phone"];
  $password = $_SESSION["password"];
  $dateOfBirth = $_SESSION["dateOfBirth"];

  $family_code = $_POST['family_code'];
  $emergency_contact = $_POST['emergency_contact'];
  $relation_emergency = $_POST['relation_emergency'];

  $sql = "SELECT * FROM accounts WHERE family_code='$family_code'";
  $res = mysqli_query($link, $sql);

  if (mysqli_num_rows($res) > 0){
    $family_code_error = "Sorry... that family code was already taken";
  }else {
    // Attempt insert query execution
    $sql = "INSERT INTO accounts (role, first_name, last_name, email, password, phone, dateOfBirth, family_code, emergency_contact, relation_emergency) VALUES ('$role', '$first_name', '$last_name', '$email', '$password', '$phone', '$dateOfBirth', '$family_code', '$emergency_contact', '$relation_emergency')";
    session_unset();
    session_destroy();
    if (mysqli_query($link, $sql)) {
        echo "Records added successfully.";
        header("Location:loginPage.php");
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
  }
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

session_start();

if (mysqli_num_rows($res) > 0){
  $email_error = "Sorry... email already taken";
}else {
  $_SESSION['role'] = $role;
  $_SESSION["first_name"] = $first_name;
  $_SESSION['last_name'] = $last_name;
  $_SESSION['email'] = $email;
  $_SESSION["phone"] = $password;
  $_SESSION["password"] = $phone;
  $_SESSION["dateOfBirth"] = $dateOfBirth;
  if ($role == 'patient'){
    header("Location:registerPatient.php");
  } else {
  // Attempt insert query execution
  $sql = "INSERT INTO accounts (role, first_name, last_name, email, password, phone, dateOfBirth) VALUES ('$role', '$first_name', '$last_name', '$email', '$password', '$phone', '$dateOfBirth')";
  session_unset();
  session_destroy();
  if (mysqli_query($link, $sql)) {
      echo "Records added successfully.";
      header("Location:loginPage.php");
  } else {
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
  }
}}
}

// Close connection
mysqli_close($link);
?>
