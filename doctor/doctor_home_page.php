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

<div class="patientInfo">

<div class="docotr-home">
    <h1>Doctor Home</h1>
    <!-- doctors home page about his patients  -->
    <form class="search" action="doctor_home_page.php" method="post">

        <input type="text" name="first" id="first" placeholder="first name" >
        <input type="text" name="last" id="last" placeholder="last name" >
        <input type="text" name="date" id="name" placeholder="Date" >
        <input type="text" name="comment" id="age" placeholder="Comment" >
        <input type="text" name="morning_med" id="emergency_contact" placeholder="Morning Med" >
        <input type="text" name="afternoon_med" id="family_code" placeholder="Afternoon Med" >
        <input type="text" name="night_med" id="admission_date" placeholder="Nighr Med" >
        <input class="save" name="doctor_info_search" type="submit" value="search">
        <input class="save" name="showall" type="submit" value="Show all">

    </form>

    <!-- patients name, date, comment and medicine time  View page for doctor -->

    <div class="docotrs_home--result">
        <h1>Search Result</h1>
        <?php
        include "doctor_home.php";
        ?>
    </div>



    </div>


    <!-- appointment lists search -->
    <div class="appointment_list">
    <form action="doctor_home_page.php" method="post">
        <label for="">Appointment date from now to:</label>
        <input type="date" name="appointment_date" >
        <input class="save" name="search_appointment_list" type="submit" value="search">

    </form>
</div>




<div class='edit'>
<?php
// appointment lists from now to specific date
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if (isset($_POST['search_appointment_list'])) {
    $appointment_date = $_POST['appointment_date'];
    $now = date("Y-m-d");
    $doctor_id = $_SESSION['id'];
    $sql = "SELECT a.*, d.* FROM accounts a, doctorAppointment d WHERE d.patient_id = a.id  and appointment_date BETWEEN '$now' and '$appointment_date' and d.doctor_id ='$doctor_id';";


    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {

        echo "<table>";
        echo "<tr>";
        echo "<th>Name</th>";
        echo "<th>Date</th>";
        echo "</tr>" ;
        while ($row = mysqli_fetch_array($result)){
            echo "<tr>" ;
            echo "<td>" . $row['first_name'] . " " . $row['last_name'].  "</td>";
            echo "<td>" . $row['appointment_date'] . "</td>";
            echo "<td> <a href=patient_of_doctor_page.php?id=" . $row['id'] . "&date=" . $row['appointment_date'] . ">Edit</a> </td>";
            echo "</tr>";
  }
  echo "<table>";
}else{
    $first_name = "error";
    $last_name = " incorrect ID";
}

}


?>
</div>

</div>


<!-- include footer page -->
<div class="footer">
<?php
include "../Includes/footer.php";
?>
</div>