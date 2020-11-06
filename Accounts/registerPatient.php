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
        <input type="text" name="family_code" id="family_code">
        <!--Checks if there is a duplicate family code in the DB-->
        <?php if (isset($family_code_error)): ?>
          <span><?php echo $family_code_error; ?></span>
        <?php endif ?>
    </p>
    <p>
        <label for="emergency_contact">Emergenct Contact:</label>
        <input type="text" name="emergency_contact" id="emergency_contact">
    </p>
    <p>
        <label for="relation_emergency">Relation to Emergency Contact:</label>
        <input type="text" name="relation_emergency" id="relation_emergency">
    </p>

    <input type="submit" name="registerPatient" value="Ok">
    <input type="reset" value="Cancel">
</form>
<!-- include footer page -->
<?php
include "../Includes/footer.php";
?>
