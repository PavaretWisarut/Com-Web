<?php
include '../db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แจ้งลบคอมเมนต์</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="style.css" rel="stylesheet">
    <script type='text/javascript'src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
</head>
<body>
        <div class="container">
            <form action="report_comment.php" method="POST">
                <center><h2 style="margin-top: 2%;"><h2>แจ้งลบคอมเมนต์</h2></center>
                <hr>
                <div class="row">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">ชื่อหัวข้อบทความ</label>
                                <input type="text" class="form-control" name="topic" id="exampleFormControlInput1" placeholder="คอมพิวเตอร์เครื่องแรกของโลกคืออะไร ... " style="width: 100%;">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">คำตอบลำดับที่</label>
                                <input type="text" class="form-control" name="answer_no" id="exampleFormControlInput1" placeholder="คำตอบลำดับที่ 1 " style="width: 100%;">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">ชื่อผู้ใช้ที่ตอบคำเมนต์</label>
                                <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Anonymous01">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">สาเหตุที่ต้องการแจ้งลบคอมเมนต์</label>
                                <textarea class="form-control" name="causeto_ban" id="exampleFormControlTextarea1" rows="3"placeholder="พิมพ์ไม่สุภาพ , คำตอบไม่เกี่ยวข้องกับหัวข้อ ..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <center><a href="show_question.php"role="button" class="btn btn-danger">ยกเลิก</a>
                            <button type="submit" class="btn btn-primary" name="submit">ยืนยัน</button></center>
                        </div>
                    </div>
                </div>
            </form>
        </div>
<?php
if(isset($_POST['submit'])){
    $topic = $_POST['topic'];
    $answer_no = $_POST['answer_no'];
    $name = $_POST['name'];
    $causeto_ban = $_POST['causeto_ban'];
    $sql = "INSERT INTO report values ('$topic','$answer_no','$name','$causeto_ban');";
    $result = mysqli_query($con,$sql);
    if($result){
        if(empty($topic&&$name&&$causeto_ban)){
            echo "<script>alert('!! กรุณาใส่ข้อมูลให้ครบถ้วน !!');</script>";
        }
        else{
            echo "<script>alert('!! ผลการแจ้งลบคอมเมนต์ของท่านถูกจัดเก็บเรียบร้อยแล้ว !!');</script>";
        }
            
    }
    else{
        echo "<script>alert('!! กรุณาใส่ข้อมูลให้ครบถ้วน !!');</script>";
    }
}
?>
</body>
</html>