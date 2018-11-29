<?php
   class mod_db{
    private $servername;
    private $username_server;
    private $password_Server;
    private $conn;
    private $db_name;
    
    
    public function connection($name){
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->db_name = $name;
        // Create connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password,$this->db_name);
        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    
    public function close_connection(){
        //End connection
        $this->conn->close(); 
        
    }
    
    public function select_user($id){
        $sql = "SELECT imie,nazwisko FROM users 
                WHERE ID LIKE $id ";
        $result = $this->conn->query($sql);
    if(@$result->num_rows > 0){
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            echo $row['imie'] . " " . $row['nazwisko'] . "<br/>";
        }
    }else{
        echo "error 001";
    }
        
    }
       
       
    public function select_students(){
        $sql = "SELECT uczniowie.ID,imie,nazwisko,grupa.nazwa FROM uczniowie INNER JOIN grupa ON uczniowie.ID_grupy = grupa.ID ORDER BY nazwisko asc ";
        $result = $this->conn->query($sql);
    if(@$result->num_rows > 0){
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            echo "<tr> " . "<td>" . $row["imie"] . "</td>". "<td>" . $row["nazwisko"] . "</td>" . "<td>" . $row["nazwa"] . "</td>" . "<td><button type='button' class='btn btn-students btn-info' onclick=\"student_show(".$row["ID"].")\" id=" . $row["ID"] . ">Otwórz</button><button id=" . $row["ID"] ." class='btn btn-students-del btn-danger'>Usuń</button></td>" . "</tr>";
        }
    }else{
        echo "error 002";
    }
        
    }
    
    public function select_groups(){
        $sql = "SELECT grupa.ID,nazwa,users.imie,users.nazwisko,COUNT(uczniowie.ID) as liczba FROM grupa INNER JOIN uczniowie ON uczniowie.ID_grupy = grupa.ID INNER JOIN users ON users.id_grupy = grupa.ID GROUP BY nazwa";
        $result = $this->conn->query($sql);
    if(@$result->num_rows > 0){
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            echo "<tr> " . "<td>" . $row["nazwa"] . "</td>" . "<td>" . $row["imie"] . " " . $row["nazwisko"] . "</td>" . "<td>" . $row["liczba"] . "</td>" . "<td><button id=" . $row["ID"] . " class='btn btn-gruops btn-info'>Pokaż</button><button id=" . $row["ID"] . " class='btn btn-groups-edit btn-success'>Edytuj</button><button id=" . $row["ID"] . " class='btn btn-groups-del btn-danger'>Usuń</button></td>" . "</tr>";
        }
    }else{
        echo "error 003";
    }
    }   
       
    public function get_id($username){
        $sql="SELECT ID FROM users
            WHERE login LIKE '$username'";
        $result = $this->conn->query($sql);
        if(@$result->num_rows > 0){
            while($row = $result->fetch_array(MYSQLI_ASSOC)){
                return $row["ID"];
            }
        }
    }
    
    public function login($username,$passwd){
        $sql = "SELECT typ_konta FROM users
                WHERE login LIKE '$username' AND haslo LIKE '$passwd'";
        $result = $this->conn->query($sql);
        if(@$result->num_rows > 0){
            while($row = $result->fetch_array(MYSQLI_ASSOC)){
                return $row["typ_konta"];
            }
        }else{
            return -1;
        }
    }
    public function groups_to_select(){
        $sql = "SELECT nazwa FROM grupa";
        $result = $this->conn->query($sql);
        echo "<option></option>";
        if(@$result->num_rows > 0){
            while($row = $result->fetch_array(MYSQLI_ASSOC)){
                echo "<option>" . $row["nazwa"] . "</option>";
            }
        }else{
            echo "<script> console.log(\"Error 108  \") <script>";
        }
    }
    public function insert_student($imie,$nazwisko,$grupa,$pokoj,$pesel,$numer,$data_ur,$miasto,$int,$trud,$szkola,$adres,$choroby){
        switch($grupa){
            case "a1":{
                $grupa = 3;
                break;
            }
            case "b1":{
                $grupa = 4;
                break;
            }
            case "c1":{
                $grupa = 5;
                break;
            }
        }        
        $sql="INSERT INTO `uczniowie`(`Imie`, `Nazwisko`, `PESEL`, `data_urodzenia`, `miejsce_urodzenia`, `szkola`, `adres`, `nr_telefonu`, `choroby`, `ID_grupy`,`nr_pokoju`,`zainteresowania`,`trudnosci`) VALUES ('$imie','$nazwisko','$pesel','$data_ur','$miasto','$szkola','$adres','$numer','$choroby',$grupa,$pokoj,'$int','$trud')";
        
        if($this->conn->query($sql)=== TRUE){
            echo "git_gud";
        }else{
        echo "shieeeeet";
        }
    }
    public function get_last_stud_id(){
        $sql = "SELECT MAX(ID) as ID FROM `uczniowie`";
        $result = $this->conn->query($sql);
        if(@$result->num_rows > 0){
             while($row = $result->fetch_array(MYSQLI_ASSOC)){
             return $row["ID"];
             }
        }else{
        
        }
        
    }
    public function insert_parent($stud_id,$name,$ndname,$adres,$tel,$sytuacja){
        $sql = "INSERT INTO `rodzice`(`Imie`, `Nazwisko`, `adres`, `nr_telefonu`, `sytuacja_materialna`, `ID_ucznia`) VALUES ('$name','$ndname','$adres',$tel,'$sytuacja',$stud_id)";
        
        if($this->conn->query($sql)=== TRUE){
            echo"elooszki";
        }else{
            echo"pozdro bez xDDD";
        return false;
            
        }
    }
       
    public function insert_sbiling($imie,$nazwisko,$zajecie,$plec,$stud_id){
        $sql="INSERT INTO `rodzenstwo`(`imie`, `nazwisko`, `zajecie`, `plec`, `uczen_id`) VALUES ('$imie','$nazwisko','$zajecie','$plec',$stud_id)";
        if($this->conn->query($sql)=== TRUE){
            echo "git_gud";
        }else{
        echo "shieeeeet";
        }
    }
       public function get_stud_info($id){
           //0-11
           $sql = "SELECT `imie`,`nazwisko`,`PESEL`,`adres`,`data_urodzenia`,`miejsce_urodzenia`,`szkola`,`nr_telefonu`,`choroby` FROM uczniowie WHERE ID LIKE $id";
           $result = $this->conn->query($sql);
           if(@$result->num_rows >0){
               while($row = $result->fetch_array(MYSQLI_ASSOC)){
                   $info[] = $row["imie"];
                   $info[] = $row["nazwisko"];
                   $info[] = $row["PESEL"];
                   $info[] = $row["adres"];
                   $info[] = $row["data_urodzenia"];
                   $info[] = $row["miejsce_urodzenia"];
                   $info[] = $row["szkola"];
                   $info[] = $row["nr_telefonu"];
                   $info[] = $row["choroby"];
               }
           }else{
               echo "shieeeet";
           }
           $sql = "SELECT imie,nazwisko,nr_telefonu FROM rodzice WHERE id_ucznia LIKE $id";
           
           $result = $this->conn->query($sql);
           
           if(@$result->num_rows >0){
               while($row = $result->fetch_array(MYSQLI_ASSOC)){
               $info[] = $row["imie"];
               $info[] = $row["nazwisko"];
               $info[] = $row["nr_telefonu"];
               }
           }else{
               for($i = 0;$i<6;$i++){
                   $info[] = "brak";
               }
           }
           echo '<ul class="list-group info" id="collapse_in_table"><li class="list-group-item list-group-item-dark"><span id="name">Imie nazwisko : '.$info[0].'  </span><span id="nd_name"> '.$info[1].'</span></li><li class="list-group-item list-group-item-secondary"><span id="school"> Szkoła : '.$info[6].'</span></li><li class="list-group-item list-group-item-dark"><span id="adres">Adress : '.$info[3].'</span></li><li class="list-group-item list-group-item-secondary"><span id="parents_names"><span id="mother_name">Dane rodziców : '.$info[9].'</span> <span id="mother_nd_name">'.$info[10].'</span> <span id="father_name">'.$info[12].'</span> <span id="father_nd_name">'.$info[13].'</span></span></li><li class="list-group-item list-group-item-dark"><div class="card bg-dark"><div class="card-header"><a class="collapsed card-link text-info" data-toggle="collapse" href="#alergens">Nietolerancje ucznia</a></div><div id="alergens" class=" collapse" data-parent="#collapse_in_table"><div class="card-body"><ul class="list-group alergens"><li class="list-group-item list-group-item-dark"><span id="al1">'.$info[8].'</span></li></ul></div></div></div></li><li class="list-group-item list-group-item-secondary"><div class="card bg-dark"><div class="card-header"><a class="collapsed card-link text-info" data-toggle="collapse" href="#contact">Dane kontaktowe</a></div><div id="contact" class=" collapse" data-parent="#collapse_in_table"><div class="card-body"><ul class="list-group contact"><li class="list-group-item list-group-item-dark"><span id="student_tel">Uczeń : '.$info[7].'</span></li><li class="list-group-item list-group-item-secondary"><span id="father_tel">Ojciec : '.$info[14].'</span></li><li class="list-group-item list-group-item-dark"><span id="mother_tel">Matka : '.$info[11].'</span></li></ul></div></div></div></li></ul>';
       
                    }
       public function update_student($id,$imie,$nazwisko,$grupa,$pokoj,$pesel,$numer,$data_ur,$miasto,$int,$trud,$szkola,$adres,$choroby){
           $sql = "UPDATE uczniowie SET ";
           switch($grupa){
            case "a1":{
                $grupa = 3;
                break;
            }
            case "b1":{
                $grupa = 4;
                break;
            }
            case "c1":{
                $grupa = 5;
                break;
            }
           } 
           if($imie != ""){
               $sql = $sql + "Imie = "+$imie+",";
           }if($nazwisko != ""){
               $sql = $sql + "Nazwisko = "+$nazwisko+",";
           }if($grupa != ""){
               $sql = $sql + "ID_grupy = "+$grupa+",";
           }if($pokoj != ""){
               $sql = $sql + "nr_pokoju = "+$pokoj+",";
           }if($pesel != ""){
               $sql = $sql + "PESEL = "+$pesel+",";
           }if($numer != ""){
               $sql = $sql + "nr_telefonu = "+$numer+",";
           }if($data_ur != ""){
               $sql = $sql + "data_urodzenia = "+$data_ur+",";
           }if($miasto != ""){
               $sql = $sql + "miejsce_urodzenia = "+$miasto+",";
           }if($int != ""){
               $sql = $sql + "zainteresowania = "+$int+",";
           }if($trud != ""){
               $sql = $sql + "trudnosci = "+$trud+",";
           }if($szkola != ""){
               $sql = $sql + "szkola = "+$szkola+",";
           }if($adres != ""){
               $sql = $sql + "adres = "+$adres+",";
           }if($choroby != ""){
               $sql = $sql + "choroby = "+$choroby+",";
           }
           substr($sql, 0, -1);
           $sql = $sql + "WHERE ID LIKE $id";
           if($this->conn->query($sql)=== TRUE){
            echo "git_gud";
        }else{
        echo "shieeeeet";
        }
           
       }
       public function update_parent($stud_id,$name,$ndname,$adres,$tel,$sytuacja){
       $sql = "UPDATE rodzice SET";
           if($imie != ""){
               $sql = $sql + "Imie = "+$imie+",";
           }if($ndname != ""){
               $sql = $sql + "Nazwisko = "+$ndname+",";
           }if($adres != ""){
               $sql = $sql + "adres = "+$adres+",";
           }if($tel != ""){
               $sql = $sql + "nr_telefonu  = "+$tel+",";
           }if($sytuacja != ""){
               $sql = $sql + "sytuacja_materialna = "+$sytuacja+",";
           }
        substr($sql, 0, -1);
        $sql = $sql + "WHERE id_ucznia LIKE $id";
        if($this->conn->query($sql)=== TRUE){
            echo "git_gud";
        }else{
            echo "shieeeeet";
        }
       
       }
}
?>