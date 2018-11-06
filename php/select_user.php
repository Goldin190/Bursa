<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<?php
require "../php/classes.php";
session_start();
$id =  $_SESSION['id'];
$baza = new db;

$baza->connection("bursa");
$baza->select_user($id);
$baza->close_connection();
?>    
</body>
</html>