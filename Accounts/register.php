<?php

$link = mysqli_connect("localhost", "root", "","oldHome");

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT * FROM roles";
$result = mysqli_query($link,$sql);

//Checks if the user registered as a patient
if (isset($_POST['registerPatient'])) {
  $role = $_SESSION['role'];
  $first_name = $_SESSION['first_name'];
  $last_name = $_SESSION['last_name'];
  $email = $_SESSION['email'];
  $phone = $_SESSION['phone'];
  $password = $_SESSION['password'];
  $dateOfBirth = $_SESSION['dateOfBirth'];

  $family_code = $_POST['family_code'];
  $emergency_contact = $_POST['emergency_contact'];
  $relation_emergency = $_POST['relation_emergency'];

  $sql = "SELECT * FROM roles WHERE role_name = '$role'";
  $res = mysqli_query($link, $sql);
  while ($row = mysqli_fetch_array($res)){
    $role_id = $row['role_id'];
  }

  // Attempt insert query execution
  $sql = "INSERT INTO accounts (role_id, first_name, last_name, email, password, phone, dateOfBirth) VALUES ('$role_id', '$first_name', '$last_name', '$email', '$password', '$phone', '$dateOfBirth')";
  if (mysqli_query($link, $sql)) {
    $sql = "SELECT accounts.id FROM accounts WHERE email = '$email' and password = '$password'";
    $res = mysqli_query($link, $sql);
    while ($row = mysqli_fetch_array($res)){
      $id = $row['id'];
    }
    $sql = "INSERT INTO patients (patient_id, family_code, emergency_contact, relation_emergency) VALUES ('$id', '$family_code', '$emergency_contact', '$relation_emergency')";
    session_unset();
    session_destroy();
    if (mysqli_query($link, $sql)) {
      header("Location:loginPage.php");
    }
  } else {
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
  }
}

//Checks if the user registered

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
  //Checks if email is already used in DB
  $email_error = "Sorry... email already taken";
}else {
  $_SESSION['role'] = $role;
  $_SESSION['first_name'] = $first_name;
  $_SESSION['last_name'] = $last_name;
  $_SESSION['email'] = $email;
  $_SESSION['phone'] = $phone;
  $_SESSION['password'] = $password;
  $_SESSION['dateOfBirth'] = $dateOfBirth;
  //If registered as a patient they will be directed to another page for more information
  if ($role == 'Patient'){
    header("Location:registerPatient.php");
  } else {

echo $role;
  $sql = "SELECT * FROM roles WHERE role_name = '$role'";
  $res = mysqli_query($link, $sql);
  while ($row = mysqli_fetch_array($res)){
    $role_id = $row['role_id'];
  }

  // Attempt insert query execution
  $sql = "INSERT INTO accounts (role_id, first_name, last_name, email, password, phone, dateOfBirth) VALUES ('$role_id', '$first_name', '$last_name', '$email', '$password', '$phone', '$dateOfBirth')";
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
}

// Close connection
mysqli_close($link);
?>
