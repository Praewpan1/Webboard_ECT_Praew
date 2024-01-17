<?php

session_start();
if(isset($_SESSION['id'])){ 
    echo header("location:index.php") ;
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
    <h1 style="text-align: center;">Webboard PRAEWPAN</h1>
    <hr>
    <div style="text-align: center;">
    
    <?php
    if($_POST['Login'] == "admin" && $_POST['password']=="ad1234"){
        $_SESSION["username"] ="admin";
        $_SESSION["role"]="a";
        $_SESSION["id"]=session_id();
        echo "ยินดีต้อนรับคุณ ADMIN";
    } 
    elseif(($_POST['Login'] == "member") && ($_POST['password'] =="mem1234")){
        $_SESSION["username"] ="member";
        $_SESSION["role"]="m";
        $_SESSION["id"]=session_id();
        echo "ยินดีต้อนรับคุณ MEMBER";
    }
    else
        echo "ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง";

    
    ?>
   
    </div>
    <div style="text-align: center;"> <a href="index.php" >กลับไปหน้าหลัก</a>
</div>
   
    
</body>
</html>