<?php
$login=$_POST['Accountname'] ;
$passwd=$_POST['password'];
$name=$_POST['name'];
$gender=$_POST['gender'];
$email=$_POST['email'];

$con=new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");

$sql="INSERT INTO user (login,password,name,gender,email,role)
VALUES('$login','$passwd','$name','$gender','$email','m')";
$con->exec($sql);
$conn=null;

?>