<?php
include 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <style>
        body {
            background-color: lightgray;
            background-image: url("Picture/woodbg.jpg");
        }
    </style>
    <script type='text/javascript'src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
</head>

<body>
    <div class="container" style="max-width: 600px; margin-top : 9%; background-color: white; border-radius: 25px;">
        <form action="checkregis.php" name="checkregis" method="POST">
            <div class="row">
                <div class="col mt-3">
                    <h1 class="text-center mb-3 pt-2">Register Pages</h1>
                </div>
            </div>
            <div class="row">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username" required>
                        <label for="floatingInput" style="padding-left: 20px;">Username</label>
                    </div>              
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                    <label for="floatingPassword" style="padding-left: 20px;">Password</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" placeholder="name@example.com" name="email" required>
                    <label for="floatingInput" style="padding-left: 20px;">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" placeholder="name@example.com" name="name" required>
                    <label for="floatingInput" style="padding-left: 20px;">Name</label>
                </div>
            </div>
            <div class="col-12 text-center">
                <a href="index.php" class="btn btn-secondary btn-lg">ย้อนกลับ</a>
                <button type="submit" class="btn btn-primary btn-lg" name="registerbtn">สมัครสมาชิก</button>
            </div>
            <div class="col-12 text-center" style="margin: 2% 0px;">
                <a href="html/forgetpass.html">ลืมรหัสผ่าน ?</a>
            </div>
            <div class="col-12 text-center pb-4">
                <b>มีรหัสผ่านอยู่แล้ว ?</b>
                <a href="index.php">Login</a>
            </div>
        </form>
    </div>
    <?php
    if(isset($_SESSION['already'])){
        echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Username นี้มีอยู่ในระบบแล้ว' ,
            text : 'กรุณาป้อนข้อมูลใหม่อีกครั้ง',
            showConfirmButton : false,
            timer: '3000',
          })
        </script>";
    }
    if(isset($_SESSION['regis'])){
        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'สมัครสมาชิกสำเร็จแล้ว' ,
            text : 'กำลังกลับสู่หน้าหลัก',
            showConfirmButton : false,
            timer: '2000',
        })
        setTimeout(function(){location.href='index.php'} , 2000);
        </script>";
    }
    ?>
    <?php
    unset($_SESSION['already']);
    unset($_SESSION['regis']);
    ?>
</body>

</html>
