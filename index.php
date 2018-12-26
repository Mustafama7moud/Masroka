<?php
/*
    First Page Opended By Server
 */
session_start();
if(isset($_SESSION['user'])){
    header("location: php/");
}else{
    header("location: php/land.php");
}