<?php
// echo "hello world";
// 引用connect.php
// 开启超全局变量
session_start();
// 引用php
include("connectSql.php");
if (!isset($_POST["submit"])) {
    exit("非法访问");
}
// 添加学生
// 获取用户输入数据
$name = $_POST["name"];
$number = $_POST["number"];
$phone = $_POST["phone"];
$sex = $_POST["sex"];
$class = $_POST["class"];

if($name == ""){
    echo "<script> alert('学生姓名不能为空,请重新添加!');parent.location.href='./index.php'; </script>";
    exit;
}
if($number == ""){
    echo "<script> alert('学生账号不能为空,请重新添加!');parent.location.href='./index.php'; </script>";
    exit;
}
if($phone == ""){
    echo "<script> alert('学生手机号不能为空,请重新添加!');parent.location.href='./index.php'; </script>";
    exit;
}
if($class == ""){
    echo "<script> alert('学生班级不能为空,请重新添加!');parent.location.href='./index.php'; </script>";
    exit;
}
if($sex == ""){
    echo "<script> alert('学生性别不能为空,请重新添加!');parent.location.href='./index.php'; </script>";
    exit;
}
$sql = "SELECT `number` FROM studentinformation WHERE `number`='$number' LIMIT 1";
$res = mysqli_query($connect, $sql);
if ($res->num_rows != 0 ) {
    echo "<script> alert('该账号已经添加,请勿重复添加!');parent.location.href='./index.php'; </script>";
    exit;
}
$sql = "SELECT `number` FROM usertable WHERE `number`='$number' LIMIT 1";
$res = mysqli_query($connect, $sql);
if ($res->num_rows == 0 ) {
    echo "<script> alert('该学生还未注册!');parent.location.href='./index.php'; </script>";
    exit;
}

$sql = "INSERT INTO studentinformation(`name`,`number`,`sex`,`class`,`phone`) VALUES ('$name','$number','$sex','$class','$phone')";
if (mysqli_query($connect, $sql)) {
    echo "<script> alert('添加成功!');parent.location.href='./index.php'; </script>";
} else {
    echo "<script> alert('添加失败!');parent.location.href='./index.php'; </script>";
}




