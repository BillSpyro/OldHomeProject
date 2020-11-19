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
$sql = "SELECT a.*, r.* FROM accounts a, roles r WHERE email = '$email' and password = '$password' and r.role_id = a.role_id and a.approved = TRUE";
$result = mysqli_query($link,$sql);

$count = mysqli_num_rows($result);

if($count == 1) {
  if (mysqli_query($link, $sql)) {
    session_start();
    //Sets the session variables
    while ($row = mysqli_fetch_array($result)){
      $_SESSION['id'] = $row['id'];
      $_SESSION['role_id'] = $row['role_id'];
      $_SESSION['access_level'] = $row['access_level'];
      $_SESSION['first_name'] = $row['first_name'];
      $_SESSION['last_name'] = $row['last_name'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['password'] = $row['password'];
      $_SESSION['phone'] = $row['phone'];
      $_SESSION['dathOfBirth'] = $row['dateOfBirth'];
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
