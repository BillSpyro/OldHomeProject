<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Account Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../script/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
include "../Includes/header.php";
?>
<!--Greets the logged in user-->
    <h1>hello <?php
    echo $_SESSION["first_name"] . " " . $_SESSION["last_name"] ; ?></h1>

    <?php if ($_SESSION['access_level'] >= 4): ?>
    <ul class="admin">
      <li><a href="../Accounts/approvalPage.php">Registration Approval</a></li>
      <li><a href="../Accounts/additional_Patient_infoPage.php">Additional Patient Info</a></li>
      <?php endif ?>
      <?php if ($_SESSION['access_level'] >= 5): ?>
      <li><a href="../Roles/rolePage.php">Roles</a></li>

      <?php endif ?>
      <?php if ($_SESSION['access_level'] >=2): ?>
        <ul>
        <li><a href="../views/patient_of_doctorsView.php">PatientInformation</a></li>
      </ul>
        <?php endif ?>
    </ul>

    <h2>
      Your Info
    </h2>
<div class="yourInfo">
    <?php
    echo "<table border='1px black solid'>";
    echo "<tr>";
    echo "<th>id</th>";
    echo "<th>role id</th>";
    echo "<th>access level</th>";
    echo "<th>first name</th>";
    echo "<th>last name</th>";
    echo "<th>email</th>";
    echo "<th>password</th>";
    echo "<th>phone</th>";
    echo "<th>dateOfBirth</th>";
    echo "<th>family code</th>";
    echo "<th>emergency contact</th>";
    echo "<th>relation emergency</th>";
    echo "<th>group</th>";
    echo "<th>admission date</th>";
    echo "<th>salary</th>";

    echo "</tr>";
    echo "<tr>";
    echo "<td>" . $_SESSION['id']  . "</td>";
    echo "<td>" . $_SESSION['role_id'] . "</td>";
    echo "<td>" . $_SESSION['access_level'] . "</td>";
    echo "<td>" . $_SESSION['first_name'] . "</td>";
    echo "<td>" . $_SESSION['last_name'] . "</td>";
    echo "<td>" . $_SESSION['email'] . "</td>";
    echo "<td>" . $_SESSION['password'] . "</td>";
    echo "<td>" . $_SESSION['phone']  . "</td>";
    echo "<td>" . $_SESSION['dathOfBirth']  . "</td>";
    echo "<td>" . $_SESSION['family_code'] . "</td>";
    echo "<td>" . $_SESSION['emergency_contact'] . "</td>";
    echo "<td>" . $_SESSION['relation_emergency'] . "</td>";
    echo "<td>" . $_SESSION['group']  . "</td>";
    echo "<td>" . $_SESSION['admission_date'] . "</td>";
    echo "<td>" . $_SESSION['salary']. "</td>";
    echo "</tr>";
    echo "</table>";

    // echo "id: " . $_SESSION['id'] . "<br>";
    // echo "role id: " .$_SESSION['role_id'] . "<br>";
    // echo "access level: " .$_SESSION['access_level'] . "<br>";
    // echo "first name: " .$_SESSION['first_name'] . "<br>";
    // echo "last name: " .$_SESSION['last_name'] . "<br>";
    // echo "email: " .$_SESSION['email'] . "<br>";
    // echo "password: " .$_SESSION['password'] . "<br>";
    // echo "phone: " .$_SESSION['phone'] . "<br>";
    // echo "dateOfBirth: " .$_SESSION['dathOfBirth'] . "<br>";
    // echo "family code: " .$_SESSION['family_code'] . "<br>";
    // echo "emergency contact: " .$_SESSION['emergency_contact'] . "<br>";
    // echo "relation emergency: " .$_SESSION['relation_emergency'] . "<br>";
    // echo "group: " .$_SESSION['group'] . "<br>";
    // echo "admission date: " .$_SESSION['admission_date'] . "<br>";
    // echo "salary: " .$_SESSION['salary'] . "<br>";
    // "</div>";
    ?>
</div>
    <?php
    include "../Includes/footer.php";
    ?>
</body>
</html>
