<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<?php
require "mod_class.php";
session_start();
$id =  $_SESSION['id'];
$baza = new mod_db;

$baza->connection("bursa");
$baza->select_user($id);
$baza->close_connection();
?>    
</body>
</html>