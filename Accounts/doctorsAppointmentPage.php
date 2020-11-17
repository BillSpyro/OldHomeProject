<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Doctor's Appointment</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../script/style.css" rel="stylesheet" type="text/css" />
</head>

<body class="addditionalInfo">
  <!-- basic patient registration form page -->
<?php
include "../Includes/header.php";
include "doctors_appointment.php";
?>
<div class="Dr-appointment">
<h1>Doctor's Appointment</h1>
<form action="doctorsAppointmentPage.php" method="post">
    <p>
        <label for="id">Patient ID:</label>
        <input type="text" name="id" id="id" required>
    </p>
     <p>
        <label for="roster_date">Date:</label>
        <input type="date" name="roster_date" id="date" required>
    </p>
    <input class="save" name="drAppointment_search" type="submit" value="Search">
</form>

<?php if (isset($_POST['drAppointment_search'])): ?>
<form action="doctorsAppointmentPage.php" method="post">

    <p>
    <label for="first_name">Patient Name:</label>

    <p><?php echo $first_name . " " . $last_name; ?></p>
    </p>
   
    <p> 
        <label for="doctor">Doctor:</label>
        <select name="doctor" id="doctor">
        <?php  while ($row = mysqli_fetch_array($doctorResult)): ?>
      <option value=<? echo $row['id']; ?>><? echo $row['first_name'] . " " . $row['last_name']; ?></option>
        <? endwhile ?>
      </select>
    </p>
    <input class="save" name="doctorAppointment" type="submit" value="Ok">
    <input class="cancel" type="reset" value="Cancel">
    <?php endif ?>
</form>
</div>
<!-- include footer page -->
<?php
include "../Includes/footer.php";
?>
