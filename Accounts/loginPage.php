<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../script/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<h1>LOG IN HERE </h1>
<div>
<form action="login.php" method="post">
    <p>
        <label for="emailAddress">Email Address:</label>
        <input type="email" name="email" id="emailAddress">
    </p>
    <p>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
    </p>
    <input class="save" type="submit" value="Ok">
    <input class="cancel" type="reset" value="Cancel">
</form>
</div>
<?php
include "../Includes/footer.php";
?>

