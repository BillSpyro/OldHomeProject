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
    
    include "../Includes/header.php";
?>
    <h1>schedule</h1>
    <form action="rosterPage.php" method="post">
        <label for="date"></label>
        <input type="date" name="roster_date" id="roster_date" require>
        <input class="save" type="submit" name="search_roster" id="date" value="Get">
    </form>
    <div class="schedul-result">

    <?php
    
    include "roster.php";
    ?>
    </div>
    <?php
    
    include "../Includes/footer.php";
?>
</body>
</html>