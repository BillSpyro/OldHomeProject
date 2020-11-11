<?php
if ($_SESSION['access_level'] >= 4){

  $link = mysqli_connect("localhost", "root", "","oldHome");

  // Check connection
  if ($link === false) {
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }

$sql = "SELECT q.*, r.* FROM queue q, roles r WHERE r.role_id = q.role_id";

$nameArray = array();
$roleArray = array();

if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            array_push($nameArray, $row['first_name']);
            array_push($roleArray, $row['role_name']);
        }
        mysqli_free_result($result);
    } else {
        $error = "No records matching your query were found.";
    }
} else {
    $error = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


//Runs operation when Ok is selected
if (isset($_POST['approve'])) {
$list = $_POST['list'];

  if(!empty($list)){
    foreach($list as $name){
         $approveArray = explode('-', $name);
         $keys = array_keys($approveArray);
         foreach(array_keys($keys) as $value){
            $current_key = current($keys);
            $current_value = $approveArray[$current_key];

            $next_key = next($keys);
            $next_value = $approveArray[$next_key] ?? null;
            //echo  "{$value}: current = ({$current_key} => {$current_value}); next = ({$next_key} => {$next_value})\n";

            if ($current_value == "Yes"){
              $first_name = $next_value;
              $sql = "SELECT * FROM queue WHERE first_name='$first_name'";
              $res = mysqli_query($link, $sql);

              if (mysqli_query($link, $sql)) {
              while ($row = mysqli_fetch_array($res)){
                $role_id = $row['role_id'];
                $last_name = $row['last_name'];
                $email = $row['email'];
                $password = $row['password'];
                $phone = $row['phone'];
                $dateOfBirth = $row['dateOfBirth'];
                $family_code = $row['family_code'];
                $emergency_contact = $row['emergency_contact'];
                $relation_emergency = $row['relation_emergency'];
              }
              $sql = "DELETE FROM queue WHERE first_name = '$first_name'";
              $res = mysqli_query($link, $sql);
              $sql = "INSERT INTO accounts (role_id, first_name, last_name, email, password, phone, dateOfBirth, family_code, emergency_contact, relation_emergency) VALUES ('$role_id', '$first_name', '$last_name', '$email', '$password', '$phone', '$dateOfBirth', '$family_code', '$emergency_contact', '$relation_emergency')";
              $res = mysqli_query($link, $sql);
              //echo "Added successfully";
            }else {
              echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

            }
       } elseif ($current_value == "No"){
         $first_name = $next_value;
         $sql = "DELETE FROM queue WHERE first_name='$first_name'";
         $res = mysqli_query($link, $sql);
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
