<!DOCTYPE html>
<html lang="en" id="html" style="height: 100%;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>教师主页</title>
    <link rel="icon" href="../images/teacher.png">
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
    if ($result == "成功1") {
    ?>
        <div class="top" style="height: 54px;background-color: #D22E2E;  display: flex; width: 100%;background-color: #D22E2E;align-items: center;justify-content: space-between;">
            <div class="logo">
                <img src="../images/logo.png" alt="" class="logoImage" style="width: 148px;height: 32px; padding-left:12px;cursor:pointer;" onclick="logoImage()">
            </div>

            <div style="width: 450px;">
                <marquee loop="infinite"><span class="schoolMotto" style=" font-size: 20px;font-family:Microsoft YaHei;letter-spacing: 22px;color: white;padding-bottom: 40px;">德学并举&nbsp&nbsp知行合一</span></marquee>
            </div>
            <div class="signIn" style="width:80px;display:flex">
                <img src="../images/teacher.png" alt="" style="height: 20px;width:20px;padding-right:10px">
                <a href="../signIn/signOut.php" style="text-decoration: none; color:aliceblue;font-size:12px;">退出</a>
            </div>
        </div>


        <!-- 控制列表 -->
        <div class="all" style="display: flex;height: 92.5%;">
            <div class="list" style="display:block; width: 200px; height: 100%; overflow-x: hidden;  background-color: #EFEFEF;">
                <div class="listButton" style="padding-bottom:30px;color: #fff;">
                    <input type="button" value="添加学生" style="border: 0;width:200px;height:60px;outline:none;" onclick="addStudent()">
                </div>
                <div class="listButton" style="padding-bottom:30px;color: #fff;">
                    <input type="button" value="学生列表" style="border:0;width:200px;height:60px;outline:none;" onclick="studentAdministration()">
                </div>
                <div class="listButton" style="padding-bottom:30px;color: #fff;">
                    <input type="button" value="课表安排" style="border: 0;width:200px;height:60px;outline:none;" onclick="scheduleArrangement()">
                </div>
                <div class="listButton">
                    <input type="button" value="个人中心" style="border: 0;width:200px;height:60px;outline:none;" onclick="personalCenter()">
                </div>
            </div>


            <!-- 可选项 -->
            <div class="content">
                <!-- 默认显示 -->
                <div class="default" style="display: flex;justify-content: center ; padding-left:450px" id="default">
                    <span style=" padding: 50px;">----------欢迎<?php echo "$name$identity" ?>使用----------</span><br />
                </div>
                <!-- 添加学生 -->
                <div style="display: none;padding:100px" class="addStudent" id="addStudent">
                    <div class="table">
                        <table class="thead" style="border: 1px solid red;">
                            <div class="caption">
                                <caption style="font-size: 25px;font-weight:bold">添加学生</caption>
                            </div>
                            <div class="thead">
                                <thead>
                                    <tr>
                                        <th>姓名</th>
                                        <th>性别</th>
                                        <th>账号</th>
                                        <th>班级</th>
                                        <th>手机号</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                            </div>
                            <div class="tbody">
                                <form action="userinformation.php" method="POST">
                                    <tr>
                                        <td style="padding: 20px"><input type="text" name="name" placeholder="&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp请输入姓名"></td>
                                        <td style="padding: 20px"><input type="radio" name="sex" placeholder="请输入性别" value="男">男
                                            <input type="radio" name="sex" placeholder="请输入性别" value="女">女</td>
                                        <td style="padding: 20px"><input type="text" name="number" placeholder="&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp请输入账号"></td>
                                        <td style="padding: 20px"><input type="text" name="class" placeholder="&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp请输入班级"></td>
                                        <td style="padding: 20px"><input type="text" name="phone" placeholder="&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp请输入手机号"></td>
                                        <td><input type="submit" name="submit" value="添加" class="submitButton" style="border-style:outset ;padding: 20px;color: #13ce66;background: #e7faf0; border-color: #a1ebc2;border-radius:20px;"></td>
                                    </tr>
                                </form>
                            </div>
                        </table>
                    </div>
                </div>
                <!-- 学生管理 -->

                <div style="display: none; padding-left:300px;padding-top:50px" class="studentAdministration" id="studentAdministration">
                    <div class="selectButton" style="padding-left:220px;padding-bottom:30px">
                        <form action="selectClass.php" method="post">
                            <span style="padding-right: 10px;">班级:</span>
                            <input type="text" placeholder="请输入查询的班级" name="selectClass">
                            <input type="submit" value="查询" name="submit" style="margin: 20px;">
                        </form>
                    </div>
                    <table style="border: 2px solid red;width:700px; ">
                        <tr>
                            <td colspan="5" align="center" style="border-bottom:1px solid red;font-size:26px;font-weight:700px">学生管理</td>
                        </tr>

                        <th>姓名</th>
                        <th style="border-left:1px solid red;">班级</th>
                        <th style="border-left:1px solid red;">性别</th>
                        <th style="border-left:1px solid red;">手机</th>
                        <th style="border-left:1px solid red;">操作</th>
                        </tr>
                        <?php if (is_array($res)) {
                            foreach ($res as $k => $value) {
                        ?>
                                <tr align="center">
                                    <td><?php echo $value["name"]; ?></td>
                                    <td><?php echo $value["class"]; ?></td>
                                    <td><?php echo $value["sex"]; ?></td>
                                    <td><?php echo $value["phone"]; ?></td>
                                    <td>
                                        <a href="deleteStudend.php?phone=<?php echo $value["phone"]; ?>,name=<?php echo $value["name"]; ?>" onclick="return confirm('是否确定删除?')">删除</a>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                    </table>
                </div>

                <!-- 课表安排 -->
                <div style="display: none; padding:100px" class="scheduleArrangement" id="scheduleArrangement">

                </div>
                <!-- 个人中心 -->
                <div style="display: none; padding:100px" class="personalCenter" id="personalCenter">
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
        </div>


    <?php
    }

    ?>
    <?php
    if ($result == "成功2") {
        echo "<script> alert('你没有权限访问教师主页!');parent.location.href='../index.php'; </script>";
    }
    ?>

    <script>
        // 获取html元素的高度
        //  *每次发生窗口大小改变，就获取html的高度。可以发现html的高度随着窗口可用区的高度增大而增大，减小而减小。


        window.onload = function() {

            window.onresize = function() {
                var oHtml = document.getElementsByTagName('html')[0];
                var Htmlheight = oHtml.offsetHeight;
            }
        }

        function logoImage() {
            window.location.href = "https://www.chu.edu.cn/"
        }


        function addStudent() {
            var ele = document.getElementById("addStudent"); //  先导航到要改的标签,注意是id
            ele.style.display = "block";
            var ele1 = document.getElementById("studentAdministration");
            ele1.style.display = "none";
            var ele2 = document.getElementById("personalCenter");
            ele2.style.display = "none";
            var ele3 = document.getElementById("scheduleArrangement");
            ele3.style.display = "none";
            var ele4 = document.getElementById("default");
            ele4.style.display = "none";
        }

        function scheduleArrangement() {
            var ele = document.getElementById("addStudent");
            ele.style.display = "none";
            var ele1 = document.getElementById("studentAdministration");
            ele1.style.display = "none";
            var ele2 = document.getElementById("personalCenter");
            ele2.style.display = "none";
            var ele3 = document.getElementById("scheduleArrangement");
            ele3.style.display = "block";
            var ele4 = document.getElementById("default");
            ele4.style.display = "none";
        }

        function personalCenter() {
            var ele = document.getElementById("addStudent");
            ele.style.display = "none";
            var ele1 = document.getElementById("studentAdministration");
            ele1.style.display = "none";
            var ele2 = document.getElementById("personalCenter");
            ele2.style.display = "block";
            var ele3 = document.getElementById("scheduleArrangement");
            ele3.style.display = "none";
            var ele4 = document.getElementById("default");
            ele4.style.display = "none";
        }

        function studentAdministration() {
            var ele = document.getElementById("addStudent");
            ele.style.display = "none";
            var ele1 = document.getElementById("studentAdministration");
            ele1.style.display = "block";
            var ele2 = document.getElementById("personalCenter");
            ele2.style.display = "none";
            var ele3 = document.getElementById("scheduleArrangement");
            ele3.style.display = "none";
            var ele4 = document.getElementById("default");
            ele4.style.display = "none";
        }
    </script>
</body>

</html>