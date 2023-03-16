<?php
include "db_connect.php";
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$name = $_POST['name'];
$picture = "Avatar/account.jpg";
$sql = "select username from members where username = '$username';";
$result = mysqli_query($con,$sql);
$row = mysqli_num_rows($result);

if($row>0){
    $_SESSION['already'] = 'username นี้มีอยู่ในระบบแล้ว';
    echo "<script>window.location='register.php';</script>";
}
else{
    $_SESSION['regis'] = 'สมัครสมาชิกสำเร็จ';
    $sql = "insert into members values ('$username','$password','$email','$name','$picture');";
    $result = mysqli_query($con,$sql);
    mysqli_close($con);
    echo "<script>window.location='register.php';</script>";
}