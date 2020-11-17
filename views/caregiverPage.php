<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Caregiver Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../script/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
include "../Includes/header.php";
include "caregiver.php";
?>
<h1>List of Patients Today</h1>
<div class="caregiver-page">

<form class="" action="caregiverPage.php" method="post">
<table class="">
  <tr>
    <th><h2>Patients</h2></th>
  </tr>
  <tr class="column">
    <th>Name</th>
    <th>Morning Medicine</th>
    <th>Afternoon Medicine</th>
    <th>Night Medicine</th>
    <th>Breakfast</th>
    <th>Lunch</th>
    <th>Dinner</th>
  </tr>
<?php for($i=0, $count = count($idArray);$i<$count;$i++):
 $id = $idArray[$i];
 $name  = $nameArray[$i];
      ?>
  <tr class="cell">
    <td><?php echo $name; ?></td>
    <td><input type="checkbox" id="morningMed" name="list[]" value=<?php echo $id . "-morningMed"; ?>></td>
    <td><input type="checkbox" id="afternoonMed" name="list[]" value="<?php echo $id . "-afternoonMed"; ?>"></td>
    <td><input type="checkbox" id="nightMed" name="list[]" value="<?php echo $id . "-nightMed"; ?>"></td>
    <td><input type="checkbox" id="breakfast" name="list[]" value="<?php echo $id . "-breakfast"; ?>"></td>
    <td><input type="checkbox" id="lunch" name="list[]" value="<?php echo $id . "-lunch"; ?>"></td>
    <td><input type="checkbox" id="dinner" name="list[]" value="<?php echo $id . "-dinner"; ?>"></td>
  </tr>
<?php endfor ?>
</table>

<div class="">
<input class="save" name="caregiver" type="submit" value="Ok">
<input class="cancel" type="reset" value="Cancel">
</form>
</div>
</div>
<?php
include "../Includes/footer.php";
?>

</body>
</html>
