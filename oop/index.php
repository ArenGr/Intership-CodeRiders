<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'admin_30');
define('DB_PASSWORD', 'areN_1990');
define('DB_NAME', 'oop');

$conn = new Mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($conn->connect_errno){
    echo $conn->connect_error;
    exit;
}
$conn->close();

class Connection extends mysqli{
    public $conn;
    public function __construct($host, $user, $pass, $db) {
        parent::__construct($host, $user, $pass, $db);
        $this->conn = new mysqli('localhost', 'admin_30', 'areN_1990', 'oop');

        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
    }
}

class Db extends Connection{

    function __construct(){
        parent::__construct('localhost', 'admin_30', 'areN_1990', 'oop');
    }

    public function select($query){
        $query = $this->conn->real_escape_string($query);
        $result = $this->conn->query($query);
        $rows = [];
        if ($result) {
            while($row = mysqli_fetch_assoc($result))
            {
                $rows[] = $row;
            }
        }else {
            echo("Error description: " . mysqli_error($this->conn));
        }
        return $rows;
    }

    public function insert($table, $data){
        $table = $this->conn->real_escape_string($table);
        $data_keys = array_keys($data);
        $data_values = array_values($data);
        $key1 = $this->conn->real_escape_string($data_keys[0]);
        $value1 = $this->conn->real_escape_string($data_values[0]);
        $key2 = $this->conn->real_escape_string($data_keys[1]);
        $value2 = $this->conn->real_escape_string($data_values[1]);
        $sql_insert = "INSERT INTO $table ($key1, $key2) VALUES ('$value1', '$value2')";
        $res = $this->conn->query($sql_insert);
        if ($res===TRUE) {
            $result = true;
        } else {
            echo("Error description: " . mysqli_error($this->conn));
            $result = false;
        }
        return $result;
    }

    public function update($table, $name, $age){
        $sql_update = "UPDATE $table SET age='$age' WHERE name='$name'";
        if ($this->conn->query($sql_update)) {
            return true;
        }else {
            echo("Error description: " . mysqli_error($this->conn));
            return false;
        }

    }

    public function delete($table, $name){
        $sql_delete = "DELETE FROM $table WHERE name = '$name'";
        if ($this->conn->query($sql_delete)) {
            return true;
        }else {
            echo("Error description: " . mysqli_error($this->conn));
            return false;
        }
    }
}

$db = new Db();

$insert_data = [ 
 "name" => "Jack", 
 "age" => "12" 
]; 

/* $insert = $db->insert("customers", $insert_data);  //return boolean */

//select
/* $select = $db->select("SELECT * from customers"); */

//delete
/* $delete=$db->delete('customers', 'Jack'); */

//update($table, $name, $age)// return boolean
/* $update = $db->update('customers', 'Jack', '30'); */




