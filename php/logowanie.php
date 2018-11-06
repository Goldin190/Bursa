<?php
require "classes.php";
require "src.php";
$data_base = new db;
session_start();
$data_base->connection("bursa");
$typ = $data_base->login($_POST["username"],$_POST["password"]);
$_SESSION['id'] = $data_base->get_id($_POST["username"]);

echo $_SESSION['id'];
echo $_POST["username"];
echo $_POST["password"];
switch($typ){
    case 0:{
        header($admin_src);
        break;
    }
    case 1:{
        header($mod_src);
        break;
    }
    case 2:{
        header($user_src);
        break;
    }
}

$data_base->close_connection();

?>