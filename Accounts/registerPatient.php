<? include "register.php" ?>

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
?>
<form action="registerPatient.php" method="post">
    <p>
        <label for="family_code">Family Code:</label>
        <input type="text" name="family_code" id="family_code" required>
    </p>
    <p>
        <label for="emergency_contact">Emergenct Contact:</label>
        <input type="text" name="emergency_contact" id="emergency_contact" required>
    </p>
    <p>
        <label for="relation_emergency">Relation to Emergency Contact:</label>
        <input type="text" name="relation_emergency" id="relation_emergency" required>
    </p>

    <input class="save" name="registerPatient" type="submit" value="Ok">
    <input class="cancel" type="reset" value="Cancel">
</form>
<!-- include footer page -->
<?php
include "../Includes/footer.php";
?>
