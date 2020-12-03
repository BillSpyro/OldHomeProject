<?php

$link = mysqli_connect("localhost", "root", "","oldHome");

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$amount_due = 0;
$new_payment = 0;

// Escape user inputs for security
if (isset($_POST['newPayment'])) {
  $patient_id = $_POST['patient_id'];
  $now = date("Y-m-d");

  $sql = "SELECT p.amount_due FROM accounts a, patients p WHERE a.id = '$patient_id' and p.patient_id = a.id";
  $res = mysqli_query($link, $sql);

  if (mysqli_query($link, $sql)) {
  while ($row = mysqli_fetch_array($res)){
    $amount_due = $row['amount_due'];
  }
  }

    }

if (isset($_POST['update'])) {
$patient_id = $_POST['patient_id'];
$now = date("Y-m-d");

$sql = "SELECT p.admission_date FROM accounts a, patients p WHERE a.id = '$patient_id' and p.patient_id = a.id";
$res = mysqli_query($link, $sql);

if (mysqli_query($link, $sql)) {
while ($row = mysqli_fetch_array($res)){
  $admission_date  = $row['admission_date'];
}
}
$start_date = strtotime($admission_date);
$end_date = strtotime($now);
$totalDays = ($end_date - $start_date)/60/60/24;

$totalDue += $totalDays * 10;

$sql = "UPDATE patients SET amount_due = '$totalDue' WHERE patient_id = '$patient_id'";
$res = mysqli_query($link, $sql);

header("Location:paymentPage.php");
    }

?>
