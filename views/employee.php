<?php
if ($_SESSION['access_level'] >= 4){

  $link = mysqli_connect("localhost", "root", "","oldHome");

  // Check connection
  if ($link === false) {
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }

$sql = "SELECT a.*, r.* FROM accounts a, roles r WHERE r.role_id = a.role_id and r.access_level >= 2";

$idArray = array();
$nameArray = array();
$roleArray = array();
$salaryArray = array();

if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            array_push($idArray, $row['id']);
            array_push($nameArray, $row['first_name']);
            array_push($roleArray, $row['role_name']);
            array_push($salaryArray, $row['salary']);
        }
        mysqli_free_result($result);
    } else {
        $error = "No records matching your query were found.";
    }
} else {
    $error = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


//Runs operation when Ok is selected
if (isset($_POST['search'])) {
$id = $_POST['id'];
$name = $_POST['name'];
$role = $_POST['role'];
$salary = $_POST['salary'];


$sql = "SELECT a.*, r.* FROM accounts a, roles r WHERE r.role_id = a.role_id and r.access_level >= 2 and a.id LIKE '$id%' and a.first_name LIKE '$name%' and r.role_name LIKE '$role%' and a.salary LIKE '$salary%'";

$idArray = array();
$nameArray = array();
$roleArray = array();
$salaryArray = array();

if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            array_push($idArray, $row['id']);
            array_push($nameArray, $row['first_name']);
            array_push($roleArray, $row['role_name']);
            array_push($salaryArray, $row['salary']);
        }
        mysqli_free_result($result);
    } else {
        $error = "No records matching your query were found.";
    }
} else {
    $error = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}

if (isset($_POST['update'])) {


}

// Close connection
mysqli_close($link);
} else {
  header("location:accountPage.php");
}
?>
