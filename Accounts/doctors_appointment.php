<?php

$link = mysqli_connect("localhost", "root", "","oldHome");

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// if (isset($_POST['drAppointment_search'])) {
//     $id = $_POST['id'];
//     $sql= "SELECT a.*, r.* FROM accounts a, roles r WHERE a.role_id = r.role_id and r.role_name = 'patient' and id = $id";

//     $_SESSION['id'] = $id;

//     $result = mysqli_query($link, $sql);
//     if (mysqli_num_rows($result) > 0) {
//         while ($row = mysqli_fetch_array($result)){
//         $first_name = $row['first_name'];
//         $last_name = $row['last_name'];
        
//     }
// }

// else {
//     $first_name = "error";
//     $last_name = " incorrect ID";
//     }
// }
if (isset($_POST['drAppointment_search'])) {
    $roster_date = $_POST['roster_date'];
    $_SESSION['roster_date'] = $roster_date;
    $sql = "SELECT a.*, r.*, roster.* FROM accounts a, roles r , roster WHERE a.role_id = r.role_id and r.role_name = 'Doctor' and roster_date = $roster_date";
    $doctorResult = mysqli_query($link,$sql);
}




// // Escape user inputs for security
// if (isset($_POST['additional_Patient_info'])) {
//     $group = $_POST["group"];
//     $admission_date = $_POST["admission_date"];
//     $p_id = $_SESSION['p_id'];
// // Attempt insert query execution
// $sql = "UPDATE accounts SET `patient_group` = '$group', `admission_date` = '$admission_date' WHERE id = $p_id";
// $result = mysqli_query($link, $sql);
// if (mysqli_query($link, $sql)) {
//     echo "Records added successfully.";
// } else {
//     echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
// }

// // Close connection
// mysqli_close($link);

// }

?>
