<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../script/style.css" rel="stylesheet" type="text/css" />

</head>

<body class="registePage">
<!-- include header page -->
<?php
include "../Includes/header.php";
include "register.php";
?>
<!-- basic registeration form  -->
<div class="register-page">
<h1>Register</h1>

<form class="register" action="registerPage.php" method="post">

  <div class="group1">
  <p>
  <label for="role">Role:</label>
      <select name="role" id="role">
        <?php  while ($row = mysqli_fetch_array($result)): ?>
      <option value=<? echo $row['role_name']; ?>><? echo $row['role_name']; ?></option>
        <? endwhile ?>
      </select>
  </p>
    <p>
        <label for="firstName">First Name:</label>
        <input type="text" name="first_name" id="firstName" required>
    </p>
    <p>
        <label for="lastName">Last Name:</label>
        <input type="text" name="last_name" id="lastName" required>
    </p>

        <div <?php if (isset($email_error)): ?> class="form_error" <?php endif ?> >
          <label for="emailAddress">Email Address:</label>
          <input type="email" name="email" id="emailAddress" required>
          <!--Checks if there is a duplicate email in the DB-->
          <?php if (isset($email_error)): ?>
            <span><?php echo $email_error; ?></span>
          <?php endif ?>
        </div>

  </div>
<div class="group1">
<p>
        <label for="Phone">Phone:</label>
        <input type="text" name="phone" id="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
        <small>Format: 000-000-0000</small>
    </p>
    <p>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
    </p>
    <p>
        <label for="dateOfBirth">Date of Birth:</label>
        <input type="date" name="dateOfBirth" id="dateOfBirth" required>
    </p>
    <input class="save" name="register" type="submit" value="Ok">
    <input class="cancel" type="reset" value="Cancel">
</div>


</form>
</div>
<!-- include footer page -->
<?php
include "../Includes/footer.php";
?>
