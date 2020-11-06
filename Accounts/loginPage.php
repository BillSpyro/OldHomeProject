<? include "login.php" ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../script/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <!-- include header page -->
<?php
include "../Includes/header.php";
?>
<!-- basic login form -->
<h1>LOG IN HERE </h1>
<div>
<form action="loginPage.php" method="post">
  <!--Displays error if the login fails-->
  <?php if (isset($error)): ?>
    <span><?php echo $error; ?></span>
  <?php endif ?>
    <p>
        <label for="emailAddress">Email Address:</label>
        <input type="email" name="email" id="emailAddress" required>
    </p>
    <p>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
    </p>
    <input class="save" name="login" type="submit" value="Ok">
    <input class="cancel" type="reset" value="Cancel">
</form>
</div>
<!-- include footer page -->
<?php
include "../Includes/footer.php";
?>
