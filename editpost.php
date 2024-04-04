<?php
session_start();
$id = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Webboard PRAEWPAN</title>
</head>
<body>
    <div class="container-lg">
        <h1 style="text-align: center;" class="mt-3">Webboard PRAEWPAN</h1>
        <?php include "nav.php" ?>
        <?php
                $sql= "SELECT user_id FROM post WHERE post.id=$_GET[id]";
                $conn=new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
                    foreach($conn->query($sql) as $row){
                        if(!isset($_SESSION['id']) || $_SESSION['user_id']!=$row['user_id'] ){
                            header("location:index.php");
                            die();
                        }
                    }   
            ?>
        <div class="row mt-4">
            <div class="col-lg-3 col-md-2 col-sm-1"></div>
            <div class="col-lg-6 col-md-8 col-sm-10">
            <?php 
                if(isset($_SESSION['update'])){
                    if($_SESSION['update']=="success"){
                        echo "<div class='alert alert-success'>แก้ไขข้อมูลเรียบร้อยแล้ว</div>";
                    }
                    unset($_SESSION['update']);
                }
                ?>
                <div class="card border-warning">
                    <div class="card-header bg-warning text-white">แก้ไขกระทู้</div>
                    <div class="card-body">
                        <form action="editpost_save.php?id=<?php echo $id ?>" method="post">
                            <div class="row">
                                <label for="cat" class="col-lg-3 col-form-label">หมวดหมู่:</label>
                                <div class="col-lg-9">
                                <select name="category" class="form-select">
                                        <?php 
                                            $conn=new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
                                            $sql="SELECT post.id , post.cat_id , category.name , category.id FROM post INNER JOIN category ON(post.cat_id=category.id) WHERE post.id=$_GET[id]";

                                            foreach($conn->query($sql) as $row){
                                                echo "<option value='$row[3]'>$row[2]</option>";
                                            }
                                            $sql="SELECT category.id,category.name FROM category INNER JOIN post ON(post.id=$_GET[id]) WHERE NOT category.id=post.cat_id ";
                                            foreach($conn->query($sql) as $row){
                                                echo "<option value='$row[0]'>$row[1]</option>";
                                            }

                                        ?>
                                    </select>
                                    
                                </div>
                            </div>
<?php
$conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
$sql = "SELECT *  FROM post where id=$id";
$result=$conn->query($sql); 
$row = $result->fetch();
echo "<div class='row mt-3'>
<label for='title' class='col-lg-3 col-form-label'>หัวข้อ:</label>
 <div class='col-lg-9'>
<input id='title' type='text' name='title'  value='$row[1]' class='form-control' required>
</div>
</div>
<div class='row mt-3'>
<label for='content' class='col-lg-3 col-form-label'>เนื้อหา:</label>
<div class='col-lg-9'>
    <textarea name='content' rows='8'  class='form-control' required> $row[2]</textarea>
</div>
</div>";
$conn = null;
?>
                                <div class="row mt-3 ">
                                    <div class="col-lg-12 d-flex justify-content-center ">
                                    <button type="submit" class="btn btn-warning btn-sm me-2 text-white">
                                    <i class="bi bi-play-btn"></i> บันทึกข้อความ</button>
                                    </div>
                                </div>
                     </form>
                </div>
            </div>
        <div class="col-lg-3 col-md-2 col-sm-1"></div>
    </div>
</div>
</body>
</html>