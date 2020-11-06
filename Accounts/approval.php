<?php
session_start();
if ($_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'Supervisor') {

  $link = mysqli_connect("localhost", "root", "","oldHome");

  // Check connection
  if ($link === false) {
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }

$sql = "SELECT * FROM queue";

$nameArray = array();
$roleArray = array();

if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            array_push($nameArray, $row['first_name']);
            array_push($roleArray, $row['role']);
        }
        mysqli_free_result($result);
    } else {
        $error = "No records matching your query were found.";
    }
} else {
    $error = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);

















} else {
  header("Location:accountPage.php");
}
?>
