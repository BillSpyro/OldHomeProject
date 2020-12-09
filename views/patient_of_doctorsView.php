<?php

$link = mysqli_connect("localhost", "root", "","oldHome");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient of doctor</title>
    <link href="../script/style.css" rel="stylesheet" type="text/css" />

</head>
<body class="patient--Info">
<?php
include "../Includes/header.php";
?>
<div class="patientInfo">
<div class="patient-info">
    <h1>Patient Information</h1>
    <form class="search" action="patient_of_doctorsView.php" method="post">
    <input type="text" name="id" id="name" placeholder="id" >
    <input type="text" name="first_name" id="name" placeholder="name" >
    <input type="text" name="dateOfBirth" id="age" placeholder="DOB(y-m-d)" >
    <input type="text" name="emergency_contact" id="emergency_contact" placeholder="emerg_contact" >
    <input type="text" name="family_code" id="family_code" placeholder="emerg_con_name" >
    <input type="text" name="admission_date" id="admission_date" placeholder="Admi_date" >
    <input class="save" name="patient_info_search" type="submit" value="search">
    <input class="save" name="showall" type="submit" value="Show all">

    </form>
    </div>
    <div class="patient_info--result">

        <h1>Search Result</h1>
    

     <?php
        include "patient_info.php";

    ?>
</div>
</div>
<?php
include "../Includes/footer.php";
?>
