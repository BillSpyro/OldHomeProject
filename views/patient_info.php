<?php

$link = mysqli_connect("localhost", "root", "","oldHome");

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if (isset($_POST['patient_info_search'])) {
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $emergency_contact = $_POST['emergency_contact'];
    $family_code = $_POST['family_code'];
    $admission_date = $_POST['admission_date'];
    $sql = "SELECT * FROM accounts WHERE id LIKE '$id%' and first_name LIKE '$first_name%' and dateOfBirth LIKE '$dateOfBirth%' and  emergency_contact LIKE '$emergency_contact%' and family_code LIKE '$family_code%' and  admission_date LIKE '$admission_date%'";

    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)){

            $id = $row['id'];
            $first_name = $row['first_name'];
            $dateOfBirth = $row['dateOfBirth'];
            $emergency_contact = $row['emergency_contact'];
            $family_code = $row['family_code'];
            $admission_date = $row['admission_date'];
  }
}else{
    echo "error";
}

}

?>