<?php
include 'db_connect.php';
$name = $_POST['name'];
$sql = "SELECT * FROM members WHERE name = '$name'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
$count = mysqli_num_rows($result);
if ($count == 1){
    $_SESSION['name'] = $name;
    echo "<script>window.location='html/recoverypass.html';</script>";
}
else{
    echo "<script>alert('ชื่อของท่านไม่มีอยู่ในฐานระบบ');</script>";
    echo "<script>window.location='html/forgetpass.html';</script>";
}
?>