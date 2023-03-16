<?php
    $topic = $_POST["topic"];
    $detail = $_POST["detail"];
    $name = $_POST["name"];
    $link = mysqli_connect("localhost","root");
    mysqli_set_charset($link,'utf8');
    $sql = "Use comweb";
    $result = mysqli_query($link,$sql);
    $sql = "Select * From question;";
    $count = 0;
    $result = mysqli_query($link,$sql);
    while ($dbarr = mysqli_fetch_array($result))
    {
        $count++;
    }
    $itemno = $count + 1;
    $sql = "Insert into question Values($itemno, '$topic',
            '$detail','$name',0);";
    $result = mysqli_query($link,$sql);
    if($result)
    {
        echo "<script>alert('เพิ่มคำถามเข้าสู่ฐานระบบแล้ว');</script>";
        echo "<script>window.location='form_question.php';</script>";
        mysqli_close($link);
    }
    else
    {
        echo "ไม่สามารถเพิ่มกระทู้ใหม่ลงในฐานข้อมูลได้<p></p>";
    }
    echo "<a href=show_question.php>แสดงกระทู้ทั้งหมด</a><br>";
    echo "<a href=form_question.php>กลับสู่หน้าฟอร์มตั้งกระทู้ใหม่</a><br>";
?>