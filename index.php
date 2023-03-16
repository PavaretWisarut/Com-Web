<?php
include 'navbar.php';
include 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computer Fundamentals</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="style.css" rel="stylesheet">
    <script type='text/javascript'src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>

</head>
<body>
<div class='container' id='main'>
    <div class='row'>
        <div class='col-sm-7'>
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
     <div class="carousel-inner" id='carousel'>
        <div class="carousel-item active">
            <img src="Picture/bg1main.jpg" class="d-block w-100" alt="bgmain1" style='border-radius: 10px;'>
        </div>
        <div class="carousel-item">
            <img src="Picture/bg2main.jpg" class="d-block w-100" alt="bgmain2" style='border-radius: 10px;'>
        </div>
    </div>
  
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
  
</div>
    
    </div>
   
  <?php
  if(!isset($_SESSION['username'])){
    echo " <div class='col-sm-5'>
    <div class='border bg-light rounded p-4 mb-3' id='border'>
    <div class='col'>
      <center><img src='Picture/welcomesign.png' alt='welcome' id='welcome' style='width: 65%;'></center>
    </div>
    <div class='mb-3 row'>
    <div class='col'>
    <form action='checklogin.php' name='checklogin' method='POST'>
      <input type='text' class='form-control' id='Username' placeholder='Username' name='username' required>
    </div>
  </div>
  <div class='mb-3 row'>
    <div class='col'>
      <input type='password' class='form-control' id='Password' placeholder='Password' name='password' required>
    </div>
  </div>    
  <div class='row'>
  <div class='col'>
    <center><button type='submit' class='btn btn-primary' id='login' name='login'>เข้าสู่ระบบ</button></center>
    </div>
  </div>
</form>
  <div class='row'>
      <div class='col'>
          <center><a href='html/forgetpass.html' id='forget'>ลืมรหัสผ่านใช่หรือไม่</a></center>
          <hr>
      </div>
  </div>
  <div class='row'>
  <center><a class='btn btn-danger' href='register.php' target='_blank' role='button' id='regis'>สร้างบัญชีใหม่</a></center>
  </div>";
  }
  if(isset($_SESSION['username'])){
    $username = $_SESSION['username']; 
    echo"<div class='col-sm-5'>
    <div class='border bg-light rounded p-4 mb-3' id='border'>
    <div class='col'>
      <center><img src='Picture/welcomesign.png' alt='welcome' id='welcome' style='width: 65%;'></center>
    </div>
    <div class='mb-3 row'>
    <center><p class='fw-bold' style='font-size:22px; margin-top: 2%;'>ยินดีต้อนรับคุณ : $username</p></center>
  </div>
  <div class='row'>
      <div class='col'>
          <center><a href='editpf.php' class='btn btn-success'id='forget' style='width: 30%; margin-bottom: 2%;'>จัดการโปรไฟล์</a></center>
      </div>
  </div> 
  <div class='row'>
      <div class='col'>
          <center><a href='logout.php' class='btn btn-danger'id='forget' style='width: 30%;'>ออกจากระบบ</a></center>
          <hr>
      </div>
  </div>";
 
  }

  if(isset($_SESSION['success'])){ //เมื่อ session success ทำงานจะทำให้การแจ้งเตือนด้วย Sweetalert สำเร็จ
    echo "<script>
    Swal.fire({
      icon: 'success',
      title: 'Login สำเร็จแล้ว',
      text : 'กำลังกลับสู่หน้าหลัก',
      showConfirmButton : false,
      timer: '1500',
    })
    </script>";
  }
  if(isset($_SESSION['failed'])){ //เมื่อ session failed ทำงานจะทำให้การแจ้งเตือนด้วย Sweetalert สำเร็จ
    echo "<script>
    Swal.fire({
      icon: 'error',
      title: 'Login ไม่สำเร็จ',
      text : 'กรุณาตรวจสอบ Username และ Password อีกครั้ง',
      showConfirmButton : false,
      timer: '3000',
    })
    </script>";
  }
 ?>
 <?php
  unset($_SESSION['success']); // ทำการลบ session success ออกเพื่อรีเฟรชจะไม่แจ้งเตือนซ้ำ
  unset($_SESSION['failed']); // ทำการลบ session failed ออกเพื่อรีเฟรชจะไม่แจ้งเตือนซ้ำ
?>
    
    
     </div>
    </div>
    <hr>
  <div class="row">
    <div class="col-sm-2 picture">
      <div class="card" style="width: 20rem;">
        <img src="Picture/computer01.jpg" class="card-img-top" alt="ความเป็นมาของคอมพิวเตอร์">
      <div class="card-body">
        <h5 class="text-center card-title">ความเป็นมาของคอมพิวเตอร์</h5>
        
        <a href="html/historypage.html" class="btn btn-danger" style="margin-left: 30%">อ่านบทความ</a>
      </div>
      </div>
    </div>
    <div class="col-sm-2 picture">
    <div class="card" style="width: 20rem;">
        <img src="Picture/computer2.png" class="card-img-top" alt="หลักการทำงานของคอมพิวเตอร์" >
      <div class="card-body">
        <h5 class="text-center card-title">หลักการทำงานของคอมพิวเตอร์</h5>
        
        <a href="html/computerpage2.html" class="btn btn-danger" style="margin-left: 30%">อ่านบทความ</a>
      </div>
      </div>
    </div>
    <div class="col-sm-2 picture">
    <div class="card" style="width: 20rem;">
        <img src="Picture/computer3.jpg" class="card-img-top" alt="ส่วนประกอบของคอมพิวเตอร์" \>
      <div class="card-body">
        <h5 class="text-center card-title">ส่วนประกอบของคอมพิวเตอร์</h5>
        
        <a href="html/componantpage3.html" class="btn btn-danger" style="margin-left: 30%">อ่านบทความ</a>
      </div>
      </div>
    </div>
    <div class="col-sm-2 picture">
    <div class="card" style="width: 20rem;">
        <img src="Picture/computer4.jpg" class="card-img-top" alt="ฮาร์ดแวร์และซอฟต์แวร์">
      <div class="card-body">
        <h5 class="text-center card-title">ฮาร์ดแวร์และซอฟต์แวร์</h5>
        
        <a href="html/page4.html" class=" btn btn-danger" style="margin-left: 30%">อ่านบทความ</a>
      </div>
      </div>
    </div>
  </div>
    <hr>
    <?php include 'footer.php'; ?>
</div>
</body>
</html>