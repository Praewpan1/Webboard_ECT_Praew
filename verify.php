<?php

session_start();
if (isset($_SESSION['id'])) {
    echo header("location:index.php");
    die();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify</title>
</head>

<body>
    
    

        <?php
        if ($_POST['Login'] == "admin" && $_POST['password'] == "ad1234") {
            $_SESSION["username"] = "admin";
            $_SESSION["role"] = "a";
            $_SESSION["id"] = session_id();
            header("location:index.php"); // ถ้าloginถูกไปหน้าindex admin
            //echo "ยินดีต้อนรับคุณ ADMIN";
        } elseif (($_POST['Login'] == "member") && ($_POST['password'] == "mem1234")) {
            $_SESSION["username"] = "member";
            $_SESSION["role"] = "m";
            $_SESSION["id"] = session_id();
            header("location:index.php");//ถ้าloginถูกไปหน้าindex member
           // echo "ยินดีต้อนรับคุณ MEMBER";
        } else
            $_SESSION['error']='erroe';
            header("location:login.php");
            die();
            //echo "ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง";


        ?>

    
    <div style="text-align: center;"> <a href="index.php">กลับไปหน้าหลัก</a></div>


</body>

</html>