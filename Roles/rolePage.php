<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Role</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../script/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
include "../Includes/header.php";
include "role.php";
?>
<table>
  <tr>
    <th>Role</th>
    <th>Access Level</th>
  </tr>
  <?php for($i=0, $count = count($roleArray);$i<$count;$i++):
   $role_name  = $roleArray[$i];
   $access_level = $accessLevelArray[$i];
        ?>
  <tr>
    <td><?php echo $role_name; ?></td>
    <td><?php echo $access_level; ?></td>
  </tr>
<?php endfor ?>
</table>
<form class="role" action="rolePage.php" method="post">
<p>
    <label for="newrole">New Role:</label>
    <input type="text" name="new_role" id="newrole" required>
</p>
<?php if (isset($role_error)): ?>
  <span><?php echo $role_error; ?></span>
<?php endif ?>
<p>
    <label for="accesslevel">Access Level:</label>
    <input type="text" name="access_level" id="accesslevel" required>
</p>
<input class="save" name="role" type="submit" value="Ok">
<input class="cancel" type="reset" value="Cancel">
</form>

<?php
include "../Includes/footer.php";
?>
</body>
</html>
