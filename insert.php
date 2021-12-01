<h1 align="center">新增</h1>
<form action="" method="post" name="inf">
    <p align="center">学号：<input type="text" name="stuid" /></p>
    <p align="center">姓名：<input type="text" name="stuname" /></p>
    <p align="center">性别：<input type="text" name="stusex" /></p>
    <p align="center">年龄：<input type="text" name="stuage" /></p>
    <p align="center"><input type="submit" name="addsub" value="提交"/></p>
</form>

<?php
//连接数据库
$link = mysqli_connect("localhost","root","","homework","3306");
if (!$link)
    exit("数据库连接失败");

//向数据库新增
if (!empty($_POST["addsub"])){
    $stuid = $_POST['stuid'];
    $stuname = $_POST['stuname'];
    $stusex = $_POST["stusex"];
    $stuage = $_POST["stuage"];
    mysqli_query($link,"INSERT students (stuID,stuName,stuSex,stuAge) VALUES ('$stuid',$stuname','$stusex','$stuage')");
}
?>