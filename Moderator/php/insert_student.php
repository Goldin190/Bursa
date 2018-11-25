<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
require "mod_class.php";
require "../../php/src.php";
$baza = new mod_db;

$baza->connection("bursa");
$baza->insert_student($_POST["imie"],$_POST["nazwisko"],$_POST["grupa"],$_POST["room"],$_POST["PESEL_student"],$_POST["tel_stud"],$_POST["data_ur"],$_POST["miasto"],$_POST["int"],$_POST["trud"],$_POST["szkola"],$_POST["adress_ucz"],$_POST["choroby"]);
header($mod_src);
    $baza->close_connection();

    ?>    

</body>
</html>
