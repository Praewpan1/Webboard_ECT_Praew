<?php
session_start();
$category=$_POST['category'];


$conn=new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
    $sql="INSERT INTO category (name)
    VALUES ('$category')";
    $conn->exec($sql);
    $_SESSION['category']="success";
$conn=null;
header("location:category.php");
    die();
?>