
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Register Patient</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../script/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <!-- basic patient registration form page -->
<?php
include "../Includes/header.php";
include "additional_Patient_info.php";
?>
<h1>Additional Information of Patient</h1>
<form action="additional_Patient_infoPage.php" method="post">
    <p>
        <label for="id">Patient ID:</label>
        <input type="text" name="id" id="id" required>
    </p>
    <input class="save" name="additional_Patient_info_search" type="submit" value="Ok">
</form>
   

<form action="additional_Patient_infoPage.php" method="post">

    <p>
        <label for="Group">Group:</label>
        <input type="text" name="Group" id="Group" required>
    </p>
    <p>
        <label for="Admission_Date">Admission Date:</label>
        <input type="date" name="Admission_Date" id="Admission_Date" required>
    </p>
    <p>
        <label for="first_name">Patient Name:</label>
        <p><?php


                echo $first_name;

        ?></p>
    </p>

    <input class="save" name="additional_Patient_info" type="submit" value="Ok">
    <input class="cancel" type="reset" value="Cancel">
</form>
<!-- include footer page -->
<?php
include "../Includes/footer.php";
?>
