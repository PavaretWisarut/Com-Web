<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บทความที่เลือก</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="style.css" rel="stylesheet">
    <script type='text/javascript'src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
</head>
<body>
<div class="container">
    <?php
        $item = $_GET["item"];
        $link = mysqli_connect("localhost","root");
        mysqli_set_charset($link,'utf8');
        mysqli_query($link,"Use comweb");
        function renHTML($strTemp) 
        {
            $strTemp = nl2br(htmlspecialchars($strTemp));
            return $strTemp;
        }
        $sql = "Select * From question Where qno = $item;";
        $result = mysqli_query($link,$sql);
        $dbarr = mysqli_fetch_array($result);
    ?>
    คำถาม <b>
    <?php
        echo renHTML($dbarr['qtopic']);
    ?>
    </b><br>
    <table width="100%" border="1" bgcolor="#E0E0E0" bordercolor="black">
    <tr><td>
    <?php
        echo renHTML($dbarr['qdetail']);
    ?><br>
    โดย<b>
    <?php
        echo renHTML($dbarr['qname']);
    ?></b>
        </td></tr>
        </table><br>
    <?php
        $sql = "Select * From answer Where aquestionno=$item;";
        $result = mysqli_query($link,$sql);
        if($result)
        {
            while ($dbarr = mysqli_fetch_array($result))
            {
    ?>
    คำตอบที่ <b>
    <?php
        echo $dbarr['ano'];
    ?></b><br>
        <table width="100%" border="1">
        <tr><td>
    <?php
        echo renHTML($dbarr['adetail']);
    ?><br>
    โดย<b>
    <?php
        echo renHTML($dbarr['aname']);
    ?></b>
    </td></tr>
    </table><br>
    <?php
            }
        }
    echo "<form method=post action=add_answer.php?answerno=".$item.">";
    mysqli_close($link);
    ?>
    <center>คำตอบ : <br>
    <div class="mb-3">
        <textarea clase="form-control" cols="40" rows="5" name ="a_answer"></textarea><br>
    </div>
    ชื่อ : <input type = "text" name ="a_name" size ="30"><br><br>
    <input class="btn btn-primary" type ="submit" value = "ส่งคำตอบ">&nbsp; 
    <input class="btn btn-danger"type ="reset" value ="ยกเลิก">
    <a class="btn btn-dark" role="button" href="report_comment.php" name="report" >แจ้งลบคอมเมนต์</a><br>
    <a class="btn btn-success" role="button" href="../index.php" name="backtomain" style="margin-top: 1%;">กลับสู่หน้าหลัก</a></center>
    </form>
</div>
</body>
</html>

