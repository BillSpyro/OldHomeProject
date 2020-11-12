<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../script/style.css" rel="stylesheet" type="text/css" />

    <title>Document</title>
</head>
<body>
<?php
    
    include "../includes/header.php";
?>
    <h1>schedule</h1>
    <form action="roster.php" method="post">
        <label for="date"></label>
        <input type="text" name="date" id="date" require>
        <input class="save" type="submit" name="date" id="date" value="Get">
    </form>
    <div class="schedul-result">

    <?php
    
    include "roster.php";
    ?>
    </div>
    <?php
    
    include "../includes/footer.php";
?>
</body>
</html>