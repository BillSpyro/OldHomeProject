<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Account Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../script/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
include "../Includes/header.php";
?>
<!--Greets the logged in user-->
   <div class="headr2">
     <ul class="admin">

    <?php if ($_SESSION['access_level'] >= 4): ?>
      <li><a href="../Accounts/approvalPage.php">Registration Approval</a></li>
      <li><a href="../Accounts/additional_Patient_infoPage.php">Additional Patient Info</a></li>
      <li><a href="../views/employeePage.php">Employee</a></li>
      <li><a href="../Roster/newRosterPage.php">New Roster</a></li>
      <li><a href="doctorsAppointmentPage.php">Doctor Appointment</a></li>
      <?php endif ?>

      <?php if ($_SESSION['access_level'] >= 5): ?>
      <li><a href="../Roles/rolePage.php">Roles</a></li>
      <?php endif ?>

      <?php if ($_SESSION['access_level'] >=2): ?>
      <li><a href="../views/patient_of_doctorsView.php">PatientInformation</a></li>
      <?php endif ?>

      <?php if ($_SESSION['access_level'] == 2): ?>
      <li><a href="../views/caregiverPage.php">Caregiver Home</a></li>
      <?php endif ?>
      <?php if ($_SESSION['access_level'] == 3): ?>
      <li><a href="../doctor/doctor_home_page.php">Docotr Appointment</a></li>
      <?php endif ?>

      <li><a href="../Roster/rosterPage.php">Roster</a></li>
    </ul>
  </div>
    <h1>Hello<?php
    echo " ".$_SESSION["first_name"] . " " . $_SESSION["last_name"] ; ?></h1>

    <h2>
      Here is your account information
    </h2>
<div class="yourInfo">
    <?php
    echo "<table border='1px black solid'>";
    echo "<tr>";
    echo "<th>id</th>";
    echo "<th>role id</th>";
    echo "<th>access level</th>";
    echo "<th>first name</th>";
    echo "<th>last name</th>";
    echo "<th>email</th>";
    echo "<th>password</th>";
    echo "<th>phone</th>";
    echo "<th>dateOfBirth</th>";

    echo "</tr>";
    echo "<tr>";
    echo "<td>" . $_SESSION['id']  . "</td>";
    echo "<td>" . $_SESSION['role_id'] . "</td>";
    echo "<td>" . $_SESSION['access_level'] . "</td>";
    echo "<td>" . $_SESSION['first_name'] . "</td>";
    echo "<td>" . $_SESSION['last_name'] . "</td>";
    echo "<td>" . $_SESSION['email'] . "</td>";
    echo "<td>" . $_SESSION['password'] . "</td>";
    echo "<td>" . $_SESSION['phone']  . "</td>";
    echo "<td>" . $_SESSION['dathOfBirth']  . "</td>";
    echo "</tr>";
    echo "</table>";

    ?>
</div>
    <?php
    include "../Includes/footer.php";
    ?>
</body>
</html>
