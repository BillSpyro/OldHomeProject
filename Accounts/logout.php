<?
session_start();
session_unset();
session_destroy();

header("location:registerPage.php");
exit();
?>
