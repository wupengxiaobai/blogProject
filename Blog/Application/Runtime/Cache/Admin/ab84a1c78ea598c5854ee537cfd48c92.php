<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>管理员添加</title>
    <link href="https://cdn.bootcss.com/twitter-bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet">
</head>
<body>
    <div class="container" style="margin-bottom:100px;margin-top:100px;">
        <form action="" method="POST">
            <div class="form-group">
                <label for="role_name">角色名称</label>
                <input type="text" class="form-control" name="role_name" id="role_name">
            </div>
            
            <input type="submit" class="btn btn-success" value="添加角色" />
        </form>
    </div>
</body>
</html>