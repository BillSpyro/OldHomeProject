<?php

$link = mysqli_connect("localhost", "root", "","oldHome");

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if (isset($_POST['drAppointment_search'])) {
    $patient_id = $_POST['patient_id'];
    $sql= "SELECT a.*, r.*, p.* FROM accounts a, roles r, patients p WHERE a.role_id = r.role_id and  r.role_name = 'patient' and p.patient_id = a.id and patient_id = $patient_id";

    $_SESSION['patient_id'] = $patient_id;

    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)){

            $patient_id = $row['patient_id'];
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
    }
}
else {
    $first_name = "error";
    $last_name = " incorrect ID";
    }
}
if (isset($_POST['drAppointment_search'])) {
    $roster_date = $_POST['roster_date'];
    $_SESSION['roster_date'] = $roster_date;
    $sql = "SELECT a.*, roles.*, roster.* FROM accounts a, roles, roster WHERE a.role_id = roles.role_id and roles.role_id = 3 and a.id = roster.employee_id and roster.roster_date = '$roster_date';";
    $doctorResult = mysqli_query($link,$sql);
}


if (isset($_POST['doctorAppointment'])) {
    $patient_id = $_POST["patient_id"];
    $doctor = $_POST["doctor"];
    $roster_date = $_POST["roster_date"];
    $sql = "SELECT * FROM doctorAppointment WHERE patient_id = '$patient_id' and appointment_date = '$roster_date';";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "ERROR: the patient has been already appointed for that day";
    }else {
        $sql = "INSERT INTO doctorAppointment (patient_id, doctor_id, appointment_date) VALUES ('$patient_id', '$doctor', '$roster_date')";
        if (mysqli_query($link, $sql)) {
            echo "Records added successfully.";
        } else {

        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }

}
// Close connection
mysqli_close($link);
?>
