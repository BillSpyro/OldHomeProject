<?php

$link = mysqli_connect("localhost", "root", "","oldHome");

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$amount_due = 0;
$new_payment = 0;

// Escape user inputs for security
if (isset($_POST['Payment'])) {
  $patient_id = $_POST['patient_id'];
  $newPayment = $_POST['newPayment'];
  $now = date("Y-m-d");

  $sql = "SELECT p.amount_due FROM accounts a, patients p WHERE a.id = '$patient_id' and p.patient_id = a.id";
  $res = mysqli_query($link, $sql);

  if (mysqli_query($link, $sql)) {
  while ($row = mysqli_fetch_array($res)){
    $amount_due = $row['amount_due'];
  }
  }

  if (empty($newPayment)){
    $newPayment = 0;
  }

  $sql = "SELECT p.amount_paid FROM accounts a, patients p WHERE a.id = '$patient_id' and p.patient_id = a.id";
  $res = mysqli_query($link, $sql);
  if (mysqli_query($link, $sql)) {
  while ($row = mysqli_fetch_array($res)){
    $amount_paid = $row['amount_paid'];
  }
  }

  $amount_due = $amount_due - $newPayment;

  $amount_paid += $newPayment;

  $sql = "UPDATE patients SET amount_due = '$amount_due', amount_paid = '$amount_paid' WHERE patient_id = '$patient_id'";
  $res = mysqli_query($link, $sql);
    }

if (isset($_POST['update'])) {
$now = date("Y-m-d");

//Loop through each patient
$sql1 = "SELECT a.id FROM accounts a, roles r WHERE a.role_id = r.role_id and r.role_name = 'patient' and a.approved = true";
$res1 = mysqli_query($link, $sql1);

if (mysqli_query($link, $sql1)) {
while ($row = mysqli_fetch_array($res1)){
  $patient_id  = $row['id'];


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

$sql = "SELECT p.amount_paid FROM accounts a, patients p WHERE a.id = '$patient_id' and p.patient_id = a.id";
$res = mysqli_query($link, $sql);
if (mysqli_query($link, $sql)) {
while ($row = mysqli_fetch_array($res)){
  $amount_paid = $row['amount_paid'];
}
}

//Deduct amount paid
$totalDue = $totalDue - $amount_paid;

$sql = "UPDATE patients SET amount_due = '$totalDue' WHERE patient_id = '$patient_id'";
$res = mysqli_query($link, $sql);

}
}
header("Location:paymentPage.php");
    }

?>
