
<?php
 //   session_start();
    $conn = new mysqli('localhost','root','','crocodileshop');
    $conn->set_charset("utf8");
    if($conn->connect_errno){
        die("Connect Database Failed". $conn->connect_error);
    }
?>