<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Employees</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../script/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
include "../Includes/header.php";
include "employee.php";
?>
<form class="employeeSearch" action="employeePage.php" method="post">
<table>
  <tr>
    <th><input type="id" name="id" id="id"></th>
    <th><input type="name" name="name" id="name"></th>
    <th><input type="role" name="role" id="role"></th>
    <th><input type="salary" name="salary" id="salary"></th>
  </tr>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Role</th>
    <th>Salary</th>
  </tr>
<?php for($i=0, $count = count($idArray);$i<$count;$i++):
 $id = $idArray[$i];
 $name  = $nameArray[$i];
 $role = $roleArray[$i];
 $salary = $salaryArray[$i];
      ?>
  <tr>
    <td><?php echo $id; ?></td>
    <td><?php echo $name; ?></td>
    <td><?php echo $role; ?></td>
    <td><?php echo $salary; ?></td>
  </tr>
<?php endfor ?>
</table>
<input class="save" name="search" type="submit" value="Search">
<input class="cancel" type="reset" value="Cancel">
</form>

<form class="employeeSearch" action="employeePage.php" method="post">
<p>
  <label for="id">Emp ID:</label>
  <input type="number" name="id" id="id" required>
</p>
<p>
  <label for="salary">New Salary:</label>
  <input type="number" name="salary" id="salary" required>
</p>
<input class="save" name="update" type="submit" value="Ok">
<input class="cancel" type="reset" value="Cancel">
</form>

<?php
include "../Includes/footer.php";
?>
</body>
</html>
