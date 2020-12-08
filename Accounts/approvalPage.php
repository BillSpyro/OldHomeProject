

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Approval Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../script/style.css" rel="stylesheet" type="text/css" />
</head>

<body class="approvalPg">
<?php
include "../Includes/header.php";
include "approval.php";
?>
<div class="approval-page">
<form class="approval" action="approvalPage.php" method="post">
<h2 class="appr">New users that are not approved by admin yet</h2>

<table>
  <tr>
    <th>Name</th>
    <th>Role</th>
    <th>Yes</th>
    <th>No</th>
  </tr>
<?php for($i=0, $count = count($nameArray);$i<$count;$i++):
 $name  = $nameArray[$i];
 $role = $roleArray[$i];
      ?>
  <tr>
    <td><?php echo $name; ?></td>
    <td><?php echo $role; ?></td>
    <td><input type="radio" id="yes" name="list[<?php echo $name . "-" . $role ?>]" value="Yes-<?php echo $name . "-" . $role ?>"></td>
    <td><input type="radio" id="no" name="list[<?php echo $name . "-" . $role ?>]" value="No-<?php echo $name . "-" . $role ?>"></td>
  </tr>
<?php endfor ?>
</table>

<input class="save" name="approve" type="submit" value="Ok">
<input class="cancel" type="reset" value="Cancel">
</form>
</div>
<?php
include "../Includes/footer.php";
?>

