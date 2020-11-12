<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>New Roster</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../script/style.css" rel="stylesheet" type="text/css" />

</head>

<body>
<!-- include header page -->
<?php
include "../Includes/header.php";
include "newRoster.php";
?>
<!-- basic registeration form  -->
<h1>New Roster</h1>

<form class="register" action="newRosterPage.php" method="post">
<div>
  <div class="group1">
    <p>
        <label for="date">Date:</label>
        <input type="text" name="date" id="date" required>
    </p>
  <p>
  <label for="supervisor">Supervisor:</label>
      <select name="supervisor" id="supervisor">
        <?php  while ($row = mysqli_fetch_array($supervisorResult)): ?>
      <option value=<? echo $row['id']; ?>><? echo $row['first_name'] . " " . $row['last_name']; ?></option>
        <? endwhile ?>
      </select>
  </p>
  <p>
  <label for="doctor">Doctor:</label>
      <select name="doctor" id="doctor">
        <?php  while ($row = mysqli_fetch_array($doctorResult)): ?>
      <option value=<? echo $row['id']; ?>><? echo $row['first_name'] . " " . $row['last_name']; ?></option>
        <? endwhile ?>
      </select>
  </p>
  <p>
  <label for="caregiver1">Caregiver 1:</label>
      <select name="caregiver1" id="caregiver1">
        <?php  while ($row = mysqli_fetch_array($caregiver1Result)): ?>
      <option value=<? echo $row['id']; ?>><? echo $row['first_name'] . " " . $row['last_name']; ?></option>
        <? endwhile ?>
      </select>
  </p>
  <p>
  <label for="caregiver2">Caregiver 2:</label>
      <select name="caregiver2" id="caregiver2">
        <?php  while ($row = mysqli_fetch_array($caregiver2Result)): ?>
      <option value=<? echo $row['id']; ?>><? echo $row['first_name'] . " " . $row['last_name']; ?></option>
        <? endwhile ?>
      </select>
  </p>
  <p>
  <label for="caregiver3">Caregiver 3:</label>
      <select name="caregiver3" id="caregiver3">
        <?php  while ($row = mysqli_fetch_array($caregiver3Result)): ?>
      <option value=<? echo $row['id']; ?>><? echo $row['first_name'] . " " . $row['last_name']; ?></option>
        <? endwhile ?>
      </select>
  </p>
  <p>
  <label for="caregiver4">Caregiver 4:</label>
      <select name="caregiver4" id="caregiver4">
        <?php  while ($row = mysqli_fetch_array($caregiver4Result)): ?>
      <option value=<? echo $row['id']; ?>><? echo $row['first_name'] . " " . $row['last_name']; ?></option>
        <? endwhile ?>
      </select>
  </p>
    <input class="save" name="newRoster" type="submit" value="Ok">
    <input class="cancel" type="reset" value="Cancel">
    </div>
</div>
</form>
<!-- include footer page -->
<?php
include "../Includes/footer.php";
?>
