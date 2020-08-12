<?php
// echo "hello world";
// 引用connect.php
// 开启超全局变量
session_start();
include("connectSql.php");
$name = $_GET["name"];
$phone = isset($_GET["phone"]) ? (int) $_GET["phone"] : 0;
if ($phone == 0 || $name = "") {
    header('Refresh:3 ;url=index.php ');
    echo "你要删除学生不存在!";
    exit;
}
// 删除数据
$sql = "DELETE FROM studentinformation WHERE `phone` = '$phone' ";
if (mysqli_query($connect, $sql)) {
    echo "<script> alert('$name 删除成功!');parent.location.href='./index.php'; </script>";
    exit;
} else {
    header('Refresh:3 ;url=index.php ');
    echo "删除失败!";
    exit;
}
