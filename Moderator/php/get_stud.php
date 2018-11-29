    <?php
   require "mod_class.php";
    $id = $_REQUEST["id"];
$baza = new mod_db;
$baza->connection("bursa");
$baza->get_stud_info($id);
$baza->close_connection();
    ?>
