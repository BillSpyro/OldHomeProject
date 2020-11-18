<?php

$link = mysqli_connect("localhost", "root", "","oldHome");

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    //Displays patients based on search
    if (isset($_POST['patient_info_search'])) {

        $id = $_POST['id'];
        $first_name = $_POST['first_name'];
        $dateOfBirth = $_POST['dateOfBirth'];
        $emergency_contact = $_POST['emergency_contact'];
        $family_code = $_POST['family_code'];
        $admission_date = $_POST['admission_date'];
        //$sql = "SELECT * FROM accounts WHERE id LIKE '$id%' and first_name LIKE '$first_name%' and dateOfBirth LIKE '$dateOfBirth%' and  emergency_contact LIKE '$emergency_contact%' and family_code LIKE '$family_code%';";
        $sql_base = "SELECT a.*, r.*, p.* FROM accounts a, roles r, patients p WHERE a.role_id = r.role_id and r.role_name = 'patient' and a.id = p.patient_id";
        if (empty($id)){
            $sql_id = " and a.id LIKE '$id%'";
          }else {
            $sql_id = " and a.id = '$id'";
          }
        if (empty($first_name)){
            $sql_firstName = " and a.first_name LIKE '$first_name%'";
          }else {
            $sql_firstName = " and a.first_name = '$first_name'";
          }
        if (empty($dateOfBirth)){
            $sql_Dateofbirth = " and a.dateOfBirth LIKE '$dateOfBirth%'";
          }else {
            $sql_Dateofbirth = " and a.dateOfBirth = '$dateOfBirth'";
          }
        if (empty($emergency_contact)){
            $sql_emergenceycon = " and p.emergency_contact LIKE '$emergency_contact%'";
          }else {
            $sql_emergenceycon = " and p.emergency_contact = '$emergency_contact'";
          }
        if (empty($family_code)){
            $sql_familyCode = " and p.family_code LIKE '$family_code%'";
          }else {
            $sql_familyCode = " and p.family_code = '$family_code'";
          }
        if (empty($admission_date)){
            $sql_admissionDate = " and p.admission_date LIKE '$admission_date%'";
          }else {
            $sql_admissionDate = " and p.admission_date = '$admission_date'";
          }

        $sql = $sql_base . $sql_id . $sql_firstName . $sql_Dateofbirth . $sql_emergenceycon .$sql_familyCode . $sql_admissionDate;
        //echo $sql;
        if ($result = mysqli_query($link, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                echo "<table>";
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
                    echo "<td>" . $row['patient_id']  . "</td>";
                    echo "<td>" . $row['first_name'] . " " . $row['last_name']. "</td>";
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
            }else{

                echo "Invalid Inpute";
            }
        }else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
        //Displays all patients
    }elseif(isset($_POST['showall']) || !isset($_POST['showall']) ) {
        $sql = "SELECT a.*, r.*, p.* FROM accounts a, roles r, patients p WHERE a.role_id = r.role_id and r.role_name = 'patient' and a.id = p.patient_id";
        $result = mysqli_query($link, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th>id</th>";
            echo "<th>Name</th>";
            echo "<th>Age</th>";
            echo "<th>Emergency Contact</th>";
            echo "<th>Emergency Contact Name</th>";
            echo "<th>Admission Date</th>";
            echo "</tr>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr background-color= '#4CAF50'>";
                echo "<td>" . $row['patient_id']  . "</td>";
                echo "<td>" . $row['first_name'] . " " . $row['last_name']. "</td>";
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
    }
?>
