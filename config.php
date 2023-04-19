<?php
$con = mysqli_connect('localhost','root','','ebook');
if(!$con){
    echo "Connection Failed";
}

session_start();
?>