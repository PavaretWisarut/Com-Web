<?php
include 'db_connect.php';
$usernameSES = $_SESSION['username'];
if(!isset($_SESSION['username'])){
    header('Location: index.php');
}
else{
    $sql = "SELECT * FROM members WHERE username = '$usernameSES'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการโปรไฟล์</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="style.css" rel="stylesheet">
    <script type='text/javascript'src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
</head>
<body>
    <div class="container" style="max-width: 1500px; background-color: #EFE5EE; margin-top: 5%; ">
        <form action="editpf.php" name="updateprofile" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="text-center">จัดการโปรไฟล์</h1>
            </div>
        </div>
        <div class="row">
            <img src="<?php echo "$row[4]";?>" class="rounded mx-auto d-block" alt="yourpicture" style="width: 15%; ">
        </div>
        <hr>
                <center>เลือกรูปโปรไฟล์(กรุณาเปลี่ยนชื่อไฟล์ก่อนอัพโหลด) : <input type="file" name="file" accept="image/png,image/jpeg,image/jpg"> 
                <button type="submit" class="btn btn-danger" name="change_profile">เปลี่ยนรูปโปรไฟล์</button></center>
          
        <div class="row" style="margin-top: 20px;">
            <div class='col-sm-6'>
            <div class="mb-3 row">
                <label for="staticUsername" class="col-sm-2 col-form-label">Username  ปัจจุบัน: </label>
                <div   div class="col-sm-10">
                <h5 name="currentusername" style="margin-top: 2%;"><?php echo "$row[0]";?></h5>
                </div>
            </div>
            </div>
        </div>
        <div class='col-sm-6'>
            <div class="mb-3 row">
                <label for="staticUsername" class="col-sm-2 col-form-label">Email ปัจจุบัน : </label>
                <div   div class="col-sm-10">
                <h5 name="currentemail" style="margin-top: 1%;"><?php echo "$row[2]";?></h5>
                </div>
            </div>
            </div>
            <div class='col-sm-6'>
            <div class="mb-3 row">
                <label for="staticUsername" class="col-sm-2 col-form-label">Name ปัจจุบัน : </label>
                <div   div class="col-sm-10">
                <h5 name="currentname" style="margin-top: 1%;"><?php echo "$row[3]";?></h5>
                </div>
            </div>
            </div>
        <div class='row'>
        <div class='col-sm-6'>
        <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email : </label>
                <div   div class="col-sm-10">
                <input type="email" class="form-control" id="emailchange" placeholder="Email ที่คุณต้องการจะเปลี่ยน" name="email">
                </div>
            </div>
         </div>
         <div class='col-sm-6'>
        <div class="mb-3 row">
        <center><button type="submit" class="btn btn-danger" style="width: 90%;" name="change_email">เปลี่ยน Email </button></center>
            </div>
         </div>
        </div>
        <div class='row'>
        <div class='col-sm-6'>
        <div class="mb-3 row">
                <label for="staticname" class="col-sm-2 col-form-label">Name : </label>
                <div   div class="col-sm-10">
                <input type="text" class="form-control" id="namechange" placeholder="Name ที่คุณต้องการจะเปลี่ยน" name="name">
                </div>
            </div>
         </div>
         <div class='col-sm-6'>
        <div class="mb-3 row">
        <center><button type="submit" class="btn btn-danger" style="width: 90%;" name="change_name">เปลี่ยน Name </button></center>
            </div>
         </div>
        </div>
        <div class='row'>
        <div class='col-sm-6'>
        <div class="mb-3 row">
                <label for="staticpassword" class="col-sm-2 col-form-label">Password : </label>
                <div   div class="col-sm-10">
                <input type="password" class="form-control" id="passwordchange" placeholder="Password ที่คุณต้องการจะเปลี่ยน" name="password">
                </div>
            </div>
         </div>
         <div class='col-sm-6'>
        <div class="mb-3 row">
        <center><button type="submit" class="btn btn-danger" style="width: 90%;" name="change_password">เปลี่ยน Password </button></center>
            </div>
         </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <a href="index.php" class="btn btn-secondary" style="width: 100%;">ย้อนกลับ</a>
            </div>
        </div>
        <hr>
        </form>
    </div>
    <?php
        if(isset($_POST['change_profile'])){
           $check = getImagesize($_FILES['file']['tmp_name']);
           if($check){
                $dir = "Avatar/";
                $fileImage = $dir . basename($_FILES["file"]["name"]);
                
                if(move_uploaded_file($_FILES["file"]["tmp_name"],$fileImage)){
                    echo $fileImage;
                    echo "อัพโหลดไฟล์ชื่อ ".basename($_FILES["file"]["name"])."สำเร็จแล้ว";
                }
                else{
                    echo "เกิดข้อผิดพลาดในการอัพโหลดไฟล์ของคุณ";
                }
           }
            $sql = "UPDATE members SET images ='$fileImage' WHERE username = '$usernameSES'";
            $result = mysqli_query($con,$sql);
            echo "<script>window.location='editpf.php';</script>";
           }
        
        if(isset($_POST['change_password'])){
            $password = $_POST['password'];
            $sql = "UPDATE members SET password ='$password' WHERE username = '$usernameSES'";
            $result = mysqli_query($con,$sql);
            echo "<script>
                    Swal.fire({
                    icon: 'success',
                    title: 'แก้ไขรหัสผ่านเรียบร้อยแล้ว',
                    showConfirmButton : false,
                    timer: '1500',
                    })
                    </script>";
        }
        if(isset($_POST['change_email'])){
            $email = $_POST['email'];
            $sql = "UPDATE members SET email ='$email' WHERE username = '$usernameSES'";
            $result = mysqli_query($con,$sql);
            echo "<script>
                    Swal.fire({
                    icon: 'success',
                    title: 'แก้ไขอีเมลเรียบร้อยแล้ว',
                    showConfirmButton : false,
                    timer: '1500',
                    })
                    </script>";
        }
        if(isset($_POST['change_name'])){
            $name = $_POST['name'];
            $sql = "UPDATE members SET name ='$name' WHERE username = '$usernameSES'";
            $result = mysqli_query($con,$sql);
            echo "<script>
                    Swal.fire({
                    icon: 'success',
                    title: 'แก้ไขชื่อเรียบร้อยแล้ว',
                    showConfirmButton : false,
                    timer: '1500',
                    })
                    </script>";
        }
    ?>
</body>
</html>