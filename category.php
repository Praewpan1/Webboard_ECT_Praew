<?php
session_start();
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
    <div class="container-lg ">
            <h1 style="text-align: center;" class="mt-3">Webboard PRAEWPAN</h1>
            <?php include "nav.php" ?>
        <div class="row mt-4">
            <div class="col-lg-3 col-md-2 col-sm-1"></div>
            <div class="col-lg-6 col-md-8 col-sm-10">

        <?php 
                if(isset($_SESSION['category'])){
                    if($_SESSION['category']=="success"){
                        echo "<div class='alert alert-success'>เพิ่มหมวดหมู่เรียบร้อยแล้ว</div>";
                    }
                    unset($_SESSION['category']);
                }
                ?>

            <table class="table table-striped ">
                <tbody class="text-center">
                    <tr>
                        <td><b>ลำดับ</b></td>
                        <td><b>ชื่อหมวดหมู่</b></td>
                        <td><b>จัดการ</b></td>
                    </tr>
                    <?php
                    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
                    $sql = "SELECT * FROM category  ";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch()) {
                        echo "<tr><td>$row[0]</td><td>$row[1]</td><td><div class='me-2 align-self-center'>
      <a href=# class='btn btn-warning btn-sm'><i class='bi bi-pencil-fill'></i></a> 
      <a href=# class='btn btn-danger btn-sm' ><i class='bi bi-trash'></i></a>   
      </div></td>";
                    }
                    $conn = null;
                    ?>
                </tbody>
            </table>

        </div>
        <div class="col-lg-3 col-md-2 col-sm-1"></div>
        <div class="d-flex justify-content-center mt-1"><button class="btn btn-success btn-sm" data-bs-target="#addcategory" data-bs-toggle="modal">
                <i class="bi bi-bookmark-plus"></i> เพิ่มหมวดหมู่ใหม่</button></div>
                </div>
        <div class="modal fade" id="addcategory">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">เพิ่มหมวดหมู่ใหม่</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form action="category_save.php" method="post">
                            <div class="form-group">
                                <label>ชื่อหมวดหมู่:</label>
                                <input type="text" class="form-control" name="category">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>

</html>