<?php
if ($_SESSION['access_level'] >= 4){

$link = mysqli_connect("localhost", "root", "","oldHome");

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Search for patient
if (isset($_POST['additional_Patient_info_search'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM accounts WHERE id='$id'";

    $_SESSION['p_id'] = $id;

    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)){
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
  }
}else{
    $first_name = "error";
    $last_name = " incorrect ID";
}

}

// Escape user inputs for security
if (isset($_POST['additional_Patient_info'])) {
    $group = $_POST["group"];
    $admission_date = $_POST["admission_date"];
    $p_id = $_SESSION['p_id'];
// Set patient to a group
$sql = "UPDATE patients SET `patient_group` = '$group', `admission_date` = '$admission_date' WHERE patient_id = $p_id";
$result = mysqli_query($link, $sql);
if (mysqli_query($link, $sql)) {
    echo "Records added successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);

}
mysqli_close($link);
} else {
  header("location:accountPage.php");
}
?>
