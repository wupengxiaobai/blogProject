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

            <?php if(is_array($skills)): $i = 0; $__LIST__ = $skills;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="form-group">
                    <label for="<?php echo ($vo["skillname"]); ?>"><?php echo ($vo["skillname"]); ?><small></small></label>
                    <input type="text" name="<?php echo ($vo["skillname"]); ?>" class="form-control" id="<?php echo ($vo["skillname"]); ?>" value="<?php echo ($vo["grade"]); ?>" placeholder="请输入<?php echo ($vo["skillname"]); ?>值">
                </div><?php endforeach; endif; else: echo "" ;endif; ?>

            <button type="submit" class="btn btn-info">技能值修改</button>
            <button type="button" class="btn btn-default" onclick="window.history.go(-1)">返回</button>
        </form>

    </div>

</body>

</html>