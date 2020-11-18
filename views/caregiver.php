<?php
if ($_SESSION['access_level'] == 2){

  $link = mysqli_connect("localhost", "root", "","oldHome");

  // Check connection
  if ($link === false) {
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }

$id = $_SESSION['id'];
$date = date("Y-m-d");
$sql = "SELECT a.*, roster.* FROM accounts a, roster WHERE a.id = $id and a.id = roster.employee_id";
$res = mysqli_query($link, $sql);

if (mysqli_query($link, $sql)) {
while ($row = mysqli_fetch_array($res)){
  $patient_group  = $row['patient_group'];
}
$sql = "SELECT c.id AS caregiverID, c.first_name AS caregiverFirstName, r.patient_group AS caregiverGroup, cr.role_id AS caregiverRole, p.id AS patientID, p.first_name AS patientFirstName, pa.patient_group AS patientGroup, pr.role_id AS patientRole, r.roster_date FROM accounts c, accounts p, roles cr, roles pr, roster r, patients pa WHERE p.role_id = pr.role_id and pr.access_level = 1 and c.role_id = cr.role_id and cr.access_level = 2 and c.id = r.employee_id and p.id = pa.patient_id and r.patient_group = pa.patient_group and r.patient_group = $patient_group and c.id = r.employee_id and r.roster_date = '$date'";

$idArray = array();
$nameArray = array();

if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            array_push($idArray, $row['patientID']);
            array_push($nameArray, $row['patientFirstName']);
        }
        mysqli_free_result($result);
    } else {
        $error = "No records matching your query were found.";
    }
} else {
    $error = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}}


if (isset($_POST['caregiver'])) {
  $list = $_POST['list'];

  $checkID = 0;

  echo "You chose the following: <br>";
  if(!empty($list)){
  foreach ($list as $name){
    $checkArray = explode('-', $name);
    $keys = array_keys($checkArray);
    foreach(array_keys($keys) as $value){
       $current_key = current($keys);
       $current_value = $checkArray[$current_key];

       $next_key = next($keys);
       $next_value = $checkArray[$next_key] ?? null;

       if (is_numeric($current_value)){
         $activity = $next_value;
         if ($current_value != $checkID){
           if ($checkID != 0){
           $sql = "INSERT INTO dailyCare (patient_id, dailyCare_date, breakfast, lunch, dinner, morning_med, afternoon_med, night_med) VALUES ('$checkID', '$date', '$breakfast', '$lunch', '$dinner', '$morning_med', '$afternoon_med', '$night_med')";
           $res = mysqli_query($link, $sql);
          }
           $breakfast = 0;
           $lunch = 0;
           $dinner = 0;
           $morning_med = 0;
           $afternoon_med = 0;
           $night_med = 0;
           $checkID = $current_value;
         }

         if ($activity == "breakfast"){
           $breakfast = 1;
         }
         if ($activity == "lunch"){
           $lunch = 1;
         }
         if ($activity == "dinner"){
           $dinner = 1;
         }
         if ($activity == "morningMed"){
           $morning_med = 1;
         }
         if ($activity == "afternoonMed"){
           $afternoon_med = 1;
         }
         if ($activity == "nightMed"){
           $night_med = 1;
         }
    }
   }
  }
  $sql = "INSERT INTO dailyCare (patient_id, dailyCare_date, breakfast, lunch, dinner, morning_med, afternoon_med, night_med) VALUES ('$checkID', '$date', '$breakfast', '$lunch', '$dinner', '$morning_med', '$afternoon_med', '$night_med')";
  $res = mysqli_query($link, $sql);
 }
}

// Close connection
mysqli_close($link);
} else {
  header("location:accountPage.php");
}

?>
