<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Doctor's Appointment</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../script/style.css" rel="stylesheet" type="text/css" />
</head>

<body class="doctorsAppointment">
  <!-- basic patient registration form page -->
<?php
include "../Includes/header.php";
include "doctors_appointment.php";
?>
<div class="Dr-appointment">
<h1>Doctor's Appointment</h1>
<form class="Dr_appointment" action="doctorsAppointmentPage.php" method="post">
        <input type="text" name="patient_id" id="patient_id" placeholder="patient_id" required>
        <input type="date" name="roster_date" id="roster_date"  >
        
        <input class="save" name="drAppointment_search" type="submit" value="Search">
</form>
<?php if (isset($_POST['drAppointment_search'])): ?>
<form action="doctorsAppointmentPage.php" method="post">
    <label for="patient_id">Patient ID:</label>
    <input type="number" name="patient_id" value="<?php echo $patient_id; ?>" readonly >
    
    <label for="name">Patient Name:</label>

    <input type="text" name="name" value="<?php echo $first_name . " ". $last_name; ?>" readonly >

    <label for="roster_date">Roster Date:</label>
    <input type="date" name="roster_date" value="<?php echo $roster_date; ?>" readonly >

    <label for="doctor">Doctor:</label>

    <select name="doctor" id="doctor">
    <?php  while ($row = mysqli_fetch_array($doctorResult)): ?>
    <option value=<? echo $row['id']; ?>><? echo $row['first_name'] . " " . $row['last_name']; ?></option>
    <? endwhile ?>
    </select>
    <input class="save" name="doctorAppointment" type="submit" value="Ok">
    <input class="cancel" type="reset" value="Cancel">
    <?php endif ?>
</form>
</div>
<!-- include footer page -->
<?php
include "../Includes/footer.php";
?>
