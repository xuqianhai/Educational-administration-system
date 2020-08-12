<?php
// echo "hello world";
// 引用connect.php
include("connectSql.php");
if (!isset($_POST["submit"])) {
    exit("非法访问");
}
// 获取用户输入数据
$name = $_POST["name"];
$number = $_POST["number"];
$password = $_POST["password"];
$againPassword = $_POST["againPassword"];
$phone = $_POST["phone"];
$identity = $_POST["identity"];

// 判断用户输入格式
if ($name == "") {
    echo "<script> alert('请设置昵称!');parent.location.href='./index.php'; </script>";
    exit;
}
if ($number == "") {
    echo "<script> alert('账号不能为空!');parent.location.href='./index.php'; </script>";
    exit;
}
$sql = "SELECT `number` FROM usertable WHERE `number`='$number'";
$res = mysqli_query($connect, $sql);
if ($res->num_rows != 0 ) {
    echo "<script> alert('该账号已被注册!');parent.location.href='./index.php'; </script>";
    exit;
}
if ($password == "") {
    echo "<script> alert('密码不能为空!');parent.location.href='./index.php'; </script>";
    exit;
}
if (strlen($password) < 6) {
    echo "<script> alert('密码不能小于六位!');parent.location.href='./index.php'; </script>";
    exit;
}
if ($againPassword != $password) {
    echo "<script> alert('两次密码不一致，请重新输入!');parent.location.href='./index.php'; </script>";
    exit;
}
if (strlen($phone) < 7 || strlen($phone) > 11) {
    echo "<script> alert('手机号格式出现错误！');parent.location.href='./index.php'; </script>";
    exit;
}
$sql = "SELECT `phone` FROM usertable WHERE `phone`='$phone'";
$res = mysqli_query($connect, $sql);
if($res->num_rows !=0 ){
    echo "<script> alert('该手机号已被占用!');parent.location.href='./index.php'; </script>";
    exit;
}
if ($identity == "") {
    echo "<script> alert('请选择身份!');parent.location.href='./index.php'; </script>";
    exit;
}
// var_dump($name);
// 将注册信息存到数据库
$sql = "INSERT INTO usertable(`name`,`number`,`password`,`phone`,`identity`) VALUES ('$name','$number','$password','$phone','$identity')";
if (mysqli_query($connect, $sql)) {
    echo "<script> alert('注册成功!');parent.location.href='../signIn/index.php'; </script>";
} else {
    echo "<script> alert('注册错误,重新注册!');parent.location.href='./index.php'; </script>";
}

