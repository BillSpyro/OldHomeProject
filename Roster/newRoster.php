<?php

if ($_SESSION['access_level'] >= 4){

$link = mysqli_connect("localhost", "root", "","oldHome");

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

//Displays all available employees
$sql = "SELECT a.*, r.* FROM accounts a, roles r WHERE a.role_id = r.role_id and r.role_name = 'Supervisor' and a.approved = 1";
$supervisorResult = mysqli_query($link,$sql);

$sql = "SELECT a.*, r.* FROM accounts a, roles r WHERE a.role_id = r.role_id and r.role_name = 'Doctor' and a.approved = 1";
$doctorResult = mysqli_query($link,$sql);

$sql = "SELECT a.*, r.* FROM accounts a, roles r WHERE a.role_id = r.role_id and r.role_name = 'Caregiver' and a.approved = 1";
$caregiver1Result = mysqli_query($link,$sql);

$sql = "SELECT a.*, r.* FROM accounts a, roles r WHERE a.role_id = r.role_id and r.role_name = 'Caregiver' and a.approved = 1";
$caregiver2Result = mysqli_query($link,$sql);

$sql = "SELECT a.*, r.* FROM accounts a, roles r WHERE a.role_id = r.role_id and r.role_name = 'Caregiver' and a.approved = 1";
$caregiver3Result = mysqli_query($link,$sql);

$sql = "SELECT a.*, r.* FROM accounts a, roles r WHERE a.role_id = r.role_id and r.role_name = 'Caregiver' and a.approved = 1";
$caregiver4Result = mysqli_query($link,$sql);

//Adds the selected employees to the roster
if (isset($_POST['newRoster'])) {
  $date = $_POST['date'];
  $supervisor = $_POST['supervisor'];
  $doctor = $_POST['doctor'];
  $caregiver1 = $_POST['caregiver1'];
  $caregiver2 = $_POST['caregiver2'];
  $caregiver3= $_POST['caregiver3'];
  $caregiver4 = $_POST['caregiver4'];

  $sql = "SELECT * FROM roster WHERE employee_id = '$supervisor' and roster_date = '$date'";
  $result = mysqli_query($link,$sql);
  $count = mysqli_num_rows($result);

  if($count > 0) {

    $supervisorError = "Error: Supervisor already on the roster for that day";

  } else {

    $sql = "INSERT INTO roster (employee_id, roster_date) VALUES ('$supervisor', '$date')";
    $result = mysqli_query($link,$sql);

  }

  $sql = "SELECT * FROM roster WHERE employee_id = '$doctor' and roster_date = '$date'";
  $result = mysqli_query($link,$sql);
  $count = mysqli_num_rows($result);

  if($count > 0) {

    $doctorError = "Error: Doctor already on the roster for that day";

  } else {

  $sql = "INSERT INTO roster (employee_id, roster_date) VALUES ('$doctor', '$date')";
  $result = mysqli_query($link,$sql);

}

$sql = "SELECT * FROM roster WHERE employee_id = '$caregiver1' and roster_date = '$date' and patient_group = 1";
$result = mysqli_query($link,$sql);
$count = mysqli_num_rows($result);

if($count > 0) {

  $caregiver1Error = "Error: Caregiver 1 already on the roster for that day";

} else {

  $sql = "INSERT INTO roster (employee_id, roster_date, patient_group) VALUES ('$caregiver1', '$date', 1)";
  $result = mysqli_query($link,$sql);
}

$sql = "SELECT * FROM roster WHERE employee_id = '$caregiver2' and roster_date = '$date' and patient_group = 2";
$result = mysqli_query($link,$sql);
$count = mysqli_num_rows($result);

if($count > 0) {

  $caregiver2Error = "Error: Caregiver 2 already on the roster for that day";

} else {
  $sql = "INSERT INTO roster (employee_id, roster_date, patient_group) VALUES ('$caregiver2', '$date', 2)";
  $result = mysqli_query($link,$sql);
}

$sql = "SELECT * FROM roster WHERE employee_id = '$caregiver3' and roster_date = '$date' and patient_group = 3";
$result = mysqli_query($link,$sql);
$count = mysqli_num_rows($result);

if($count > 0) {

  $caregiver3Error = "Error: Caregiver 3 already on the roster for that day";

} else {
  $sql = "INSERT INTO roster (employee_id, roster_date, patient_group) VALUES ('$caregiver3', '$date', 3)";
  $result = mysqli_query($link,$sql);
}

$sql = "SELECT * FROM roster WHERE employee_id = '$caregiver4' and roster_date = '$date' and patient_group = 4";
$result = mysqli_query($link,$sql);
$count = mysqli_num_rows($result);

if($count > 0) {

  $caregiver4Error = "Error: Caregiver 4 already on the roster for that day";

} else {
  $sql = "INSERT INTO roster (employee_id, roster_date, patient_group) VALUES ('$caregiver4', '$date', 4)";
  $result = mysqli_query($link,$sql);
}

$sql = "SELECT p.id, r.access_level FROM accounts p, roles r WHERE p.role_id = r.role_id and r.access_level = 1";
$result = mysqli_query($link,$sql);
if (mysqli_query($link, $sql)) {
while ($row = mysqli_fetch_array($result)){
  $patient_id  = $row['id'];
  $sql = "INSERT INTO dailyCare (patient_id, dailyCare_date) VALUES ('$patient_id', '$date')";
  $res = mysqli_query($link,$sql);
}
}
if (mysqli_query($link, $sql)) {
    echo "Records added successfully.";
  }
}
// Close connection
mysqli_close($link);
} else {
  header("location:../Accounts/accountPage.php");
}
?>
