<?php
$link = mysqli_connect("localhost", "root", "","oldHome");

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$doctor_id = $_SESSION['id'];
if ($_GET['id']){
$_SESSION['patient_id'] = $_GET['id'];
$patient_id = $_SESSION['patient_id'];
}
if ($_GET['date']){
$_SESSION['appointment_date'] = $_GET['date'];
$appointment_date = $_SESSION['appointment_date'];
}

$sql = "SELECT a.*, r.*, d.* FROM accounts a, roles r, doctorAppointment d WHERE a.role_id = r.role_id and r.role_name = 'patient' and a.id = d.patient_id and a.id = '$patient_id' and d.doctor_id = '$doctor_id' and appointment_date <= '$appointment_date'";

$now = date("Y-m-d");
$dateArray = array();
$commentArray = array();
$morningMedArray = array();
$afternoonMedArray = array();
$nightMedArray = array();

if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            array_push($dateArray, $row['appointment_date']);
            array_push($commentArray, $row['comment']);
            array_push($morningMedArray, $row['morning_med']);
            array_push($afternoonMedArray, $row['afternoon_med']);
            array_push($nightMedArray, $row['night_med']);
        }
        mysqli_free_result($result);
    } else {
        $error = "No records matching your query were found.";
    }
} else {
    $error = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

if (isset($_POST['new_prescription']) ) {

  $comment = $_POST['comment'];
  $morning_med = $_POST['morning_med'];
  $afternoon_med = $_POST['afternoon_med'];
  $night_med = $_POST['night_med'];
  $date = date("Y-m-d");
  $patient_id = $_SESSION['patient_id'];
  $appointment_date = $_SESSION['appointment_date'];

  $sql = "UPDATE doctorAppointment SET comment = '$comment', morning_med = '$morning_med', afternoon_med = '$afternoon_med', night_med = '$night_med' WHERE appointment_date = '$date' and patient_id = '$patient_id' and doctor_id = '$doctor_id'";
  $result = mysqli_query($link, $sql);

  header("Location:patient_of_doctor_page.php?id=" . $patient_id . "&date=" . $appointment_date);

}






























?>
