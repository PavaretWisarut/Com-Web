<?php
include 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายงานผลคะแนน</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="style.css" rel="stylesheet">
    <script type='text/javascript'src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
</head>
<body>
    <div class="container">
        <center><h2 style="margin-top: 2%;"><h2>เฉลยแบบทดสอบความรู้พื้นฐานทางด้านคอมพิวเตอร์</h2></center>
        <hr>
        <?php
        $sql = "SELECT * FROM examdata;";
        $result = mysqli_query($con,$sql);
        $sum = 0;
        $count = 0;
        while ($dbarr = mysqli_fetch_array($result))
        {
            $no = $dbarr['No'];
            $index =  "q$no";
            $ans = $dbarr['Answer'];
            if(empty($_POST[$index]))
            {
                echo "
                ข้อที่ $no. คุณไม่ได้ตอบ เฉลย คือ $ans <br>
                ";
                $_POST[$index] = "";
                $count++;
            }
            else
            {
                echo "ข้อที่ $no. ตอบ $_POST[$index] เฉลย คือ $ans<br>";
                $count++;
            }
            if($_POST[$index] == $ans)
            {
                $sum++;
            }
        }
        echo "<hr>";
        echo "<center><br><h3>สรุปคะแนนที่ได้ $sum/$count <b/></h3></center>";
        ?>
        <br>
        <center><a class="btn btn-primary" href="index.php" role="button" style="margin-bottom: 2%;">กลับสู่หน้าหลัก</a></center>
        <hr>
    </div>
</body>
</html>