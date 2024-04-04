<?php
session_start();
$id = $_GET['id'];
$category=$_POST['category'];
$title=$_POST['title'];
$content=$_POST['content'];
echo"$title";
echo"$content";
$conn=new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
$sql="UPDATE post
SET title='$title',content='$content'
WHERE id=$id ";
$conn->query($sql);
$conn=null;

$_SESSION['update']="success";


header("location:editpost.php?id=$id ");
    die();
?>