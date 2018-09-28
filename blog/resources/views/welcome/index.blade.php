<html>
<head>
    <title>Hello World</title>
</head>
<body>
<div>
    <h1>Hello World</h1>
    <a href="add-form">添加</a>
    @foreach ($data as $vo)
        <p>{{ $vo->id }}--------{{ $vo->username }} <a href="del?id={{ $vo->id }}">删除</a> <a href="up-form?id={{ $vo->id }}">修改</a></p>
    @endforeach
</div>
</body>
</html>