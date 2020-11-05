<? include "register.php" ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="styles.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
include "../Includes/header.php";
?>
<form action="registerPage.php" method="post">
<p>
  <label for="role">Role:</label>
    <select name="role" id="role">
      <option value="patient">patient</option>
      <option value="caregiver">caregiver</option>
    </select>
  </p>
    <p>
        <label for="firstName">First Name:</label>
        <input type="text" name="first_name" id="firstName">
    </p>
    <p>
        <label for="lastName">Last Name:</label>
        <input type="text" name="last_name" id="lastName">
    </p>
    <p>
        <div <?php if (isset($email_error)): ?> class="form_error" <?php endif ?> >
          <label for="emailAddress">Email Address:</label>
          <input type="email" name="email" id="emailAddress">
          <?php if (isset($email_error)): ?>
            <span><?php echo $email_error; ?></span>
          <?php endif ?>
        </div>
    </p>
    <p>
        <label for="Phone">Phone:</label>
        <input type="text" name="phone" id="phone">
    </p>
    <p>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
    </p>
    <p>
        <label for="dateOfBirth">Date of Birth:</label>
        <input type="date" name="dateOfBirth" id="dateOfBirth">
    </p>
    <input type="submit" name="register" value="Ok">
    <input type="reset" value="Cancel">
</form>
<?php
include "../Includes/footer.php";
?>
