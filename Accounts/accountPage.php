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

    <?php if ($_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'Supervisor'): ?>
    <li><a href="../Accounts/approvalPage.php">Registration Approval</a></li>
  <?php endif ?>

    <?php
    include "../Includes/footer.php";
    ?>
</body>
</html>
