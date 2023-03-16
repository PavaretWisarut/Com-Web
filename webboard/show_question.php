<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าหลักของเว็บบอร์ด</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="style.css" rel="stylesheet">
    <script type='text/javascript'src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
</head>
<body>
    <div class="container">
        <center><h2 style="margin-top: 2%;"><h2>กระทู้ทั้งหมด</h2></center>
    <hr>
    <?php
        $host = "localhost";
        $user = "root";
        $password = "";
        $dbname = "comweb";
        
        $link = mysqli_connect($host,$user,$password,$dbname);
        mysqli_set_charset($link,'utf8');
        $sql = "Select * From question Order By qno Desc;";
        $result = mysqli_query($link,$sql);
        while ($dbarr = mysqli_fetch_array($result))
        {
            echo $dbarr['qno'];
            echo "&nbsp;<a href=show_detail.php?item=$dbarr[qno]>";
            echo "$dbarr[qtopic]</a>&nbsp;";
            echo "โดย ".$dbarr['qname'];
            echo "&nbsp;[".$dbarr['qcount'] ."]<br>\n";
        }
        mysqli_close($link);
    ?>
<hr>
<center><a class="btn btn-primary" role="button" href="form_question.php">ตั้งกระทู้ใหม่</a></center>  
    </div>
        
</body>
</html>