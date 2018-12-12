<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.bootcss.com/twitter-bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet">
    <title>查看留言</title>
</head>

<body>
    <div class="container" style="margin-bottom:100px;">
        <form>

            <div class="form-group">
                <label for="content">留言板<small>[内容]</small></label>
                <textarea type="text" id="content" class="form-control">
                    <?php echo ($data['content']); ?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="mobilephone">留言者<small>[电话]</small></label>
                <input type="text" id="mobilephone" value="<?php echo ($data['mobilephone']); ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">留言者<small>[邮箱]</small></label>
                <input type="text" id="email" value="<?php echo ($data['email']); ?>" class="form-control">
            </div>

            <a href="<?php echo U('index');?>" class="btn btn-default">返回</a>
        </form>
    </div>

</body>

</html>