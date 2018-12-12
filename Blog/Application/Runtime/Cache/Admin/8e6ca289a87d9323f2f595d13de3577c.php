<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>赋权</title>
    <link href="https://cdn.bootcss.com/twitter-bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet">
</head>

<body>

    <div class="panel panel-default">
        <div class="panel-heading">角色赋权</div>
        <!-- Table -->
        <div class="panel-body">请选择要赋予 <span style="color:darkmagenta;font-size:22px;font-weight: bold;"><?php echo ($role['role_name']); ?></span>
            的权限</div>
        <form action="" method="POST">
            <input type="hidden" name="role_id" value="<?php echo ($role['id']); ?>">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 45px;text-align: center;">选择</th>
                        <th>权限名称</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td style="width: 45px;text-align: center;">
                                <input type="checkbox" name="rule[]" value="<?php echo ($vo["id"]); ?>" <?php if(in_array($vo['id'],$ids)): ?>checked<?php endif; ?> >
                            </td>
                            <td style="text-align:left;text-indent:20px;">|<?php echo (str_repeat('----',$vo["level"])); echo ($vo["rule_name"]); ?></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                    <tr>
                        <td>
                            <input type="submit" value="提交" class="btn btn-info">
                        </td>
                        <td>
                            <input type="button" value="返回" class="btn btn-default" onClick='window.history.go(-1)'>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

</body>

</html>