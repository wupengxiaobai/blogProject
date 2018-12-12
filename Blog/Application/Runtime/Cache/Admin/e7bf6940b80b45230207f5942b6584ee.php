<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.bootcss.com/twitter-bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet">
    <title>个人信息修改</title>
</head>

<body>
    <div class="container" style="margin-bottom:100px;">
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo ($data['id']); ?>">
            <input type="hidden" name="type" value="<?php echo ($data['type']); ?>">
            <!-- <input type="hidden" name="admin_id" value="<?php echo ($data['admin_id']); ?>"> -->
            <div class="form-group">
                <label for="nickname">昵称 <small>[请输入新昵称]</small></label>
                <input type="nickname" class="form-control" name="nickname" id="nickname" value="<?php echo ($data['nickname']); ?>" />
            </div>

            <!-- <div class="form-group">
                <label for="password">密码 <small>[请输入新密码]</small></label>
                <input type="password" class="form-control" name="password" id="password" value="<?php echo ($data['password']); ?>" />
            </div> -->

            <div class="form-group">
                <label for="picture">选择头像 <small>[不上传默认不修改]</small></label>
                <input type="file" id="picture" name="avatar">
            </div>

            <input type="submit" class="btn btn-success" value="保存个人信息" />

        </form>
    </div>

</body>

</html>