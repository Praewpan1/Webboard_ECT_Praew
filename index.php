<?php

session_start();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webboard PRAEWPAN</title>
</head>
<body>
    <h1 style="text-align: center;">Webboard PRAEWPAN</h1>
    <hr>
    <form >
        หมวดหมู่:
        <select > 
            <option value="all">--ทั้งหมด--</option>
            <option value="general">เรื่องทั่วไป</option>
            <option value="study">เรื่องเรียน</option>
        </select>
        <?php
        if(!isset($_SESSION['id'])){
            echo"<a href=login.php style='float: right';>เข้าสู่ระบบ</a> "; //เพิ่ม echo ลบ"" ตัวอื่นนอกจากตัวคลุม 'float: right' ใส่'' ด้วย
        }
        else{
            echo"<div style ='float:right'>
                ผู้ใช้งานระบบ : $_SESSION[username] &nbsp;&nbsp;
                 <a href=logout.php style='float: right';>ออกจากระบบ</a> <br>

            </div><br>
            <a href=newpost.php>สร้างกระทู้ใหม่</a> 
            " ;           
        }
        

        ?>

    </form >
    <ul>
        <?php
        for($i=1;$i<=10;$i++){
            echo" <li><a href=post.php?id=$i>กระทู้ที่ $i</a>";
            if(isset($_SESSION['id'])&& $_SESSION['role']=='a'){ //ล้อคอินมาไหม ฿฿ ถ้าล็อคอินมาต้องล็อคอินมาเป็น Admin
                echo  "&nbsp;&nbsp; <a href=delete.php?id=$i>ลบ</a>";
            }
            echo"</li>";

        }
        ?>

        
    </ul>

</body>
</html>