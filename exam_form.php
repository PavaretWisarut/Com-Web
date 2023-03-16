<?php
include 'db_connect.php';
if(!isset($_SESSION['username'])){
    echo "<script>alert('! กรุณาเข้าสู่ระบบเพื่อทำการทดสอบ !');</script>";
    echo "<script>window.location='index.php';</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ฟอร์มข้อสอบออนไลน์</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="style.css" rel="stylesheet">
    <script type='text/javascript'src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
</head>
<body>
    <div class="container">
        <center><h2 style="margin-top: 2%;">แบบทดสอบวิชาความรู้พื้นฐานทางด้านคอมพิวเตอร์</h2></center>
        <hr>
        <?php
        $sql = "SELECT * FROM examdata;";
        $result = mysqli_query($con,$sql);
        ?>
        <form action ="exam_check.php" method ="POST">
            <?php
            while ($dbarr = mysqli_fetch_array($result))
            {
                $no = $dbarr['No'];
                $question = $dbarr['Question'];
                $choice1 = $dbarr['Choice1'];
                $choice2 = $dbarr['Choice2'];
                $choice3 = $dbarr['Choice3'];
                $choice4 = $dbarr['Choice4'];
                echo "<div class='col' style='outline:solid lightblue;'>
                <b>ข้อที่ $no. $question ?</b><br>\n
                <input type= radio name=q$no value=1>$choice1<br>\n
                <input type= radio name=q$no value=2>$choice2<br>\n
                <input type= radio name=q$no value=3>$choice3<br>\n
                <input type= radio name=q$no value=4>$choice4<br><p>\n
                      </div>";
            }
            ?>
            <center><p><button type="submit" Name="submit" class="btn btn-primary">ส่งคำตอบ</button>
            <button type="reset" Name="reset" class="btn btn-danger">รีเซ็ตคำตอบ</button>
            <a class="btn btn-info" href="index.php" role="button" Name="back">กลับสู่หน้าหลัก</a></center>
        </form>
    </div>
</body>
</html>