<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>post</title>
</head>
<body>
<h1 style="text-align: center;">Webboard PRAEWPAN</h1>
    <hr><br>
    <div style="text-align: center;">
        ต้องการดูกระทู้หมายเลข  <?php echo $_GET["id"]?><br>
        <?php
        $id = $_GET['id'];
        if(($id % 2)==0)
            echo"เป็นกระทู้หมายเลขคู่";
        else
        echo"เป็นกระทู้หมายเลขคี่";

        ?>
       
    
    <table style="border: 2px solid black; width:40%" align="center">
        <tr><td colspan="2" style="background-color: #6CD2FE;" align="left"> แสดงความคิดเห็น </td> </tr>
        <tr><td><textarea name="message" rows="10" cols="60"></textarea></td> </tr>
        <tr><td colspan="2"align =center><input type="submit" value="ส่งข้อความ "required></td></tr>

    </table>
    </div>
    <br><br>
<div style="text-align: center;"> <a href="index.php" >กลับไปหน้าหลัก</a>
</div>
</body>
</html>