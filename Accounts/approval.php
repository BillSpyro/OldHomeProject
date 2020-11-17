<?php
if ($_SESSION['access_level'] >= 4){

  $link = mysqli_connect("localhost", "root", "","oldHome");

  // Check connection
  if ($link === false) {
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }

$sql = "SELECT a.*, r.* FROM accounts a, roles r WHERE r.role_id = a.role_id and a.approved = FALSE";

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
              $sql = "SELECT * FROM accounts WHERE first_name='$first_name' and approved = FALSE";
              $res = mysqli_query($link, $sql);

              if (mysqli_query($link, $sql)) {
              while ($row = mysqli_fetch_array($res)){
                $email = $row['email'];
              }
              $sql = "UPDATE accounts SET approved = TRUE WHERE first_name = '$first_name' and email = '$email'";
              $res = mysqli_query($link, $sql);
            }else {
              echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

            }
       } elseif ($current_value == "No"){
         $first_name = $next_value;
         $sql = "SELECT * FROM accounts WHERE first_name='$first_name' and approved = FALSE";
         $res = mysqli_query($link, $sql);

         if (mysqli_query($link, $sql)) {
         while ($row = mysqli_fetch_array($res)){
           $email = $row['email'];
           $id = $row['id'];
         }
         $sql = "DELETE FROM accounts WHERE first_name='$first_name' and email = '$email'";
         $res = mysqli_query($link, $sql);
         $sql = "DELETE FROM patients WHERE patient_id = $id";
         $res = mysqli_query($link, $sql);
       }else {
         echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

       }
     }
    }
  }
}}

// Close connection
mysqli_close($link);
} else {
  header("location:accountPage.php");
}
?>
