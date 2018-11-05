<!DOCTYPE html>
<html lang="pl">
<head>
</head>
<body>
<?php
require "../classes.php";

$baza = new db;

$baza->connection("bursa");
$baza->select_students();
$baza->close_connection();
?>    
</body>
</html>