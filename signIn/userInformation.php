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
// 获取用户输入数据
$number = $_POST["number"];
$password = $_POST["password"];
if ($number == "") {
    echo "<script> alert('账号不能为空!');parent.location.href='./index.php'; </script>";
    exit;
}
if ($password == "") {
    echo "<script> alert('密码不能为空!');parent.location.href='./index.php'; </script>";
    exit;
}

// 检验登录
// $sql = "SELECT `id` FROM `usertable` WHERE `number`='$number' AND `password`='$password'";
$sql = "SELECT `number` FROM `usertable` WHERE `number` = '$number'";
$res = mysqli_query($connect, $sql);
if ($res->num_rows == 0) {
    echo "<script> alert('账号不存在');parent.location.href='./index.php'; </script>";
    exit;
}

$sql = "SELECT `id` FROM `usertable` WHERE `number`='$number' AND `password`='$password'";
$res = mysqli_query($connect, $sql);
if ($res->num_rows != 0) {
    $sql = "SELECT `identity`,`name`,`number`,`phone` FROM `usertable` WHERE `number` = '$number'";
    $res1 = mysqli_query($connect, $sql);
    $res = mysqli_fetch_array($res1);
    $identity = $res['identity'];
    $name = $res['name'];
    $number = $res['number'];
    $phone = $res['phone'];
    $_SESSION['name'] = "$name";
    $_SESSION['identity'] = "$identity";
    $_SESSION['number'] = "$number";
    $_SESSION['phone'] = "$phone";
    if ($identity == "老师") {
        echo "<script> alert('登录成功,欢迎$name$identity 回来!');parent.location.href='../teacher/index.php'; </script>";
        $_SESSION['result'] = "成功1";
    }
    if ($identity == "同学") {
        echo "<script> alert('登录成功 ,欢迎$name$identity 回来!');parent.location.href='../student/index.php'; </script>";
        $_SESSION['result'] = "成功2";
    }
    
} else {
    echo "<script> alert('登录失败,请输入正确密码!');parent.location.href='./index.php'; </script>";
    $_SESSION['result'] = "失败";
}
