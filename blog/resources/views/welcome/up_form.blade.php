<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<center>
    <h3>修改表单</h3>
    <form action="up" method="post">
        {{csrf_field()}}
        {{--{{csrf_token()}}--}}
        <table>
            <input type="hidden" name="id" value="<?php echo $data->id?>">
            <tr>
                <td>用户名</td>
                <td><input type="text" name="username" value="<?php echo $data->username?>"></td>
            </tr>
            <tr>
                <td><input type="submit" value="修改"></td>
            </tr>
        </table>
    </form>
</center>
</body>
</html>