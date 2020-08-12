<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>注册页面</title>
    <link rel="icon" href="../images/icon.png">
    <link rel="stylesheet" href="./index.css">
</head>
<!-- 注册页面 -->

<body>
    <!-- 用户注册信息录取 -->
    <div class="all" style="background-color: rgba(255, 255, 255, .7);">
        <form action="userInformation.php" method="POST">
            <div style="overflow: hidden；">
                <img src="../images/signTop.png" alt="" style="width: 339px; height:110px;margin-bottom:20px;">
            </div>
            <div class="number">
                    <text>昵称:<text /><input type="text" name="name" placeholder="请输入昵称" style="width: 200px; padding:4px 12px; margin:0px 5px 5px 5px"><br />
                    <text>账号:</text><input type="text" name="number" placeholder="请输入账号" style="width: 200px; padding:4px 12px; margin:5px"> <br />
                    <text>密码:</text><input type="password" name="password" placeholder="请设置密码" style="width: 200px; padding:4px 12px; margin:5px"> <br />
                    <text>确认:</text><input type="password" name="againPassword" placeholder="请再次输入密码" style="width: 200px; padding:4px 12px; margin:5px"><br />
                    <text>手机:</text><input type="text" name="phone" placeholder="请设置手机号" style="width: 200px; padding:4px 12px; margin:5px"> <br />
                    <text>身份:</text>
                    <input type="radio" name="identity" id="radio" value="老师" />老师
                    <input type="radio" name="identity" id="radio" value="同学" />同学
                    <div class="button">
                        <input type="submit" value="注册" name="submit" class="signButton">
                    </div>
            </div>
        </form>
    </div>
</body>

</html>