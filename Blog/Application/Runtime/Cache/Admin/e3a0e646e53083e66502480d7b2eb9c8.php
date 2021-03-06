<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.bootcss.com/twitter-bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet">
    <title>编辑</title>
</head>

<body>
    <div class="container" style="margin-bottom:100px;">
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo ($data['id']); ?>" />

            <div class="form-group">
                <label for="content">碎言碎语 <small>[内容]</small></label>
                <textarea id="editor" type="text" name="content" id="content" placeholder="请输入碎言/语">
                    <?php echo ($data['content']); ?>
                </textarea>
            </div>

            <div class="form-group">
                <label for="content">碎言碎语 <small>[置顶]</small></label>
                <select name="istop" class="form-control">
                    <option value="0"<?php if($data['istop'] == 0): ?>selected<?php endif; ?>>不置顶</option>
                    <option value="1"<?php if($data['istop'] == 1): ?>selected<?php endif; ?>>置顶</option>
                </select>
            </div>

            <div class="form-group">
                <label for="picture">选择碎言/语封面照 <small>[不选择则不作修改]</small></label>
                <input type="file" id="picture" name="picture">
            </div>

            <input type="submit" class="btn btn-success" value="修改碎言/语" />
            <input type="button" onClick='window.history.go(-1)' class="btn btn-default" value="返回" />

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