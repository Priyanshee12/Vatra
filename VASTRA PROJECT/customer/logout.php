<?php session_start();
session_destroy();
header("location:../visitor/search.php");
exit();
 ?>
