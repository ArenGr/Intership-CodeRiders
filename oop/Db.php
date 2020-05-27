<?php
class Db extends mysqli{
    public function __construct() {
        parent::__construct('localhost', 'admin_30', 'areN_1990', 'oop');

        if($this->connect_errno){
            echo $this->connect_error;
            exit;
        }
    }

    public function select($query){
        $query = $this->real_escape_string($query);
        $result = $this->query($query);
        $rows = [];
        if ($result) {
            while($row = mysqli_fetch_assoc($result))
            {
                $rows[] = $row;
            }
        }else {
            echo("Error description: " . $this->error);
        }
        return $rows;
    }

    public function insert($table, $data){
        $colum = "";
        $val = "";
        foreach ($data as $key => $value) {
            $colum .= $key.', '; 
            $val .= "'".$value."'".', ';
        }
        $colum = substr ($colum, 0, -2);
        $val = substr ($val, 0, -2);
        $table = $this->real_escape_string($table);
        $sql_insert = "INSERT INTO $table ($colum) VALUES ($val)";
        $res = $this->query($sql_insert);
        if ($res===TRUE) {
            $result = true;
        } else {
            echo("Error description: " . $this->error);
            $result = false;
        }
        return $result;
    }

    public function update($table, $data, $where){
        $colum = "";
        $val = "";
        foreach ($data as $key => $value) {
            $val .= $key.'='."'".$value."'".', ';
        }
        $val = substr ($val, 0, -2);
        $sql_update = "UPDATE $table SET $val WHERE " ."$where";
        if ($this->query($sql_update)) {
            return true;
        }else {
            echo("Error description: " . $this->error);
            return false;
        }

    }

    public function delete($table, $where){
        $sql_delete = "DELETE FROM $table WHERE " ."$where";
        if ($this->query($sql_delete)) {
            return true;
        }else {
            echo("Error description: " . $this->error);
            return false;
        }
    }
}

$db = new Db();

$insert_data = [
    "name" => "Jack",
    "age" => "50",
    "country" => "Armenia",
    "city" => "Erevan"
];
//insert
/* $insert = $db->insert("customers", $insert_data);  //return boolean */

//select
/* $select = $db->select("SELECT * from customers"); */

//delete
/* $delete=$db->delete('customers', 'name="Jack"'); */

//update($table, $name, $age)// return boolean
/* $update = $db->update('customers', $insert_data, 'age=23'); */




