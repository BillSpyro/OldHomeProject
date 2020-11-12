<?php

$link = mysqli_connect("localhost", "root", "","oldHome");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../script/style.css" rel="stylesheet" type="text/css" />

</head>
<body>
<?php
include "../Includes/header.php";
?>
    <h1>patient Information for Doctors, Admins, supervisors,and Cargivers only!</h1>
    <form class="search" action="patient_of_doctorsView.php" method="post">
    <input type="text" name="id" id="name" placeholder="id" >
    <input type="text" name="first_name" id="name" placeholder="name" >
    <input type="text" name="dateOfBirth" id="age" placeholder="age" >
    <input type="text" name="emergency_contact" id="emergency_contact" placeholder="emerg_contact" >
    <input type="text" name="family_code" id="family_code" placeholder="emerg_con_name" >
    <input type="text" name="admission_date" id="admission_date" placeholder="Admi_date" >
    <input class="save" name="patient_info_search" type="submit" value="search">
    </form>

    <div class="search-result">

        <?php
            include "patient_info.php";

        ?>
    </div>
<div class="patient-info">
<?php



$sql = "SELECT a.*, r.* FROM accounts a, roles r WHERE a.role_id = r.role_id and r.role_name = 'patient';";
$result = mysqli_query($link, $sql);
$resultCheck = mysqli_num_rows($result);
if ($resultCheck > 0) {
    echo "<table border='1px black solid'>";
    echo "<tr>";
    echo "<th>id</th>";
    echo "<th>Name</th>";
    echo "<th>Age</th>";
    echo "<th>Emergency Contact</th>";
    echo "<th>Emergency Contact Name</th>";
    echo "<th>Admission Date</th>";
    echo "</tr>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['id']  . "</td>";
        echo "<td>" . $row['first_name'] . $row['last_name']. "</td>";
        $born = $row['dateOfBirth'];
        $now = time();
        $dob = strtotime($born);
        $difference = $now - $dob;
        $age = floor($difference / 31556926);
        echo "<td>" . $age . "</td>";
        echo "<td>" . $row['emergency_contact'] . "</td>";
        echo "<td>" . $row['family_code'] . "</td>";
        echo "<td>" . $row['admission_date'] . "</td>";
        echo "</tr>";
       
    }
    echo "</table>";
}else {
    echo "sorry, there is no dat in your databse";
}
include "../Includes/footer.php";

?>
</div>

</body>
</html>