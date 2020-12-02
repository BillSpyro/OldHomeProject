<?php

$link = mysqli_connect("localhost", "root", "","oldHome");

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


// Escape user inputs for security
if (isset($_POST['miss_activity_search'])) {
    $date = $_POST['date'];
    $now = date("Y-m-d");
    $patient_name = "SELECT a.first_name, p.patient_group, roles.*, di.* FROM accounts a, dailyCare di, roles, patients p WHERE a.role_id = roles.role_id and role_name = 'Patient' and a.id = di.patient_id and a.id = p.patient_id and di.dailyCare_date = '$date';";


        if ($result = mysqli_query($link, $patient_name)) {
            if (mysqli_num_rows($result) > 0) {
                echo "<table border='1px black solid'>";
                echo "<tr>";
                echo "<th>Patient Name</th>";
                echo "<th>Morning Medcine</th>";
                echo "<th>AfterNoon Medcine</th>";
                echo "<th>Night Medicne</th>";
                echo "<th>Breakfast</th>";
                echo "<th>Lunch</th>";
                echo "<th>Dinner</th>";

                echo "<th>Doctor Name</th>";
                echo "<th>Care giver  Name</th>";
                echo "<th>doctor appointment</th>";
                echo "</tr>";
                while ($row = mysqli_fetch_array($result)) {
                    $rowString = "";
                    echo "<tr>";
                    $rowString .= "<td>" . $row['first_name'] .  "</td>";

                    $ans = $row['morning_med'];
                    if ($ans == 1){
                        $rowString .= "<td>" ."✓". "</td>";

                    }else {
                        $rowString .= "<td>" ."X". "</td>";
                    }
                    $ans = $row['afternoon_med'];
                    if ($ans == 1){
                        $rowString .= "<td>" ."✓". "</td>";

                    }else {
                        $rowString .= "<td>" ."X". "</td>";
                    }
                    $ans = $row['night_med'];
                    if ($ans == 1){
                        $rowString .= "<td>" ."✓". "</td>";

                    }else {
                        $rowString .= "<td>" ."X". "</td>";
                    }
                    $ans = $row['breakfast'];
                    if ($ans == 1){
                        $rowString .= "<td>" ."✓". "</td>";

                    }else {
                        $rowString .= "<td>" ."X". "</td>";
                    }
                    $ans = $row['lunch'];
                    if ($ans == 1){
                        $rowString .= "<td>" ."✓". "</td>";

                    }else {
                        $rowString .= "<td>" ."X". "</td>";
                    }

                    $ans = $row['dinner'];
                    if ($ans == 1){
                        $rowString .= "<td>" ."✓". "</td>";

                    }else {
                        $rowString .= "<td>" ."X". "</td>";
                    }
                    $group = $row['patient_group'];
                    $patient_id = $row['patient_id'];
                    $doctor_name = "SELECT a.first_name, roles.*, roster.* FROM accounts a, roles, roster WHERE a.role_id = roles.role_id and role_name = 'Doctor' and a.id = roster.employee_id and roster.roster_date = '$date';";

                    $result1 = mysqli_query($link, $doctor_name);
                    if (mysqli_num_rows($result1) > 0) {
                        while ($row = mysqli_fetch_array($result1)) {
                            $rowString .= "<td>" . $row['first_name'] . "</td>";
                        }
                    }
                    $cargiver_name1 = "SELECT a.first_name, roles.*, roster.* FROM accounts a, roles, roster WHERE a.role_id = roles.role_id and role_name = 'Caregiver' and a.id = roster.employee_id and roster.patient_group = '$group' and roster.roster_date = '$date';";
                    $result2 = mysqli_query($link, $cargiver_name1);
                    if (mysqli_num_rows($result2) > 0) {
                        while ($row = mysqli_fetch_array($result2)) {
                            $rowString .= "<td>" . $row['first_name'] . "</td>";
                        }
                    }
                    $appo_date = "SELECT doctorAppointment.appointment_date, a.id FROM doctorAppointment, accounts a WHERE doctorAppointment.appointment_date = '$date' and a.id = '$patient_id' and doctorAppointment.patient_id = a.id;";
                    $result3 = mysqli_query($link, $appo_date);
                    if (mysqli_num_rows($result3) >0) {
                        while ($row = mysqli_fetch_array($result3)) {

                            $ans = $row['appointment_date'];

                            if ($ans != $date) {
                                $rowString .= "<td>" ."X". "</td>";

                            }else  {
                                $rowString .= "<td>" ."✓". "</td>";
                            }

                        }
                    } else  {
                        $rowString .= "<td>" ."X". "</td>";
                      }

                  if (strpos($rowString, '<td>X</td>')){
                  echo $rowString;
                }
                }

                echo "</table>";
            }else{

                echo "Invalid Inpute";
            }
        }else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }

?>
