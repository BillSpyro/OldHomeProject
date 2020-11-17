<?php

$link = mysqli_connect("localhost", "root", "","oldHome");

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    if (isset($_POST['search_roster'])) {

        $roster_date = $_POST['roster_date'];

        $sql_base = "SELECT a.first_name, roles.*, roster.* FROM accounts a, roles, roster WHERE a.role_id = roles.role_id and a.id = roster.employee_id";
        $supervisor_name = "SELECT a.first_name, roles.* FROM accounts a, roles WHERE a.role_id = roles.role_id and role_name = 'Supervisor';";
        $doctor_name = "SELECT a.first_name, roles.* FROM accounts a, roles WHERE a.role_id = roles.role_id and role_name = 'Doctor';";
        $cargiver_name1 = "SELECT a.first_name, roles.* FROM accounts a, roles WHERE a.role_id = roles.role_id and role_name = 'Caregiver' and a.group = 1;";
        $cargiver_name2 = "SELECT a.first_name, roles.* FROM accounts a, roles WHERE a.role_id = roles.role_id and role_name = 'Caregiver' and a.group = 2;";
        $cargiver_name3 = "SELECT a.first_name, roles.* FROM accounts a, roles WHERE a.role_id = roles.role_id and role_name = 'Caregiver' and a.group = 3;";
        $cargiver_name4 = "SELECT a.first_name, roles.* FROM accounts a, roles WHERE a.role_id = roles.role_id and role_name = 'Caregiver' and a.group = 4;";
        if (empty($date)){
            $sql_date = " and roster.roster_date LIKE '$roster_date%'";
          }else {
            $sql_date = " and roster.roster_date = '$roster_date'";
          }

        $sql = $sql_base . $sql_date;
        //echo $sql;
        if ($result = mysqli_query($link, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                echo "<table>";
                echo "<tr>";
                echo "<th>Supervisor</th>";
                echo "<th>Doctor</th>";
                echo "<th>Caregiver1</th>";
                echo "<th>Caregiver2</th>";
                echo "<th>Caregiver3</th>";
                echo "<th>Caregiver4</th>";
                echo "</tr>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    $supervisor_name = "SELECT a.first_name, roles.*, roster.* FROM accounts a, roles, roster WHERE a.role_id = roles.role_id and role_name = 'Supervisor' and a.id = roster.employee_id and roster.roster_date = '$roster_date';";
                    $result = mysqli_query($link, $supervisor_name);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<td>" . $row['first_name'] . "</td>";
                        }
                    }
                    $doctor_name = "SELECT a.first_name, roles.*, roster.* FROM accounts a, roles, roster WHERE a.role_id = roles.role_id and role_name = 'Doctor' and a.id = roster.employee_id and roster.roster_date = '$roster_date';";
                    $result = mysqli_query($link, $doctor_name);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<td>" . $row['first_name'] . "</td>";
                        }
                    }
                    $cargiver_name1 = "SELECT a.first_name, roles.*, roster.* FROM accounts a, roles, roster WHERE a.role_id = roles.role_id and role_name = 'Caregiver' and a.id = roster.employee_id and roster.patient_group = 1 and roster.roster_date = '$roster_date';";
                    $result = mysqli_query($link, $cargiver_name1);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<td>" . $row['first_name'] . "</td>";
                        }
                    }
                    $cargiver_name2 = "SELECT a.first_name, roles.*, roster.* FROM accounts a, roles, roster WHERE a.role_id = roles.role_id and role_name = 'Caregiver' and a.id = roster.employee_id and roster.patient_group = 2 and roster.roster_date = '$roster_date';";
                    $result = mysqli_query($link, $cargiver_name2);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<td>" . $row['first_name'] . "</td>";
                        }
                    }
                    $cargiver_name3 = "SELECT a.first_name, roles.*, roster.* FROM accounts a, roles, roster WHERE a.role_id = roles.role_id and role_name = 'Caregiver' and a.id = roster.employee_id and roster.patient_group = 3 and roster.roster_date = '$roster_date';";
                    $result = mysqli_query($link, $cargiver_name3);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<td>" . $row['first_name'] . "</td>";
                        }
                    }
                    $cargiver_name4 = "SELECT a.first_name, roles.*, roster.* FROM accounts a, roles, roster WHERE a.role_id = roles.role_id and role_name = 'Caregiver' and a.id = roster.employee_id and roster.patient_group = 4 and roster.roster_date = '$roster_date';";
                    $result = mysqli_query($link, $cargiver_name4);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<td>" . $row['first_name'] . "</td>";
                        }
                    }

                    echo "</tr>";
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
