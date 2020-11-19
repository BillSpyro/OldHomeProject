<?php

$link = mysqli_connect("localhost", "root", "","oldHome");

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    if (isset($_POST['doctor_info_search'])) {

        $first_name = $_POST['name'];
        $date = $_POST['date'];
        $comment = $_POST['comment'];
        $morning_med = $_POST['morning_med'];
        $afternoon_med = $_POST['afternoon_med'];
        $night_med = $_POST['night_med'];
        $doctor_id = $_SESSION['id'];
        //$sql = "SELECT * FROM accounts WHERE id LIKE '$id%' and first_name LIKE '$first_name%' and dateOfBirth LIKE '$dateOfBirth%' and  emergency_contact LIKE '$emergency_contact%' and family_code LIKE '$family_code%';";
        $sql_base = "SELECT a.*, r.*, d.* FROM accounts a, roles r, doctorAppointment d WHERE a.role_id = r.role_id and r.role_name = 'patient' and a.id = d.patient_id and d.doctor_id ='$doctor_id'";

        if (empty($first_name)){
            $sql_firstName = " and a.first_name LIKE '$first_name%'";
          }else {
            $sql_firstName = " and a.first_name = '$first_name'";
          }
        if (empty($date)){
            $sql_date = " and d.appointment_date LIKE '$date%'";
          }else {
            $sql_date = " and d.appointment_date = '$date'";
          }
        if (empty($comment)){
            $sql_comment = " and d.comment LIKE '$comment%'";
          }else {
            $comment = " and d.comment = '$comment'";
          }
        if (empty($morning_med)){
            $sql_morning_med = " and d.morning_med LIKE '$morning_med%'";
          }else {
            $sql_morning_med = " and d.morning_med = '$morning_med'";
          }
        if (empty($afternoon_med)){
            $sql_afternoon_med = " and d.afternoon_med LIKE '$afternoon_med%'";
          }else {
            $sql_afternoon_med = " and p.afternoon_med = '$afternoon_med'";
          }
          if (empty($night_med)){
            $sql_night_med = " and d.night_med LIKE '$night_med%'";
          }else {
            $sql_night_med = " and p.night_med = '$night_med'";
          }

        $sql = $sql_base . $sql_firstName . $sql_date  . $sql_comment . $sql_morning_med .$sql_afternoon_med . $sql_night_med;
        //echo $sql;
        if ($result = mysqli_query($link, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                echo "<table>";
                echo "<tr>";
                echo "<th>Name</th>";
                echo "<th>Date</th>";
                echo "<th>Comment</th>";
                echo "<th>Morining Med</th>";
                echo "<th>Afternoon Med</th>";
                echo "<th>Night Med</th>";
                echo "</tr>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";

                    echo "<td>" . $row['first_name'] . " " . $row['last_name']. "</td>";
                    echo "<td>" . $row['appointment_date'] . "</td>";
                    echo "<td>" . $row['comment'] . "</td>";
                    echo "<td>" . $row['morning_med'] . "</td>";
                    echo "<td>" . $row['afternoon_med'] . "</td>";
                    echo "<td>" . $row['night_med'] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            }else{

                echo "Invalid Inpute";
            }
        }else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }elseif(isset($_POST['showall']) || !isset($_POST['showall']) ) {
        $doctor_id = $_SESSION['id'];
        $sql = "SELECT a.*, r.*, d.* FROM accounts a, roles r, doctorAppointment d WHERE a.role_id = r.role_id and r.role_name = 'patient' and a.id = d.patient_id and d.doctor_id='$doctor_id'";
        $result = mysqli_query($link, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {

            echo "<table>";
            echo "<tr>";
            echo "<th>Name</th>";
            echo "<th>Date</th>";
            echo "<th>Comment</th>";
            echo "<th>Morining Med</th>";
            echo "<th>Afternoon Med</th>";
            echo "<th>Night Med</th>";
            echo "</tr>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";

                    echo "<td>" . $row['first_name'] . " " . $row['last_name']. "</td>";
                    echo "<td>" . $row['appointment_date'] . "</td>";
                    echo "<td>" . $row['comment'] . "</td>";
                    echo "<td>" . $row['morning_med'] . "</td>";
                    echo "<td>" . $row['afternoon_med'] . "</td>";
                    echo "<td>" . $row['night_med'] . "</td>";
                    echo "</tr>";

            }
            echo "</table>";
        }else {
            echo "sorry, there is no dat in your databse";
        }
    }
?>
