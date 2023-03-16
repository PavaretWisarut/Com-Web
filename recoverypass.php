<?php
include 'db_connect.php';
$name = $_SESSION['name'];
$pass = $_POST['pass'];
$confirmpass = $_POST['confirmpass'];
if($pass == $confirmpass && !empty($pass) && !empty($confirmpass)){
    $sql = "UPDATE members SET password = '$confirmpass' WHERE name = '$name'";
    $result = mysqli_query($con,$sql);
    echo "<script>alert('เปลี่ยนรหัสผ่านของท่านเรียบร้อยแล้ว');</script>";
    echo "<script>window.location='index.php';</script>";
}
else{
    echo "<script>alert('รหัสผ่านของท่านไม่ตรงกัน');</script>";
    echo "<script>window.location='html/recoverypass.html';</script>";
}
?>