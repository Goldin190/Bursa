<?php
   class db{
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
                WHERE ID LIKE '$id' ";
        $result = $this->conn->query($sql);
    if(@$result->num_rows > 0){
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            echo $row['imie'] . " " . $row['nazwisko'] . "<br/>";
        }
    }else{
        echo "error XDD";
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
}
?>