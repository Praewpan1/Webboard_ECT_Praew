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
    <title>Webboard PRAEWPAN</title>
</head>
<body>
    <h1 style="text-align: center;">Webboard PRAEWPAN</h1>
    <hr>
    <form action="verify.php" method="post">
            <table style="border: 2px solid black ;width: 40%;"align ="center">
            <tr><td colspan="2" style="background-color: #6CD2FE;">เข้าสู่ระบบ</td></tr>
            <tr><td>Login</td><td><input type="text" name="Login" size="55" required></td></tr><br>
            <tr><td>Password</td><td><input type="password" name="password" size="55" required></td></tr>
            <tr><td colspan="2"align =center><input type="submit" value="Login "required></td></tr>

        </table>
    </form> <br><br>
<div style="text-align: center;">    ถ้ายังไม่ได้เป็นสมาชิก <a href="register.php" >กรุณาสมัครสมาชิก</a>
</div>
</body>
</html>