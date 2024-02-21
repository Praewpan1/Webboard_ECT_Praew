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
    <div class="container-lg">
        <h1 style="text-align: center;" class="mt-3">Webboard PRAEWPAN</h1>

       <?php include"nav.php"?>
        <div class="mt-3 d-flex justify-content-between" ><!-- กำหนดระยะห่างบน  d-flex คือให้divทั้งสองก่้อนอยู่บรรทัดเดียวกัน justify-content-between"คือแยกซ้ายขวา-->

            <div>
                <label>หมวดหมู่</label>
                <span class="dropdown">
                    <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        --ทั้งหมด--
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">ทั้งหมด</a></li>
                        <li><a class="dropdown-item" href="#">เรื่องเรียน</a></li>
                        <li><a class="dropdown-item" href="#">เรื่องทั่วไป</a></li>
                    </ul>
                </span>
            </div>
            <?php  if(isset($_SESSION['id'])){?>
            <div><a href="newpost.php" class="btn btn-success btn-sm"><i class="bi bi-plus"></i> สร้างกระทู้ใหม่</a></div>
            <?php }?>
        </div>
       <table class="table table-striped mt-4"> <!-- สลับสี mt-4กำหนดระยะห่างบน -->
       <?php
            for ($i = 1; $i <= 10; $i++) {
                echo " <tr><td class ='d-flex justify-content-between'><a href=post.php?id=$i  style =text-decoration:none>กระทู้ที่ $i</a>";
                if (isset($_SESSION['id']) && $_SESSION['role'] == 'a') { //ล้อคอินมาไหม ฿฿ ถ้าล็อคอินมาต้องล็อคอินมาเป็น Admin
                    echo  "&nbsp;&nbsp; <a href=delete.php?id=$i 
                    class='btn btn-danger btn-sm' ><i class='bi bi-trash'></i></a>";
                }
                echo "</td></tr>";
            }
            ?>
       </table>
        
    </div>
</body>

</html>