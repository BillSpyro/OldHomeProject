
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Family Page</title>
    <link href="../script/style.css" rel="stylesheet" type="text/css" />

</head>
<body>
<?php
include "../Includes/header.php";
?>
<div class="family">
<div class="family-page">
    <h1>Family Member’s Home</h1>
    <form class="search" action="family_page.php" method="post">
    <input type="date" name="dailyCare_date" id="dailyCare_date" placeholder="appointment_date" >
    <input type="text" name="family_code" id="family_code" placeholder="family_code" >
    <input type="text" name="patient_id" id="patient_id" placeholder="patient_id" >
    <input class="save" name="family_search" type="submit" value="search">

    </form>
    </div>
    <div class="family--result">
        <h1>result</h1>
        
     <?php
        include "family.php";
    
    ?>
</div>
</div>
<?php
include "../Includes/footer.php";
?>