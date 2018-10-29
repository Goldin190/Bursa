<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<?php
require "../classes.php";

$baza = new db;

$baza->connection("bursa");
$baza->select_first();
$baza->close_connection();
?>    
</body>
</html>
