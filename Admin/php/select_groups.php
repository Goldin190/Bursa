<!DOCTYPE html>
<html lang="pl">
<head>
</head>
<body>
<?php
require "admin_class.php";

$baza = new admin_db;

$baza->connection("bursa");
$baza->select_groups();
$baza->close_connection();
?>    
</body>
</html>