<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>学生主页</title>
    <link rel="icon" href="../images/student.png">
    <link rel="stylesheet" href="./index.css">
</head>
<?php session_start();
$name = $_SESSION['name'];
$identity = $_SESSION['identity'];
$result = $_SESSION['result'];
$number = $_SESSION['number'];
$phone = $_SESSION['phone'];
// $res1 = $_SESSION['res'];
// $res = unserialize($res1);
?>

<body style=" margin: 0; height:100%">
    <?php
    if ($result == "失败" || $result == "") {
        echo "<script> alert('请先进行登录!');parent.location.href='../index.php'; </script>";
    }
    ?>

    <?php
    if ($result == "成功2") {
    ?>

        <div class="top" style="height: 54px;background-color: #D22E2E;  display: flex; width: 100%;background-color: #D22E2E;align-items: center;justify-content: space-between;">
            <div class="logo">
                <img src="../images/logo.png" alt="" class="logoImage" style="width: 148px;height: 32px; padding-left:12px;cursor:pointer;" onclick="logoImage()">
            </div>

            <div style="width: 450px;">
                <marquee loop="infinite"><span class="schoolMotto" style=" font-size: 20px;font-family:Microsoft YaHei;letter-spacing: 22px;color: white;padding-bottom: 40px;">德学并举&nbsp&nbsp知行合一</span></marquee>
            </div>
            <div class="signIn" style="width:80px;display:flex">
                <img src="../images/student.png" alt="" style="height: 20px;width:20px;padding-right:0px">
                <a href="../signIn/signOut.php" style="text-decoration: none; color:aliceblue;font-size:12px;">退出</a>
            </div>
        </div>
        <!-- 控制列表 -->
        <div class="all" style="display: flex;height: 92.5%;">
            <div class="list" style="display:block; width: 200px; height: 100%; overflow-x: hidden;  background-color: #EFEFEF;">
                <div class="listButton" style="padding-bottom:30px;color: #fff;">
                    <input type="button" value="我的课表" style="border: 0;width:200px;height:60px;outline:none;" onclick="scheduleArrangement()">
                </div>
                <div class="listButton">
                    <input type="button" value="个人中心" style="border: 0;width:200px;height:60px;outline:none;" onclick="personalCenter()">
                </div>
            </div>
            <div>
                <!-- 默认显示 -->
                <div class="default" style="display: flex;justify-content: center ; padding-left:450px" id="default">
                    <span style=" padding: 50px;">----------欢迎<?php echo "$name$identity" ?>使用----------</span><br />
                </div>
                <!-- 课表安排 -->
                <div style="display: none; padding:100px" class="scheduleArrangement" id="scheduleArrangement">

                </div>
                <!-- 个人中心 -->
                <div style="display: none; padding-left:500px;padding-top:100px" class="personalCenter" id="personalCenter">
                    <!-- 信息展示 -->
                    <div>
                        <li style="padding: 20px;">姓名:<?php echo "$name" ?></li><br>
                        <li style="padding: 20px;">账号:<?php echo "$number" ?></li><br>
                        <li style="padding: 20px;">手机号:<?php echo "$phone" ?></li><br>
                    </div>
                    <!-- 修改信息 -->
                    <div>
                        <form action="name.php" method="POST" style="padding-bottom: 25px;">
                            <span>修改昵称:</span> <input type="text" name="newName" placeholder="请输入新昵称">
                            <button type="submit" style="margin-left: 2s0px;" name="submit1">修改</button>
                        </form>
                        <form action="phone.php" method="POST" style="padding-bottom: 25px;">
                            <span>换手机号:</span> <input type="text" name="newPhone" placeholder="请输入新手机号">
                            <button type="submit" style="margin-left: 2s0px;" name="submit2">修改</button>
                        </form>
                        <form action="password.php" method="POST" style="padding-bottom: 25px;">
                            <span>修改密码:</span> <input type="text" name="newPassword" placeholder="请输入新密码">
                            <button type="submit" style="margin-left: 2s0px;" name="submit3">修改</button>
                        </form>
                    </div>
                </div>
            </div>

        <?php
    }

        ?>
        <?php
        if ($result == "成功1") {
            echo "<script> alert('你没有权限访问学生主页!');parent.location.href='../index.php'; </script>";
        }
        ?>

        <script>
            function logoImage() {
                window.location.href = "https://www.chu.edu.cn/"
            }

            function personalCenter() {
                var ele2 = document.getElementById("personalCenter");
                ele2.style.display = "block";
                var ele3 = document.getElementById("scheduleArrangement");
                ele3.style.display = "none";
                var ele4 = document.getElementById("default");
                ele4.style.display = "none";
            }

            function scheduleArrangement() {
                var ele2 = document.getElementById("personalCenter");
                ele2.style.display = "none";
                var ele3 = document.getElementById("scheduleArrangement");
                ele3.style.display = "block";
                var ele4 = document.getElementById("default");
                ele4.style.display = "none";
            }
        </script>

</body>

</html>