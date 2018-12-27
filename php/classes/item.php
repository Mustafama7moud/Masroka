<?php
/*
    Item Class implementation
*/
class Item {

    private $id, $name, $category, $desc, $photo, $founder, $vQuestion;
    public function __construct(){}
    public function __construct_1($id, $name, $category, $desc, $photo, $founder, $vQuestion) {
        $this->id = $id;
        $this->name = $name;
        $this->category = $category;
        $this->desc = $desc;
        $this->photo = $photo;
        $this->founder = $founder;
        $this->vQuestion = $vQuestion;
    }
    
    public function getID() {return $this->id;}
    public function getName() {return $this->name;}
    public function getCategory() {return $this->category;}
    public function getDesc() {return $this->desc;}
    
    public function setName($name) {$this->name = $name;}
    public function setCategory($category) {$this->category = $category;}
    public function setDesc($desc) {$this->desc = $desc;}
    
    public function postItem($name, $category, $desc, $photo, $founder, $vQuestion, $qAnswer, $DBConn){
        $add_item_query = "INSERT INTO items ( itemName, itemCategory, itemDesc, itemPhoto, itemFounder, verifyQuestion, qAnswer) "
                . "VALUES('$name', '$category', '$desc', '$photo', '$founder', '$vQuestion', '$qAnswer');";
        try {
            $DBConn->query($add_item_query);
            return TRUE;
        }catch (Exception $e) {
            return FALSE;
        }

    }
    
    public function getAllItem($DBConn){
        $query = "SELECT * FROM items ORDER BY postDate DESC";
        $data = $DBConn->query($query);
        return $data;
    }
    public function getAllUserItem($username, $DBConn){
        $query = "SELECT * FROM items WHERE itemFounder='$username' ORDER BY postDate DESC";
        $data = $DBConn->query($query);
        return $data;
    }
    public function getItemByID($id, $DBConn){
        $query = "SELECT * FROM items, users WHERE itemFounder=username AND itemID='$id'";
        $data = $DBConn->query($query);
        return $data;
    }
    
}