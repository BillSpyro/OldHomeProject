<? include "approval.php" ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Approval Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../script/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
include "../Includes/header.php";
?>
<form class="approval" action="approval.php" method="post">
<table>
  <tr>
    <th>Name</th>
    <th>Role</th>
    <th>Yes</th>
    <th>No</th>
  </tr>
<?php foreach ($nameArray as $name):
      foreach ($roleArray as $role):?>
  <tr>
    <td><?php echo $name; ?></td>
    <td><?php echo $role; ?></td>
    <td><input type="radio" id="yes" name=<?php echo $name; ?> value="yes"></td>
    <td><input type="radio" id="no" name=<?php echo $name; ?> value="no"></td>
  </tr>
<?php endforeach ?>
<?php endforeach ?>
</table>
</form>

<?php
include "../Includes/footer.php";
?>
</body>
</html>
