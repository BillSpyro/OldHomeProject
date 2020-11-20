<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Patient of Doctor</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../script/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
include "../Includes/header.php";
include "patient_of_doctor.php";
?>
<h1>Patient Prescriptions</h1>
<div class="prescription-page">

<table class="prescription-table">
  <tr class="column">
    <th>Date</th>
    <th>Comment</th>
    <th>Morning Med</th>
    <th>Afternoon Med</th>
    <th>Night Med</th>
  </tr>
  <?php for($i=0, $count = count($dateArray);$i<$count;$i++):
   $date = $dateArray[$i];
   $comment  = $commentArray[$i];
   $morning_med = $morningMedArray[$i];
   $afternoon_med = $afternoonMedArray[$i];
   $night_med = $nightMedArray[$i];
        ?>
  <tr class="cell">
    <td><?php echo $date; ?></td>
    <td><?php echo $comment; ?></td>
    <td><?php echo $morning_med; ?></td>
    <td><?php echo $afternoon_med; ?></td>
    <td><?php echo $night_med; ?></td>
  </tr>
<?php endfor ?>
</table>
<!-- show up this form if the day today -->
<?php  echo $date;?>
<?php  if ($date == $now):?>
 
<h2>New Prescription</h2>

<form class="new_prescription" action="patient_of_doctor_page.php" method="post">
  <table class="prescription-table">
    <tr class="column">
      <th>Comment</th>
      <th>Morning Med</th>
      <th>Afternoon Med</th>
      <th>Night Med</th>
    </tr>
    <tr class="cell">
      <th><input type="text" name="comment" id="comment" placeholder="Comment"></th>
      <th><input type="text" name="morning_med" id="morning_med" placeholder="Morning Med"></th>
      <th><input type="text" name="afternoon_med" id="afternoon_med" placeholder="Afternoon Med"></th>
      <th><input type="text" name="night_med" id="night_med" placeholder="Night Med"></th>
    </tr>
  </table>
  <input class="save" name="new_prescription" type="submit" value="Ok">
  <input class="cancel" type="reset" value="Cancel">
</form>
  <?php endif ?>

</div>
<?php
include "../Includes/footer.php";
?>

</body>
</html>
