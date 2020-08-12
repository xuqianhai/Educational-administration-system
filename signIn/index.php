<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登录系统</title>
    <link rel="icon" href="../images/icon.png">
    <link rel="stylesheet" href="./index.css">
</head>
<!-- 登录界面 -->

<body>
    <div class="all" style="background-color: rgba(255, 255, 255, .7);">
        <form action="userInformation.php" method="POST">
            <div style="overflow: hidden；">
                <img src="../images/signTop.png" alt="" style="width: 339px; height:110px;margin-bottom:20px;">
            </div>
            <div class="content">
                <div class="number">
                    <img src="../images/number.png" alt="" style="width: 20px;height:20px;padding-right:10px;border: 2 solid;">
                    <input type="text" name="number" placeholder="请输入用户名" style="width: 200px; padding:8px 12px;"> <br />
                </div>
                <div class="password">
                    <img src="../images/password.png" alt="" style="width:20px;height:20px;padding-right:10px;border: 2 solid;">
                    <input type="password" name="password" placeholder="请输入密码" style=" width: 200px;  padding:8px 12px;"> <br />
                </div>
                <div style="display: flex; flex-direction:row-reverse">
                    <a href="../register/index.php"><span style="color: #0b92ec;">注册?</span></a>
                </div>

                <div class="button">
                    <input type="submit" value="登录" name="submit" class="signButton">
                </div>
            </div>
        </form>
    </div>

</body>

</html>