<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../script/style.css" rel="stylesheet" type="text/css" />

    <title>Document</title>
</head>
<body>
<!-- include header page -->
<?php

include "../Includes/header.php";
?>
<!-- welcome page, login, and register link -->
<h1>Hi Welcome to Home Page!</h1>  
   <div class="home-log">
       <p>Have an account? Log in.</p>
        <li><a href="../Accounts/loginPage.php">Log In</a></li>
        <p>Don't have an account? register.</p>
        <li><a href="../Accounts/registerPage.php">Register</a></li>
</div>
<!-- include footer page -->
<?php
include "../Includes/footer.php"
?>
