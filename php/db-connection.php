<?php 
/*
    Main Database Connection
 */
$DBConn = new mysqli('localhost', 'root', '123456', 'masroka') or die(mysqli_error($DBConn));