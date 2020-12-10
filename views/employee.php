<?php
if ($_SESSION['access_level'] >= 4){

  $link = mysqli_connect("localhost", "root", "","oldHome");

  // Check connection
  if ($link === false) {
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }

//Selects all employees and displays them
$sql = "SELECT a.*, r.*, e.* FROM accounts a, roles r, employees e WHERE r.role_id = a.role_id and r.access_level >= 2 and a.id = e.employee_id";

$idArray = array();
$nameArray = array();
$roleArray = array();
$salaryArray = array();

if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            array_push($idArray, $row['id']);
            array_push($nameArray, $row['first_name']);
            array_push($roleArray, $row['role_name']);
            array_push($salaryArray, $row['salary']);
        }
        mysqli_free_result($result);
    } else {
        $error = "No records matching your query were found.";
    }
} else {
    $error = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

//Displays all employees if you selected Search All
if (isset($_POST['searchall'])) {
  $sql = "SELECT a.*, r.*, e.* FROM accounts a, roles r, employees e WHERE r.role_id = a.role_id and r.access_level >= 2 and a.id = e.employee_id";

  $idArray = array();
  $nameArray = array();
  $roleArray = array();
  $salaryArray = array();

  if ($result = mysqli_query($link, $sql)) {
      if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_array($result)) {
              array_push($idArray, $row['id']);
              array_push($nameArray, $row['first_name']);
              array_push($roleArray, $row['role_name']);
              array_push($salaryArray, $row['salary']);
          }
          mysqli_free_result($result);
      } else {
          $error = "No records matching your query were found.";
      }
  } else {
      $error = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
  }
}


//Displays only certain employees when searched
if (isset($_POST['search'])) {
$id = $_POST['id'];
$name = $_POST['name'];
$role = $_POST['role'];
$salary = $_POST['salary'];

$sqlbase = "SELECT a.*, r.*, e.* FROM accounts a, roles r, employees e WHERE r.role_id = a.role_id and r.access_level >= 2 and a.id = e.employee_id";
if (empty($id)){
  $sqlid = " and a.id LIKE '$id%'";
} else {
  $sqlid = " and a.id = '$id'";
}
if (empty($name)){
  $sqlname = " and a.first_name LIKE '$name%'";
} else {
  $sqlname = " and a.first_name = '$name'";
}
if (empty($role)){
  $sqlrole = " and r.role_name LIKE '$role%'";
} else {
  $sqlrole = " and r.role_name = '$role'";
}
if (empty($salary)){
  $sqlsalary = " and e.salary LIKE '$salary%'";
} else {
  $sqlsalary = " and e.salary = '$salary'";
}

$sql = $sqlbase . $sqlid . $sqlname . $sqlrole . $sqlsalary;

$idArray = array();
$nameArray = array();
$roleArray = array();
$salaryArray = array();

if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            array_push($idArray, $row['id']);
            array_push($nameArray, $row['first_name']);
            array_push($roleArray, $row['role_name']);
            array_push($salaryArray, $row['salary']);
        }
        mysqli_free_result($result);
    } else {
        $error = "No records matching your query were found.";
    }
} else {
    $error = "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}

//Only admin can update an employees salary
if ($_SESSION['access_level'] >= 5){
if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $salary = $_POST['salary'];
  $sql = "UPDATE employees SET salary = '$salary' WHERE employee_id = '$id'";
  $res = mysqli_query($link, $sql);
  header("location:employeePage.php");
}
}

// Close connection
mysqli_close($link);
} else {
  header("location:../Accounts/accountPage.php");
}
?>
