<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>权限添加</title>
    <link href="https://cdn.bootcss.com/twitter-bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet">
</head>

<body>
    <div class="container" style="margin-bottom:100px;margin-top:100px;">
        <form action="" method="POST">
            <div class="form-group">
                <label for="rule_name">权限名称</label>
                <input type="text" class="form-control" name="rule_name" id="rule_name">
            </div>

            <div class="form-group">
                <label for="module_name">权限模型</label>
                <input type="text" class="form-control" name="module_name" id="module_name">
            </div>

            <div class="form-group">
                <label for="controller_name">控制器名称</label>
                <input type="text" class="form-control" name="controller_name" id="controller_name">
            </div>

            <div class="form-group">
                <label for="action_name">方法名称</label>
                <input type="text" class="form-control" name="action_name" id="action_name">
            </div>

            <div class="form-group">
                <label for="parent_id">上级权限</label>
                <select type="text" class="form-control" name="parent_id" id="parent_id">
                    <option value="0">|顶级权限</option>
                    <?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>">|<?php echo (str_repeat('--',$vo["level"])); echo ($vo["rule_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>


            <div class="form-group">
                <label for="is_show">是否显示于导航</label>
                <select type="text" class="form-control" name="is_show" id="is_show">
                    <option value="1">是</option>
                    <option value="0">否</option>
                </select>
            </div>

            <input type="submit" class="btn btn-success" value="添加权限" />

        </form>
    </div>
</body>

</html>