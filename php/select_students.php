<!DOCTYPE html>
<html lang="pl">
<head>
</head>
<body>
<?php
require "../php/classes.php";

$baza = new db;

$baza->connection("bursa");
$baza->select_students();
$baza->close_connection();
?>    
</body>
</html>