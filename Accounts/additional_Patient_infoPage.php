
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Additional Patient Info</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../script/style.css" rel="stylesheet" type="text/css" />
</head>

<body class="addditionalInfo">
  <!-- basic patient registration form page -->
<?php
include "../Includes/header.php";
include "additional_Patient_info.php";
?>
<div class="additional-Info">
<h1>Additional Information of Patient</h1>
<form action="additional_Patient_infoPage.php" method="post">
    <p>
        <label for="id">Patient ID:</label>
        <input type="text" name="id" id="id" required>
    </p>
    <input class="save" name="additional_Patient_info_search" type="submit" value="Search">
</form>

<?php if (isset($_POST['additional_Patient_info_search'])): ?>
<form action="additional_Patient_infoPage.php" method="post">

    <p>
        <label for="group">Group:</label>
        <input type="text" name="group" id="group" required>
    </p>
    <p>
        <label for="admission_date">Admission Date:</label>
        <input type="date" name="admission_date" id="admission_date" required>
    </p>
    <p>
        <label for="first_name">Patient Name:</label>

        <input type="text" name="name" value="<?php echo $first_name . " " . $last_name; ?>" readonly>

    </p>

    <input class="save" name="additional_Patient_info" type="submit" value="Ok">
    <input class="cancel" type="reset" value="Cancel">
    <?php endif ?>
</form>
</div>
<!-- include footer page -->
<?php
include "../Includes/footer.php";
?>
