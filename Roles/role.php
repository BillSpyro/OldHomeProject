<?php
if ($_SESSION['access_level'] >= 5){

  $link = mysqli_connect("localhost", "root", "","oldHome");

  // Check connection
  if ($link === false) {
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }

$sql = "SELECT * FROM roles";

$roleArray = array();
$accessLevelArray = array();

if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            array_push($roleArray, $row['role_name']);
            array_push($accessLevelArray, $row['access_level']);
        }
        mysqli_free_result($result);
    } else {
        $error = "No records matching your query were found.";
    }
} else {
    $error = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


//Runs operation when Ok is selected
if (isset($_POST['role'])) {
$role_name = $_POST['new_role'];
$access_level = $_POST['access_level'];

$sql = "SELECT * FROM roles WHERE role_name='$role_name'";
$res = mysqli_query($link, $sql);

if (mysqli_num_rows($res) > 0){
  //Checks if role name is already used in DB
  $role_error = "Sorry... role name already exists";
} else {
$sql = "INSERT INTO roles (role_name, access_level) VALUES ('$role_name', '$access_level')";
if (mysqli_query($link, $sql)) {
    echo "Records added successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}
}

// Close connection
mysqli_close($link);
} else {
  header("location:accountPage.php");
}
?>
