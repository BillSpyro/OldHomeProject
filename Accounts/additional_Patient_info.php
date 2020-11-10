<?php 

$link = mysqli_connect("localhost", "root", "","demo");

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if (isset($_POST['additional_Patient_info_search'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM accounts WHERE id='$id'";

    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {


        while ($row = mysqli_fetch_array($result)){
        $first_name = $row['first_name'];
  }
}else{
    echo "error";
}
    
}

// Escape user inputs for security
if (isset($_POST['additional_Patient_infoPage'])) {
    $first_name = $_POST['first_name'];
    $Group = $_POST["Group"];
    $Addmission_Date = $_POST["Addmission_Date"];
    $sql_name = "SELECT first_name FROM accounts WHERE id='$id'";
// Attempt insert query execution
$sql = "INSERT INTO accounts (id, first_name, last_name, Group, Admission_date) VALUES ('$id','$first_name', '$Group', '$Admission_date')";
if (mysqli_query($link, $sql)) {
    echo "Records added successfully.";
    header("Location:additional_Patient_infoPage.php");
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);

}
?>