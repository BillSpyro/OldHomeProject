<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="styles.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form action="../mainPage.php" method="post">
    <p>
        <label for="emailAddress">Email Address:</label>
        <input type="email" name="email" id="emailAddress">
    </p>
    <p>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
    </p>
    <input type="submit" value="Ok">
    <input type="reset" value="Cancel">
</form>
</body>
</html>
