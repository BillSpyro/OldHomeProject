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

//Days Due
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

$totalDayDue = $totalDays * 10;

//Doctor Appointments Due
$sql = "SELECT COUNT(d.appointment_date) AS 'appointment_date' FROM accounts a, doctorAppointment d WHERE a.id = '$patient_id' and d.patient_id = a.id";
$res = mysqli_query($link, $sql);

if (mysqli_query($link, $sql)) {
while ($row = mysqli_fetch_array($res)){
  $doctorAppointments = $row['appointment_date'];
}
}

$totalAppointmentDue = $doctorAppointments * 50;

//Medicine Due
$sql = "SELECT SUM(morning + afternoon + night) as 'sum' FROM (SELECT d.morning_med, COUNT(d.morning_med) AS morning, d.afternoon_med, COUNT(d.afternoon_med) AS afternoon, d.night_med, COUNT(d.night_med) AS night FROM doctorAppointment d, accounts a WHERE a.id = '$patient_id' and d.patient_id = a.id
GROUP BY d.morning_med) AS medicine";
$res = mysqli_query($link, $sql);

if (mysqli_query($link, $sql)) {
while ($row = mysqli_fetch_array($res)){
  $totalMedicine = $row['sum'];
}
}
$months = $totalDays / 30;
if ($months < 1){
  $months = 1;
}
$totalMedicineDue = $totalMedicine * 5 * intval($months);

//Total amount calculated
$totalDue = $totalDayDue + $totalAppointmentDue + $totalMedicineDue;

$sql = "UPDATE patients SET amount_due = '$totalDue' WHERE patient_id = '$patient_id'";
$res = mysqli_query($link, $sql);

header("Location:paymentPage.php");
    }

?>
