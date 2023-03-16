<?php
    $answerno = $_GET["answerno"];
    $a_answer = $_POST["a_answer"];
    $a_name = $_POST["a_name"];
    $link = mysqli_connect("localhost","root");
    mysqli_set_charset($link,'utf8');
    mysqli_query($link,"Use comweb");
    $sql = "Select * From answer Where aquestionno = $answerno;";
    $count = 1;
    $result = mysqli_query($link,$sql);
    while ($dbarr = mysqli_fetch_array($result))
    {
        $count++;
    }
    $sql = "Insert Into answer " . 
            "Values ($answerno, $count , '$a_answer', '$a_name');";
    $result = mysqli_query($link,$sql);
    if($result)
    {
        $sql = "Update question Set qCount = qCount + 1 " .
               "Where qno = $answerno;";
        $result = mysqli_query($link,$sql);
        echo "คำตอบถูกบันทึกลงสู่ฐานข้อมูลแล้ว<br><br>";
        echo "<a href=show_detail.php?item=$answerno>" .
             "กลับไปยังกระทู้</a><br>";
        echo "<a href=show_question.php>หน้าหลักของเว็บบอร์ด</a>";
    }
    else
    {
        echo "ไม่สามารถบันทึกคำตอบลงสู่ฐานข้อมูลได้";
    }
    mysqli_close($link);
?>