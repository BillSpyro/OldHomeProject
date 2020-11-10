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
    <li><a href="../Accounts/approvalPage.php">Registration Approval</a></li>
    <?php endif ?>
    <?php if ($_SESSION['access_level'] >= 5): ?>
    <li><a href="../Roles/rolePage.php">Roles</a></li>
    <?php endif ?>


    <h2>
      Your Info
    </h2>

    <?php
    echo "id: " . $_SESSION['id'] . "<br>";
    echo "role id: " .$_SESSION['role_id'] . "<br>";
    echo "access level: " .$_SESSION['access_level'] . "<br>";
    echo "first name: " .$_SESSION['first_name'] . "<br>";
    echo "last name: " .$_SESSION['last_name'] . "<br>";
    echo "email: " .$_SESSION['email'] . "<br>";
    echo "password: " .$_SESSION['password'] . "<br>";
    echo "phone: " .$_SESSION['phone'] . "<br>";
    echo "dateOfBirth: " .$_SESSION['dathOfBirth'] . "<br>";
    echo "family code: " .$_SESSION['family_code'] . "<br>";
    echo "emergency contact: " .$_SESSION['emergency_contact'] . "<br>";
    echo "relation emergency: " .$_SESSION['relation_emergency'] . "<br>";
    echo "group: " .$_SESSION['group'] . "<br>";
    echo "admission date: " .$_SESSION['admission_date'] . "<br>";
    echo "salary: " .$_SESSION['salary'] . "<br>";
    ?>

    <?php
    include "../Includes/footer.php";
    ?>
</body>
</html>
