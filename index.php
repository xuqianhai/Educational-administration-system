<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>巢湖学院教务系统</title>
    <link rel="stylesheet" href="./index.css">
    <link rel="icon" href="./images/icon.png">
</head>

<body class="body" style=" margin: 0;height:40px" >
    <?php session_start();
    $name = $_SESSION['name'];
    $identity = $_SESSION['identity'];
    $result = $_SESSION['result'];
    ?>
    <!-- 顶部 -->
    <div class="top" style="height: 54px;">
        <div class="logo">
            <img src="./images/logo.png" alt="" class="logoImage" style="width: 148px;height: 32px; padding-left:12px;cursor:pointer;" onclick="logoImage()">
            <!-- <img src="./images/index.png" alt="" style="height: 20px;width:20px">
            <img src="./images/Interface.png" alt="" style="height: 20px;width:20px"> -->
        </div>

        <div>
            <marquee loop="infinite"><span class="schoolMotto" style=" font-size: 20px;font-family:  Microsoft YaHei;">德学并举&nbsp&nbsp知行合一</span></marquee>
        </div>
    
        <!-- 选择展示 -->
        <!-- <div style="display:none" id="signIn"> -->
        <?php
        if ($result == "失败" || $result == "") {
        ?>
            <div class="signIn" style="width:80px;">
                <img src="./images/sign.png" alt="" style="height: 20px;width:20px">
                <a href="./signIn/index.php" style="text-decoration: none; color:aliceblue;font-size:12px">登录</a>
            </div>
        <?php
        }
        ?>
        <?php
        if ($result == "成功1") {
        ?>
            <div class="signIn" style="width:80px;">
                <img src="./images/teacher.png" alt="" style="height: 20px;width:20px;padding-right:10px">
                <a href="./teacher/index.php" style="text-decoration: none; color:aliceblue;font-size:12px;">个人中心</a>
                <a href="./signIn/signOut.php" style="text-decoration: none; color:aliceblue;font-size:12px;">退出</a>
            </div>
        <?php
        }
        ?>
        <?php
        if ($result == "成功2") {
        ?>
            <div class="signIn" style="width:80px;">
                <img src="./images/student.png" alt="" style="height: 20px;width:20px;padding-right:10px">
                <a href="./student/index.php" style="text-decoration: none; color:aliceblue;font-size:12px">个人中心</a>
                <a href="./signIn/signOut.php" style="text-decoration: none; color:aliceblue;font-size:12px;">退出</a>
            </div>
        <?php
        }
        ?>
        <!-- </div> -->
    </div>
    <!-- 内容部分 -->
    <div class="content" style=" display: flex;justify-content: center;align-items: center;flex-direction: column">
        <h3 style="color: white; font-size:38px">巢湖学院教务系统</h3>
        <span style=" padding-bottom: 50px;">Chaohu University</span>
        <?php
        if ($result == "成功1") {
        ?>
            <button class="signInButton" style="width: 240px;height: 48px;cursor:pointer;padding-bottom:0px" onclick="signInButton1()">个&nbsp人&nbsp中&nbsp心</button>
            <span style=" padding: 50px;">----------欢迎<?php echo "$name$identity" ?>使用----------</span>
        <?php
        }
        ?>
        <?php
        if ($result == "成功2") {
        ?>
            <button class="signInButton" style="width: 240px;height: 48px;cursor:pointer;padding-bottom:0px" onclick="signInButton2()">个&nbsp人&nbsp中&nbsp心</button>
            <span style=" padding: 50px;">----------欢迎<?php echo "$name$identity" ?>使用----------</span>
        <?php
        }
        ?>

        <?php
        if ($result == "失败" || $result == "") {
        ?>
            <button class="signInButton" style="width: 240px;height: 48px;cursor:pointer;padding-bottom: 0px;" onclick="signInButton3()">登&nbsp录&nbsp&nbsp Login</button>
        <?php
        }
        ?>
    </div>
    <!-- 页脚部分 -->
    <div class="footer">
        <footer style="color:white;font-size:13px">版权信息：© 2020 作者:大海</footer>
    </div>


    <script>
        function logoImage() {
            window.location.href = "https://www.chu.edu.cn/"
        }

        function signInButton3() {
            window.location.href = "./signIn/index.php"
        }

        function signInButton2() {
            window.location.href = "./student/index.php"
        }

        function signInButton1() {
            window.location.href = "./teacher/index.php"
        }

        // document.getElementById("signIn").style.display = "block";
    </script>

</body>

</html>