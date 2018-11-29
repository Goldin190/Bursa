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
$last_id = $baza->get_last_stud_id();
    
$baza->insert_parent($last_id,$_POST["m_name"],$_POST["m_ndname"],$_POST["m_adres"],$_POST["m_tel"],$_POST["m_syt"]);
    
$baza->insert_parent($last_id,$_POST["f_name"],$_POST["f_ndname"],$_POST["f_adres"],$_POST["f_tel"],$_POST["f_syt"]);

    $imie = "";
    $nazwisko = "";
    $plec = "";
    $wiek = "";
    $zajencie = "";
    $i = 0;
    do{
         $i++;
        $imie = "imie".$i;
        $nazwisko = "nazwisko".$i;
        $plec = "plec".$i;
        $wiek = "wiek".$i;
        $zajencie = "job".$i;
        if(@$_POST[$imie]){
        $baza->insert_sbiling($_POST[$imie],$_POST[$nazwisko],$_POST[$zajencie],$_POST[$plec],$last_id);
        }
    }while(@$_POST[$imie]);    
header($mod_src);
$baza->close_connection();    


    


    ?>    

</body>
</html>
