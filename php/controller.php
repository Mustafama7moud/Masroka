<?php
/*
    Main Controller
*/
session_start();

require_once './db-connection.php';
require_once './classes/item.php';
require_once './classes/user.php';


if(isset($_GET['f'])){
    unset($_SESSION['login-user']);
    header('location: ../land.php');
}

if(isset($_POST['user-login'])){
    $login_user = new User();
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($login_user->Login($username, $password, $DBConn)){
        $_SESSION['login-user'] = $login_user->getName();
        header("location: index.php");
    }else{
        header("location: signin.php");
    }
}

if(isset($_POST['user-signup'])){
    $reg_user = new User();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    if($reg_user->Register($username, $password, $email, $mobile, $DBConn)){
        header("location: signin.php");
    }else{
        header("location: signup.php");
    }
}

if(isset($_POST['post-item'])){
    $target_dir = "../img/";
    $target_file = $target_dir . basename($_FILES["itemPhoto"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if ($uploadOk == 0) {
        header("location: post-item.php");
    } else {
        if (move_uploaded_file($_FILES["itemPhoto"]["tmp_name"], $target_file)) {
            
        } else {
            header("location: post-item.php");
        }
    }
    $item = new Item();
    $name = $_POST['itemName'];
    $category = $_POST['itemCategory'];
    $desc = $_POST['itemDesc'];
    $photo = $target_file;
    $founder = $_SESSION['login-user'];
    $vQuestion = $_POST['itemQuestion'];
    $qAnswer = strtolower($_POST['itemQuestionAnswer']);
    $item->postItem($name, $category, $desc, $photo, $founder, $vQuestion, $qAnswer, $DBConn);
    header("location: index.php");
}