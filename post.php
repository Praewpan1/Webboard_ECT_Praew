<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
   
    <title>post</title>
</head>
<body>
    <div class="container-lg">
<h1 style="text-align: center;" class="mt-3">Webboard PRAEWPAN</h1>
    <?php include"nav.php" ?>
    <div class="row mt-4">
        <div class="col-lg-3 col-md-2 col-sm-1"></div>
        <div class="col-lg-6 col-md-8 col-sm-10">

            <?php 
            $conn =new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");//ไปทำความเข้าใจ 22-33
            $sql="SELECT post.title,post.content,post.post_date,user.login
            FROM post INNER JOIN user ON 
            (post.user_id=user.id) where post.id=$_GET[id]";  //3.54
            $result=$conn->query($sql);
            while($row=$result->fetch()){
                
            echo    "<div class='card border-primary'>";
            echo    "<div class='card-header bg-primary text-white'>$row[0]</div>";
            echo    "<div class='card-body'>$row[1]<br><br>$row[3]- $row[2]</div>";  
            echo    "</div><br>";
            }
            ?>  

            <?php 
            $conn =new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
            $sql="SELECT comment.content ,comment.post_date,user.login
            FROM comment INNER JOIN user ON 
            (comment.user_id=user.id) where comment.post_id=$_GET[id]"; 
            $result=$conn->query($sql);
            $i=1;
            while($row=$result->fetch()){               
            echo    "<div class='card border-info'>";
            echo    "<div class='card-header bg-info text-white'>ความคิดเห็นที่ $i </div>";
            echo    "<div class='card-body'>$row[0]<br><br>$row[2]- $row[1]</div>";  
            echo    "</div><br>";
            $i=$i+1; 
            }
            ?>  


            <?php if(isset($_SESSION['id'])){?>
            <div class="card border-success mt-3">
            <div class="card-header bg-success text-white">
                แสดงความคิดเห็น</div>
            <div class="card-body">
                <form action="post_save.php" method="post">
                    <input type="hidden" name="post_id" value="<?=$_GET['id'];?>">
                    <div class="row mb-3 justify-content-center">
                        <div class="col-lg-10">
                            <textarea name="comment"  rows="8" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 d-flex justify-content-center">
                            <button type="submit" class="btn btn-success btn-sm text-white">
                                <i class="bi bi-box-arrow-up-right"></i> ส่งข้อความ
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm ms-2">
                                <i class="bi bi-x-square"></i> ยกเลิก
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            </div>
            <?php }?>
            <br>
        </div>
        <div class="col-lg-3 col-md-2 col-sm-1"></div>
    </div>
    </div>
   
</body>
</html>