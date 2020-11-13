<?php

$link = mysqli_connect("localhost", "root", "","oldHome");

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT a.*, r.* FROM accounts a, roles r WHERE a.role_id = r.role_id and r.role_name = 'Supervisor'";
$supervisorResult = mysqli_query($link,$sql);

$sql = "SELECT a.*, r.* FROM accounts a, roles r WHERE a.role_id = r.role_id and r.role_name = 'Doctor'";
$doctorResult = mysqli_query($link,$sql);

$sql = "SELECT a.*, r.* FROM accounts a, roles r WHERE a.role_id = r.role_id and r.role_name = 'Caregiver' and patient_group = 1";
$caregiver1Result = mysqli_query($link,$sql);

$sql = "SELECT a.*, r.* FROM accounts a, roles r WHERE a.role_id = r.role_id and r.role_name = 'Caregiver' and patient_group = 2";
$caregiver2Result = mysqli_query($link,$sql);

$sql = "SELECT a.*, r.* FROM accounts a, roles r WHERE a.role_id = r.role_id and r.role_name = 'Caregiver' and patient_group = 3";
$caregiver3Result = mysqli_query($link,$sql);

$sql = "SELECT a.*, r.* FROM accounts a, roles r WHERE a.role_id = r.role_id and r.role_name = 'Caregiver' and patient_group = 4";
$caregiver4Result = mysqli_query($link,$sql);

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

$sql = "SELECT * FROM roster WHERE employee_id = '$caregiver1' and roster_date = '$date'";
$result = mysqli_query($link,$sql);
$count = mysqli_num_rows($result);

if($count > 0) {

  $caregiver1Error = "Error: Caregiver 1 already on the roster for that day";

} else {

  $sql = "INSERT INTO roster (employee_id, roster_date) VALUES ('$caregiver1', '$date')";
  $result = mysqli_query($link,$sql);
}

$sql = "SELECT * FROM roster WHERE employee_id = '$caregiver2' and roster_date = '$date'";
$result = mysqli_query($link,$sql);
$count = mysqli_num_rows($result);

if($count > 0) {

  $caregiver2Error = "Error: Caregiver 2 already on the roster for that day";

} else {
  $sql = "INSERT INTO roster (employee_id, roster_date) VALUES ('$caregiver2', '$date')";
  $result = mysqli_query($link,$sql);
}

$sql = "SELECT * FROM roster WHERE employee_id = '$caregiver3' and roster_date = '$date'";
$result = mysqli_query($link,$sql);
$count = mysqli_num_rows($result);

if($count > 0) {

  $caregiver3Error = "Error: Caregiver 3 already on the roster for that day";

} else {
  $sql = "INSERT INTO roster (employee_id, roster_date) VALUES ('$caregiver3', '$date')";
  $result = mysqli_query($link,$sql);
}

$sql = "SELECT * FROM roster WHERE employee_id = '$caregiver4' and roster_date = '$date'";
$result = mysqli_query($link,$sql);
$count = mysqli_num_rows($result);

if($count > 0) {

  $caregiver4Error = "Error: Caregiver 4 already on the roster for that day";

} else {
  $sql = "INSERT INTO roster (employee_id, roster_date) VALUES ('$caregiver4', '$date')";
  $result = mysqli_query($link,$sql);
}
}
// Close connection
mysqli_close($link);
?>
