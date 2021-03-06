<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="author" content="order by dede58.com"/>
    <title>会员登录</title>
    <link rel="stylesheet" type="text/css" href="./css/login.css">

</head>
<body>
<!-- login -->
<div class="top center">
    <div class="logo center">
        <a href="./index.html" target="_blank"><img src="./image/mistore_logo.png" alt=""></a>
    </div>
</div>
<form  method="post" action="login_in" class="form center">
    {{csrf_field()}}
    <div class="login">
        <div class="login_center">
            <div class="login_top">
                <div class="left fl">会员登录</div>
                <div class="right fr">您还不是我们的会员？<a href="reg" target="_self">立即注册</a></div>
                <div class="clear"></div>
                <div class="xian center"></div>
            </div>
            <div class="login_main center">
                <div class="username">登录账号:<input class="shurukuang" type="text" name="accountNumber" placeholder="请输入你的用户名/邮箱/手机号"/></div>
                <div class="username">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码:&nbsp;<input class="shurukuang" type="password" name="password" placeholder="请输入你的密码"/></div>
                <div class="username">

                    <div class="left fl">验&nbsp;&nbsp;证&nbsp;&nbsp;码:&nbsp;<input id="captcha"  class="yanzhengma" type="captcha" name="captcha" value="{{old('captcha')}}" placeholder="请输入验证码" required>@if($errors->has('captcha'))
                            <div class="col-md-12">
                                <p class="text-danger text-left"><strong>{{$errors->first('captcha')}}</strong></p>
                            </div>
                        @endif</div>
                    <div class="right fl"><img src="{{captcha_src()}}" style="cursor: pointer" onclick="this.src='{{captcha_src()}}'+Math.random()"></div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="login_submit">
                <input class="submit" type="submit" value="立即登录" >
            </div>

        </div>
    </div>
</form>
<footer>
    <div class="copyright">简体 | 繁体 | English | 常见问题</div>
    <div class="copyright">小米公司版权所有-京ICP备10046444-<img src="./image/ghs.png" alt="">京公网安备11010802020134号-京ICP证110507号</div>

</footer>
</body>
</html>