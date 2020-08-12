<?php
// echo "hello world";
// 引用connect.php
// 开启超全局变量
session_start();
$name1 = $_SESSION['name'];
$identity1 = $_SESSION['identity'];
$result1 = $_SESSION['result'];
$number1 = $_SESSION['number'];
$phone1 = $_SESSION['phone'];
// 引用php
include("connectSql.php");
if (!isset($_POST["submit3"])) {
    exit("非法访问");
}
$password = $_POST["newPassword"];
if($password == ""){
    echo "<script> alert('请输入新密码!');parent.location.href='./index.php'; </script>";
    exit;
}
$sql = "UPDATE usertable SET `password` = '$password' WHERE `number` = '$number1'";
if (mysqli_query($connect, $sql)) {
    echo "<script> alert('修改成功!');parent.location.href='../signIn/signOut.php'; </script>";
} else {
    echo "<script> alert('修改失败!');parent.location.href='./index.php'; </script>";
}
