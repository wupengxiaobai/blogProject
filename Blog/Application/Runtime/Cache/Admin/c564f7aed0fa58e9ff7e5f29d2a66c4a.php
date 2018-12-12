<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>简历的技能评价修改</title>
    <link href="https://cdn.bootcss.com/twitter-bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet">
</head>

<body>

    <div class="container" style="padding-bottom:50px;">
        <form action="" method="POST">

            <?php if(is_array($experience)): $key = 0; $__LIST__ = $experience;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><div class="form-group">
                    <label>修改经历<?php echo ($key); ?><small></small></label>
                    <input type="text" name="time<?php echo ($key); ?>" class="form-control" value="<?php echo ($vo["time"]); ?>" placeholder="请输入时间"><br>
                    <textarea type="text" name="content<?php echo ($key); ?>" class="form-control" placeholder="请输入经历的描述"><?php echo ($vo["content"]); ?></textarea>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>

            <button type="submit" class="btn btn-info">经历修改</button>
            <button type="button" class="btn btn-default" onclick="window.history.go(-1)">返回</button>
        </form>

    </div>

</body>

</html>