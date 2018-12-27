<?php
/*
    Category Class implementation
*/

class Category {

    private $id, $name;
    public function __construct() {}
    public function __construct_1($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }
    
    public function getName() {return $this->name;}
    
    public function setName($name) {$this->name = $name;}

    public function getAllCategory($DBConn){
        $query = "SELECT * FROM categories";
        $data = $DBConn->query($query);
        return $data;
    }
}