<?php
include "db_connect.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "select * from members where username = '$username' and password = '$password'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
$count = mysqli_num_rows($result);

if($count == 1){
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['success'] = "Login สำเร็จ !!!";
    echo "<script>window.location='index.php';</script>";
}
else{
    $_SESSION['failed'] = "Login Fail !!!";
    echo"<script>window.location='index.php';</script>";
}

?>