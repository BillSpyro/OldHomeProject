<?php

$link = mysqli_connect("localhost", "root", "","oldHome");

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    //Displays patients based on search
    if (isset($_POST['family_search'])) {

        $dailyCare_date = $_POST['dailyCare_date'];
        $family_code = $_POST['family_code'];
        $patient_id = $_POST['patient_id'];
        
        $sql = "SELECT di.*,  p.* FROM dailyCare di,  patients p WHERE p.patient_id = di.patient_id and di.dailyCare_date = '$dailyCare_date' and p.family_code = '$family_code' and p.patient_id = '$patient_id';";
        
        if ($result = mysqli_query($link, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                echo "<table border='1px black solid'>";
                echo "<tr>";
                
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
                    echo "<tr>";
                    
                    $ans = $row['morning_med'];
                    if ($ans == 1){
                        echo "<td>" ."✓". "</td>";

                    }else {
                        echo "<td>" ."X". "</td>";
                    }
                    $ans = $row['afternoon_med'];
                    if ($ans == 1){
                        echo "<td>" ."✓". "</td>";

                    }else {
                        echo "<td>" ."X". "</td>";
                    }
                    $ans = $row['night_med'];
                    if ($ans == 1){
                        echo "<td>" ."✓". "</td>";

                    }else {
                        echo "<td>" ."X". "</td>";
                    }
                    $ans = $row['breakfast'];
                    if ($ans == 1){
                        echo "<td>" ."✓". "</td>";

                    }else {
                        echo "<td>" ."X". "</td>";
                    }
                    $ans = $row['lunch'];
                    if ($ans == 1){
                        echo "<td>" ."✓". "</td>";

                    }else {
                        echo "<td>" ."X". "</td>";
                    }
                    
                    $ans = $row['dinner'];
                    if ($ans == 1){
                        echo "<td>" ."✓". "</td>";

                    }else {
                        echo "<td>" ."X". "</td>";
                    }

                    $doctor_name = "SELECT a.first_name, roles.*, roster.* FROM accounts a, roles, roster WHERE a.role_id = roles.role_id and role_name = 'Doctor' and a.id = roster.employee_id and roster.roster_date = '$dailyCare_date';";

                    $result = mysqli_query($link, $doctor_name);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<td>" . $row['first_name'] . "</td>";
                        }
                    }
                    $cargiver_name1 = "SELECT a.first_name, roles.*, roster.* FROM accounts a, roles, roster WHERE a.role_id = roles.role_id and role_name = 'Caregiver' and a.id = roster.employee_id and roster.patient_group = 1 and roster.roster_date = '$dailyCare_date';";
                    $result = mysqli_query($link, $cargiver_name1);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<td>" . $row['first_name'] . "</td>";
                        }
                    }
                    $appo_date = "SELECT doctorAppointment.appointment_date FROM doctorAppointment   WHERE doctorAppointment.patient_id = '$patient_id';";
                
                    $result = mysqli_query($link, $appo_date);
                    if (mysqli_num_rows($result) >0) {
                        while ($row = mysqli_fetch_array($result)) {
                            
                            $ans = $row['appointment_date'];
                       
                            if ($ans != $dailyCare_date) {
                                echo "<td>" ."X". "</td>";
                                echo $row['appointment_date'];

                            }else  {
                                echo "<td>" ."✓". "</td>";
                            }
                            
                        }
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
