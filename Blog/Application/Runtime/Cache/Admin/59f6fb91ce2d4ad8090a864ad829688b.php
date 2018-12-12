<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.bootcss.com/twitter-bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet">
    <title>学无止境</title>
</head>

<body>
    <div class="container" style="margin-bottom:100px;">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">学无止境 <small>[标题]</small></label>
                <input type="text" name="title" class="form-control" id="title" placeholder="请输入标题">
            </div>

            <div class="form-group">
                <label for="author">作者 <small></small></label>
                <input type="text" name="author" id="author" class="form-control" value="<?php echo ($_SESSION['login_msg']['nickname']); ?>" />
            </div>

            <div class="form-group">
                <label for="description">学无止境 <small>[描述]</small></label>
                <input type="text" name="description" id="description" class="form-control" placeholder="请输入描述" />
            </div>

            <div class="form-group">
                <label for="content">学无止境 <small>[内容]</small></label>
                <textarea id="editor" type="text" name="content" id="content" placeholder="请输入内容"></textarea>
            </div>

            <div class="form-group">
                <label for="content">学无止境 <small>[类别]</small></label>
                <select name="category_id" class="form-control">
                    <option value="0">--请选择类别--</option>
                    <?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="content">学无止境 <small>[置顶]</small></label>
                <select name="istop" class="form-control">
                    <option value="0">不置顶</option>
                    <option value="1">置顶</option>
                </select>
            </div>

            <div class="form-group">
                <label for="picture">选择学无止境封面照 <small>[不选择文件不上传]</small></label>
                <input type="file" id="picture" name="picture">
            </div>

            <input type="submit" class="btn btn-success" value="添加到学无止境" />

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