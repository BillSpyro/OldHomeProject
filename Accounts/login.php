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
$sql = "SELECT * FROM accounts WHERE email = '$email' and password = '$password'";
$result = mysqli_query($link,$sql);

$count = mysqli_num_rows($result);

if($count == 1) {
  if (mysqli_query($link, $sql)) {
    session_start();
    while ($row = mysqli_fetch_array($result)){
      $_SESSION['id'] = $row['id'];
      $_SESSION['role'] = $row['role'];
      $_SESSION['first_name'] = $row['first_name'];
      $_SESSION['last_name'] = $row['last_name'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['password'] = $row['password'];
      $_SESSION['Phone'] = $row['Phone'];
      $_SESSION['dathOfBirth'] = $row['dateOfBirth'];
      $_SESSION['family_code'] = $row['family_code'];
      $_SESSION['emergency_contact'] = $row['emergency_contact'];
      $_SESSION['relation_emergency'] = $row['relation_emergency'];
      $_SESSION['group'] = $row['group'];
      $_SESSION['admission_date'] = $row['admission_date'];
      $_SESSION['salary'] = $row['salary'];
    }

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
