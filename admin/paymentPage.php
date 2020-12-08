
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link href="../script/style.css" rel="stylesheet" type="text/css" />

</head>
<body>
<?php
include "../Includes/header.php";
include "payment.php";
?>
<div class="Payment">

<h1>Payment</h1>


<form  class="payment-form" action="paymentPage.php" method="post">

   
    <label for="patient_id">Patient ID:</label>
    <input type="number" name="patient_id">
    
    
    <label for="totalDue">Total Due:</label>
    <input type="number" name="totalDue" value="<?php echo $amount_due ?>" readonly>
   
   
    <label for="newPayment">New Payment:</label>
    <input type="number" name="newPayment">
    
    <input class="save" name="Payment" type="submit" value="ok">
    <input class="cancel" type="reset" value="Cancel">
    
    <input class="save" name="update" type="submit" value="Update">
    

</form>

</div>
<?php
include "../Includes/footer.php";
?>
