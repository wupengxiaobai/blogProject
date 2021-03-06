<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>简历的修改</title>
    <link href="https://cdn.bootcss.com/twitter-bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet">
</head>

<body>

    <div class="container" style="padding-bottom:50px;">
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo ($data['id']); ?>">
            <h3>基础信息</h3>
            <div class="form-group">
                <label for="name">姓名 <small>[简历投递人]</small></label>
                <input type="text" name="name" class="form-control" id="name" value="<?php echo ($data['name']); ?>" placeholder="请输入姓名">
            </div>
            <div class="form-group">
                <label for="work">职业 <small>[意向职业]</small></label>
                <input type="text" name="work" class="form-control" id="work" value="<?php echo ($data['work']); ?>" placeholder="请输入意向职业">
            </div>
            <div class="form-group">
                <label for="birthday">出生 <small>[出生日期]</small></label>
                <input type="text" name="birthday" class="form-control" id="birthday" value="<?php echo ($data['birthday']); ?>" placeholder="请输入出生日期">
            </div>
            <div class="form-group">
                <label for="address">所在地 <small>[籍贯]</small></label>
                <input type="text" name="address" class="form-control" id="address" value="<?php echo ($data['address']); ?>" placeholder="请输入所在地">
            </div>
            <div class="form-group">
                <label for="email">email地址 <small>[邮箱]</small></label>
                <input type="email" name="email" class="form-control" id="email" value="<?php echo ($data['email']); ?>" placeholder="请输入邮件地址">
            </div>
            <div class="form-group">
                <label for="mobilephone">手机 <small>[mobile phone]</small></label>
                <input type="text" name="mobilephone" class="form-control" id="mobilephone" value="<?php echo ($data['mobilephone']); ?>" placeholder="请输入手机">
            </div>
            <div class="form-group">
                <label for="qq">腾讯QQ <small>[QQ号]</small></label>
                <input type="text" name="qq" class="form-control" id="qq" value="<?php echo ($data['qq']); ?>" placeholder="请输入腾讯QQ">
            </div>
            <div class="form-group">
                <label for="emotion">情感状况 <small>[emotion]</small></label>
                <input type="text" name="emotion" class="form-control" id="emotion" value="<?php echo ($data['emotion']); ?>" placeholder="请输入情感状况">
            </div>
            <hr>
            <h3>照片和描述</h3>
            <div class="form-group">
                <label for="avatar">头像 <small>[不上传则不修改]</small></label>
                <input type="file" name="avatar" id="avatar" placeholder="请选择头像上传">
            </div>
            <div class="form-group">
                <label for="desc">个人描述 <small>[desc]</small></label>
                <input type="text" name="desc" class="form-control" id="desc" value="<?php echo ($data['desc']); ?>" placeholder="请输入自我描述">
            </div>
            <hr>
            <h3>自我介绍</h3>
            <div class="form-group">
                <label for="whyme">个人描述 <small>[whyme]</small></label>
                <textarea name="whyme" id="whyme" placeholder="请输入自我描述"> <?php echo ($data['whyme']); ?> </textarea>
            </div>
            <div class="form-group">
                <label for="myself">自我评价 <small>[myself]</small></label>
                <textarea name="myself" id="myself" class="form-control" placeholder="请输入自我评价"><?php echo ($data['myself']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="sort">排序 <small>[sort]</small></label>
                <input name="sort" id="sort" type="text" class="form-control" value="<?php echo ($data['sort']); ?>" placeholder="请输入简历排列序号" />
            </div>
            <button type="submit" class="btn btn-info">简历修改</button>
            <button type="button" class="btn btn-default" onclick="window.history.go(-1)">返回</button>
        </form>

    </div>

    <!-- 编辑器 -->
    <script src="/Public/plugin/ueditor/ueditor.config.js"></script>
    <script src="/Public/plugin/ueditor/ueditor.all.min.js"></script>
    <script src="/Public/plugin/ueditor/lang/zh-cn/zh-cn.js"></script>
    <script>
        var ed = UE.getEditor('whyme', {
            //  取消自动保存
            enableAutoSave: false
        });
    </script>
</body>

</html>