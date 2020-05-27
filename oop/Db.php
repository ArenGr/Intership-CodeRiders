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

    //insert without foreach
    /* public function insert($table, $data){ */
    /*     $keys = implode(',', array_keys($data)); */
    /*     $values = array_values($data); */
    /*     $cleanArray = []; */
    /*     foreach( $values as $val ) */
    /*             $cleanArray[] = $this->real_escape_string($val); */
    /*     $cleanArray = implode("',' ", $cleanArray); */
    /*     $keys = $this->real_escape_string($keys); */
    /*     $sql_insert = "INSERT INTO $table ($keys) VALUES ('$cleanArray')"; */
    /*     $res = $this->query($sql_insert); */
    /*     if ($res) { */
    /*         return true; */
    /*     } else { */
    /*         echo("Error description: " . $this->error); */
    /*     } */
    /* } */

    //insert with foreach
    public function insert($table, $data) {
        $colum = "";
        $val = "";
        foreach ($data as $key => $value) {
            $colum .= $this->real_escape_string($key).', '; 
            $val .= "'".$this->real_escape_string($value)."'".', ';
        }
        $colum = substr ($colum, 0, -2);
        $val = substr ($val, 0, -2);
        $sql_insert = "INSERT INTO $table ($colum) VALUES ($val)";
        $res = $this->query($sql_insert);
        if ($res) {
            $result = true;
        } else {
            echo("Error description: " . $this->error);
        }
    }

    public function update($table, $data, $where){
        $colum = "";
        $val = "";
        foreach ($data as $key => $value) {
            $val .= $this->real_escape_string($key).'='."'".$this->real_escape_string($value)."'".', ';
        }
        $val = substr ($val, 0, -2);
        $sql_update = "UPDATE $table SET $val WHERE " ."$where";
        if ($this->query($sql_update)) {
            return true;
        }else {
            echo("Error description: " . $this->error);
        }

    }

    public function delete($table, $where){
        if ($where){
            $sql_delete = "DELETE FROM $table WHERE " ."$where";
        }else{
            $sql_delete = "DELETE FROM $table"; 
        }
        if ($this->query($sql_delete)) {
            return true;
        }else {
            echo("Error description: " . $this->error);
        }
    }
}

$db = new Db();

$insert_data = [
    "name" => "Jack",
    "age" => "50",
    "country" => "AMERICA",
    "city" => "Erevan"
];

//insert
/* $insert = $db->insert("customers", $insert_data);  //return boolean */

//select
/* $select = $db->select("SELECT * from customers"); */

//delete with condition
/* $delete=$db->delete('customers', 'name= '); */

//delete all
$delete=$db->delete('customers', '');

//update($table, $name, $age)// return boolean
/* $update = $db->update('customers', $insert_data, 'age=11'); */
