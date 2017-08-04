<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:49:"D:\wamp64\www\RBAC/app/home\view\login\index.html";i:1501654506;}*/ ?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Amaze UI Admin index Examples</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="__HOME__/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="__HOME__/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="__HOME__/css/amazeui.min.css" />
    <link rel="stylesheet" href="__HOME__/css/admin.css">
    <link rel="stylesheet" href="__HOME__/css/app.css">
</head>

<body data-type="login">
    <div class="am-g myapp-login">
        <div class="myapp-login-logo-block  tpl-login-max">
            <div class="myapp-login-logo-text">
                <div class="myapp-login-logo-text">
                    Amaze UI<span> Login</span> <i class="am-icon-skyatlas"></i>
                </div>
            </div>
            <div class="login-font">
                <i>Log In </i> or <span> Sign Up</span>
            </div>
            <div class="am-u-sm-10 login-am-center">
                <form class="am-form" id="loginForm">
                    <fieldset>
                        <div class="am-form-group">
                            <input type="text" name="email" placeholder="输入电子邮箱">
                        </div>
                        <div class="am-form-group">
                            <input type="password" name="pwd" placeholder="密码">
                        </div>
                        <p>
                            <button class="am-btn am-btn-default" id="postLogin">登录</button>
                        </p>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <!-- 弹窗 -->
    <div class="am-modal am-modal-no-btn" tabindex="-1" id="isModal">
        <div class="am-modal-dialog">
            <div class="am-modal-hd">
                <span id="tip-h"></span>
                <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
            </div>
            <div class="am-modal-bd"></div>
            <div class="am-modal-footer">
                <span class="am-modal-btn">确定</span>
            </div>
        </div>
    </div>
    <!-- end 弹窗 -->
    <script src="__HOME__/js/jquery-3.2.1.min.js"></script>
    <script src="__HOME__/js/amazeui.min.js"></script>
    <script src="__HOME__/js/public.js"></script>
    <script src="__HOME__/js/app.js"></script>
</body>

</html>