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
        die();
        
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
            echo "<tr> " . "<td>" . $row["imie"] . "</td>". "<td>" . $row["nazwisko"] . "</td>" . "<td>" . $row["nazwa"] . "</td>" . "<td><button type='button' class='btn btn-students btn-info' id=" . $row["ID"] . ">Otwórz</button><button id=" . $row["ID"] ." class='btn btn-students-del btn-danger'>Usuń</button></td>" . "</tr>";
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
        
        if(@$result->num_rows > 0){
            while($row = $result->fetch_array(MYSQLI_ASSOC)){
                echo "<option>" . $row["nazwa"] . "</option>";
            }
        }else{
            echo "<script> console.log(\"Error 108  \") <script>";
        }
    }
}
?>