<?php
session_start();
$host = "localhost";
$user = "root";
$password = "";
$dbname = "comweb";

$con = mysqli_connect($host,$user,$password,$dbname);
if(!$con){
    die("connection failed : ".mysqli_connect_error());
}

mysqli_set_charset($con,'utf8');