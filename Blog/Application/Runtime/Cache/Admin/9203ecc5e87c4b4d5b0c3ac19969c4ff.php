<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.bootcss.com/twitter-bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet">
    <title>慢生活修改</title>
</head>

<body>
    <div class="container" style="margin-bottom:100px;">
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo ($data['id']); ?>">
            <div class="form-group">
                <label for="title">生活 <small>[标题]</small></label>
                <input type="text" name="title" class="form-control" id="title" value="<?php echo ($data['title']); ?>" placeholder="请输入生活标题">
            </div>

            <div class="form-group">
                <label for="author">作者 <small></small></label>
                <input type="text" name="author" id="author" class="form-control" value="<?php echo ($data['author']); ?>" />
            </div>

            <div class="form-group">
                <label for="content">生活 <small>[内容]</small></label>
                <textarea id="editor" type="text" name="content" id="content" placeholder="请输入生活内容">
                    <?php echo ($data['content']); ?>
                </textarea>
            </div>

            <div class="form-group">
                <label for="content">生活 <small>[类别]</small></label>
                <select name="category_id" class="form-control">
                    <option value="0">--请选择类别--</option>
                    <?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"<?php if($vo['id'] == $data['category_id'] ): ?>selected<?php endif; ?> ><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="content">生活 <small>[置顶]</small></label>
                <select name="istop" class="form-control">
                    <option value="0"<?php if(0 == $data['istop'] ): ?>selected<?php endif; ?>>不置顶</option>
                    <option value="1"<?php if(1 == $data['istop'] ): ?>selected<?php endif; ?>>置顶</option>
                </select>
            </div>

            <div class="form-group">
                <label for="picture">选择生活封面照 <small>[不上传默认不修改]</small></label>
                <input type="file" id="picture" name="picture">
            </div>

            <input type="submit" class="btn btn-success" value="修改" />
            &nbsp;&nbsp;<input type="reset" class="btn btn-warning" value="重置" />
            &nbsp;&nbsp;<input type="button" class="btn btn-default" onClick='window.history.go(-1)' value="返回" />

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