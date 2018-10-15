<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="author" content="order by dede58.com"/>
    <title>用户注册</title>
    <link rel="stylesheet" type="text/css" href="./css/login.css">

</head>
<body>
<form  method="post" action="email_reg_in">
    {{csrf_field()}}
    <div class="regist">
        <div class="regist_center">
            <div class="regist_top">
                <div class="left fl">会员注册</div>
                <div class="right fr"><a href="shopindex" target="_self">小米商城</a></div>
                <div class="clear"></div>
                <div class="xian center"></div>
                <a href="reg">邮箱注册</a>
            </div>
            <div class="regist_main center">
                <div class="username">用&nbsp;&nbsp;户&nbsp;&nbsp;名:&nbsp;&nbsp;<input class="shurukuang" type="text" name="username" placeholder="请输入你的用户名"/><span>请不要输入汉字</span></div>
                <div class="username">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码:&nbsp;&nbsp;<input class="shurukuang" type="password" name="password" placeholder="请输入你的密码"/><span>请输入6位以上字符</span></div>

                <div class="username">确认密码:&nbsp;&nbsp;<input class="shurukuang" type="password" name="repassword" placeholder="请确认你的密码"/><span>两次密码要输入一致哦</span></div>
                <div class="username">邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;箱:&nbsp;&nbsp;<input class="shurukuang" type="text" name="email" placeholder="请填写正确的邮箱"/><span>填写下邮箱吧，方便我们联系您！</span></div>
                <div class="username">
                    <div class="left fl">验&nbsp;&nbsp;证&nbsp;&nbsp;码:&nbsp;&nbsp;<input id="captcha"  class="yanzhengma" type="captcha" name="captcha" value="{{old('captcha')}}" placeholder="请输入验证码" required>
                        @if($errors->has('captcha'))
                            <div class="col-md-12">
                                <p class="text-danger text-left"><strong>{{$errors->first('captcha')}}</strong></p>
                            </div>
                        @endif</div>
                    <div class="right fl"><img src="{{captcha_src()}}" style="cursor: pointer" onclick="this.src='{{captcha_src()}}'+Math.random()"></div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="regist_submit">
                <input class="submit" type="submit" value="立即注册" >
            </div>

        </div>
    </div>
</form>
</body>
</html>