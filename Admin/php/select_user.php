<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<?php
require "admin_class.php";
session_start();
$id =  $_SESSION['id'];
$baza = new admin_db;

$baza->connection("bursa");
$baza->select_user($id);
$baza->close_connection();
?>    
</body>
</html>