

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../script/style.css" rel="stylesheet" type="text/css" />

</head>

<body>


<h1>Register Page</h1>
<div>
<form class="register" action="register.php" method="post">
  <div class="group1">
  <p>
  <label for="role">Role:</label>
    <select name="role" id="role">
      <option value="patient">patient</option>
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
        <label for="emailAddress">Email Address:</label>
        <input type="email" name="email" id="emailAddress">
    </p>
  </div>
<div class="group2">
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
    <input class="save" type="submit" value="Ok">
    <input class="cancel" type="reset" value="Cancel">
</div>
    
</form>
</div>
<?php
include "../Includes/footer.php";
?>
