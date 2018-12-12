<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>管理员修改</title>
    <link href="https://cdn.bootcss.com/twitter-bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet">
</head>

<body>
    <div class="container" style="margin-bottom:100px;margin-top:100px;">
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo ($data['id']); ?>">
            <div class="form-group">
                <label for="username">管理员名称</label>
                <input type="text" class="form-control" value="<?php echo ($data['username']); ?>" name="username" id="username">
            </div>

            <div class="form-group">
                <label for="password">密码</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>

            <div class="form-group">
                <label for="role_id">权限</label>
                <select type="role_id" class="form-control" name="role_id" id="role_id">
                    <?php if(is_array($roles)): $i = 0; $__LIST__ = $roles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['id']); ?>"<?php if($data['role_id'] == $vo['id']): ?>selected<?php endif; ?>><?php echo ($vo['role_name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>

            <input type="submit" class="btn btn-success" value="修改管理员" />

        </form>
    </div>
</body>

</html>