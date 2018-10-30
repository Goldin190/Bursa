<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<?php
require "../classes.php";
$id = $_REQUEST["id"];

$baza = new db;

$baza->connection("bursa");
$baza->select_user($id);
$baza->close_connection();
?>    
</body>
</html>