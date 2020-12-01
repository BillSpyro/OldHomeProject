
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Home Page</title>
    <link href="../script/style.css" rel="stylesheet" type="text/css" />

</head>
<body>
<?php
include "../Includes/header.php";
?>
<div class="patient">
<div class="patient-page">
    <h1>Patient's Home</h1>
    <form class="search" action="patientHomePage.php" method="post">
    <input type="date" name="dailyCare_date" id="dailyCare_date" placeholder="appointment_date" >
    <input type="text" name="patient_id" id="patient_id" placeholder="patient_id" value=<?php echo $_SESSION['id'] ?> readonly >
    <input type="text" name="patient_name" id="patient_name" placeholder="patient_name" value=<?php echo $_SESSION['first_name'] . "-" . $_SESSION['last_name'] ?> readonly >
    <input class="save" name="patient_home" type="submit" value="search">

    </form>
    </div>
    <div class="patient--result">
        <h1>result</h1>

        <?php include "patientHome.php"; ?>

</div>
</div>
<?php
include "../Includes/footer.php";
?>
