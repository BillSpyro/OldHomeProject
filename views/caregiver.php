<?php
if ($_SESSION['access_level'] == 2){

  $link = mysqli_connect("localhost", "root", "","oldHome");

  // Check connection
  if ($link === false) {
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }

$date = date("Y-m-d");
$patient_group = $_SESSION['patient_group'];
$sql = "SELECT c.id AS caregiverID, c.first_name AS caregiverFirstName, c.patient_group AS caregiverGroup, cr.role_id AS caregiverRole, p.id AS patientID, p.first_name AS patientFirstName, p.patient_group AS patientGroup, pr.role_id AS patientRole, r.roster_date FROM accounts c, accounts p, roles cr, roles pr, roster r WHERE p.role_id = pr.role_id and pr.access_level = 1 and c.role_id = cr.role_id and cr.access_level = 2 and c.patient_group = p.patient_group and c.patient_group = $patient_group and c.id = r.employee_id and r.roster_date = '$date'";

//SELECT c.id AS caregiverID, c.first_name AS caregiverFirstName, c.patient_group AS caregiverGroup, cr.role_id AS caregiverRole, p.id AS patientID, p.first_name AS patientFirstName, p.patient_group AS patientGroup, pr.role_id AS patientRole, r.roster_date FROM accounts c, accounts p, roles cr, roles pr, roster r WHERE p.role_id = pr.role_id and pr.access_level = 1 and c.role_id = cr.role_id and cr.access_level = 2 and c.patient_group = p.patient_group and c.patient_group = 1 and c.id = r.employee_id and r.roster_date = '2020-11-05'

//SELECT c.id AS caregiverID, c.first_name AS caregiverFirstName, c.patient_group AS caregiverGroup, cr.role_id AS caregiverRole, p.id AS patientID, p.first_name AS patientFirstName, p.patient_group AS patientGroup, pr.role_id AS patientRole FROM accounts c, accounts p, roles cr, roles pr WHERE p.role_id = pr.role_id and pr.access_level = 1 and c.role_id = cr.role_id and cr.access_level = 2 and c.patient_group = p.patient_group and c.patient_group = 1

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
}


if (isset($_POST['caregiver'])) {

  $list = $_POST['list'];

  echo "You chose the following: <br>";
  if(!empty($list)){
  foreach ($list as $name){
    echo $name . "<br />";
    $checkArray = explode('-', $name);
    $keys = array_keys($checkArray);
    foreach(array_keys($keys) as $value){
       $current_key = current($keys);
       $current_value = $checkArray[$current_key];

       $next_key = next($keys);
       $next_value = $checkArray[$next_key] ?? null;
       echo  "{$value}: current = ({$current_key} => {$current_value}); next = ({$next_key} => {$next_value})\n";

       if (is_numeric($current_value)){
         $first_name = $next_value;

       }




  }
}
}
}








// Close connection
mysqli_close($link);
} else {
  header("location:accountPage.php");
}

?>
