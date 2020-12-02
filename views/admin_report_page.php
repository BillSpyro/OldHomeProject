
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Report</title>
    <link href="../script/style.css" rel="stylesheet" type="text/css" />

</head>
<body>
<?php
include "../Includes/header.php";

?>
<div class="report">
<div class="admin-report">


<h1>Admin Report</h1>


<form  action="admin_report_page.php" method="post">

    <P>
    <label for="date">Date:</label>


    <input type="date" name="date" value="<?php $now = date("Y-m-d"); echo $now ?>">
    </P>
    <input class="save" name="miss_activity_search" type="submit" value="search">

</form>


</div>
<div class="report--result">
    <h1>Missed activity result</h1>


<?php
    include "admin_report.php";

?>
</div>
</div>
<?php
include "../Includes/footer.php";
?>
