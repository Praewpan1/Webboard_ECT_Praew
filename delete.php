<?php
session_start();
if(isset($_SESSION['id'])&& $_SESSION['role']=='a' ){ //ถ้าล้อคอินมา ฿฿ ล้อคอินมาเป็น admin
    $id =$_GET['id'];
    echo"ลบกระทู้ หมายเลข $id";
}
else{
    header("location:index.php");
    die();
}

?>