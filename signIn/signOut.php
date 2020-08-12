<?php
session_start();
session_unset();
echo "<script> alert('注销成功!');parent.location.href='../index.php'; </script>";

?>