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
  $supervisor = $_POST['supervisor'];
  $doctor = $_POST['doctor'];
  $caregiver1 = $_POST['caregiver1'];
  $caregiver2 = $_POST['caregiver2'];
  $caregiver3= $_POST['caregiver3'];
  $caregiver4 = $_POST['caregiver4'];

  echo $supervisor;
  echo $doctor;
  echo $caregiver1;
  echo $caregiver2;
  echo $caregiver3;
  echo $caregiver4;

}
// Close connection
mysqli_close($link);
?>
