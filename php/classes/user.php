<?php
/*
    User Class implementation
*/
class User {

    private $id, $name, $password, $email, $mobile, $regDate;
    
    public function __construct() {}
    public function __construct_1($user_array) {
        $this->id = $user_array['userID'];
        $this->name = $user_array['username'];
        $this->password = $user_array['password'];
        $this->email = $user_array['email'];
        $this->mobile = $user_array['mobile'];
        $this->regDate = $user_array['regDate'];
    }
    public function __construct_2($name, $password, $email, $mobile) {
        $this->id = '';
        $this->name = $name;
        $this->password = $password;
        $this->email = $email;
        $this->mobile = $mobile;
        $this->regDate = '';
    }

    public function getID() {return $this->id;}
    public function getName() {return $this->name;}
    public function getPassword() {return $this->password;}
    public function getEmail() {return $this->email;}
    public function getMobile() {return $this->mobile;}
    public function getRegDate() {return $this->regDate;}
    
    public function setName($name) {$this->name = $name;}
    public function setPassword($password) {$this->password = $password;}
    public function setEmail($email) {$this->email = $email;}
    public function setMobile($mobile) {$this->mobile = $mobile;}
    
    
    public function Login($username, $password, $DBConn){
        $user = $username;
        $pass = $password;
        $login_query = "SELECT * FROM users WHERE username='$user';";
        try {
            $result = $DBConn->query($login_query);
            if($result->num_rows > 0){
                $user = $result->fetch_assoc();
                if($pass === $user['password']){
                    $this->id = $user['user_id'];
                    $this->name = $user['username'];
                    $this->email = $user['email'];
                    $this->mobile = $user['mobile'];
                    $this->password = $user['password'];
                    $this->regDate = $user['regDate'];
                    return TRUE;
                }else{return FALSE;}
            }else{return FALSE;}
        }catch (Exception $e) {return FALSE;}
    }
    public function Register($username, $password, $email, $mobile, $DBConn){
        $add_user_query = "INSERT INTO users (username, password, email, mobile) "
                . "VALUES('$username', '$password', '$email', '$mobile');";

        try {
            $DBConn->query($add_user_query);
            return TRUE;
        }catch (Exception $e) {
            return FALSE;
        }
    }
    
}