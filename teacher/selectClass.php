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
// 查询学生
$selectClass = $_POST["selectClass"];
$name = $_SESSION['name'];
if ($selectClass == "") {
    echo "<script> alert('请先输入班级!');parent.location.href='./index.php'; </script>";
    exit;
}

$sql = "SELECT s.name, s.sex,s.class,s.phone,s.number FROM usertable as t  join studentinformation as s WHERE s.class = '$selectClass' AND t.name = '$name'";
$res1 = mysqli_query($connect, $sql);
$res = mysqli_fetch_all($res1, MYSQLI_ASSOC);
if ($res[0]["name"] == "") {
    echo "<script> alert('查询失败,未找到该班级学生');parent.location.href='./index.php'; </script>";
    exit;
}
  // 引用主页
  include_once("./index.php");