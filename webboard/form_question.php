<?php
include '../db_connect.php';
if(!isset($_SESSION['username'])){
    echo "<script>alert('! กรุณาเข้าสู่ระบบเพื่อเข้าสู่บทความ !');</script>";
    echo "<script>window.location='../index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ฟอร์มตั้งกระทู้</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="style.css" rel="stylesheet">
    <script type='text/javascript'src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <style>
        body{
            background-color : #AAD8E5;
        }
    </style>
</head>
<body>
    <div class='container' style="max-width : 800px; outline:black; margin-top: 5%; margin-bottom: 5%; background-color : white;">
        <h2><center>กระดานสนทนา(Web Board)</center></h2><p></p>
        <form name="form1" method="post" action="insert_question.php">
            หัวข้อกระทู้ :
            <input type ="text" name="topic"><p></p>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">รายละเอียด:</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="detail"></textarea>
             </div>
            โดย : <input type="text" name="name" style="margin-top: 2%;"><p></p>
            <center><button type="submit" name ="Submit" value="ส่งกระทู้" class="btn btn-primary">ส่งกระทู้</button>
            <button type="reset" name ="Submit2" value="รีเซ็ต" class="btn btn-danger">รีเซ็ต</button>
            <a class="btn btn-success" href="show_question.php" name="allquestion" role="button">กระทู้ทั้งหมด</a>
            <div class="row">
                <div class="col">
                       <a class="btn btn-dark" href="../index.php" name="back" role="button" style="margin-top: 1%; margin-bottom: 1%;">กลับสู่หน้าหลัก</a></center>
                </div>
            </div>
       
        </form>
        <br>
    </div>
</body>
</html>