<!DOCTYPE html>
<html lang="pl">
<head>
</head>
<body>
<?php
require "mod_class.php";

$baza = new mod_db;

$baza->connection("bursa");
$baza->select_students();
$baza->close_connection();
?>    
</body>
</html>