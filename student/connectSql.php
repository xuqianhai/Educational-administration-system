<?php
$connect = @mysqli_connect('localhost','root','010123','oneproject');
if(!$connect){
echo("连接数据库失败！");
}
mysqli_query($connect,"SET NAMES utf8");