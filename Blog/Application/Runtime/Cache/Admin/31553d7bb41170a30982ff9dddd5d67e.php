<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.bootcss.com/twitter-bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="container" style="margin-bottom:100px;">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">类别名称 <small>[中文]</small></label>
                <input type="text" class="form-control" name="name" id="name">
            </div>

            <div class="form-group">
                <label for="enname">类别名称 <small>[英文]</small></label>
                <input type="text" class="form-control" name="enname" id="enname">
            </div>

            <div class="form-group">
                <label>类别所属父级 <small>[父级类别]</small></label>
                <select name="pid" class="form-control">
                    <option value="3">慢生活</option>
                    <option value="5">学无止境</option>
                </select>
            </div>

            <div class="form-group">
                <label for='desc'>描述 <small>[类别描述]</small></label>
                <input type="text" class="form-control" name="desc" id="desc">
            </div>

            <input type="submit" class="btn btn-success" value="添加类别" />

        </form>
    </div>

    <script src="/Public/plugin/ueditor/ueditor.config.js"></script>
    <script src="/Public/plugin/ueditor/ueditor.all.min.js"></script>
    <script src="/Public/plugin/ueditor/lang/zh-cn/zh-cn.js"></script>
    <script>
        var ed = UE.getEditor('editor', {
            //  取消自动保存
            enableAutoSave: false
        });
    </script>
</body>

</html>