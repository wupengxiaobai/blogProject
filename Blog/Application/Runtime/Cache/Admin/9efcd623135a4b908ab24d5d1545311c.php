<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/Public/plugin/bootstrap/css/bootstrap.min.css">
    <title>碎言碎语</title>
    <style>
        tr>th,
        tr>td {
            text-align: center;
        }
        .page {
            text-align: right;
        }
        .page a,.page .current {
            display: inline-block;
            padding: 5px 10px;
            margin: 3px;
            text-align: center;
            border: 1px solid gray;
            border-radius: 3px;
            color: gray;
            background: #fff;
            text-decoration: none;
        }
        .page .current,.page a:hover{
            color: #fff;
            background: gray;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="container" style="padding:20px;">
        <form action="" method="get" style="overflow: hidden;">
            <div class="input-group pull-right" style="margin:10px 20px;width:300px;">
                <input type="text" name="search_val" class="form-control" placeholder="根据内容搜索">
                <span class="input-group-btn">
                    <button class="search btn btn-success" type="submit">Search</button>
                </span>
            </div>
        </form>

        <?php if(!empty($data)): ?><table class="table table-bordered">
                <thead>
                    <tr class="success">
                        <th>序号</th>
                        <th>图版</th>
                        <th>内容</th>
                        <th>置顶</th>
                        <th>时间</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(is_array($data)): $key = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><tr>
                            <td><?php echo ($key); ?></td>
                            <td>
                                <img style="height:30px;" src="<?php echo ($vo["thumb_pic"]); ?>" alt="">
                                <?php if(!empty($vo["hasfile"])): ?>[<a href="<?php echo U('download',array('id'=>$vo['id']));?>">下载</a>]<?php endif; ?>
                            </td>
                            <td><?php echo (msubstr(htmlspecialchars_decode($vo["content"]),0,12)); ?></td>
                            <td>
                                <?php if($vo["istop"] == 0): ?>不置顶
                                    <?php else: ?>
                                    置顶<?php endif; ?>
                            </td>
                            <td><?php echo (date('Y-m-d H:i:s',$vo["addtime"])); ?></td>
                            <td>
                                <button class="del btn btn-danger btn-xs" onClick="delConfirm(<?php echo ($vo['id']); ?>)">删除</button>
                                <a href="<?php echo U('edit',array('id'=>$vo['id']));?>" class="btn btn-info btn-xs">编辑</a>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table><?php endif; ?>

        <?php if(empty($show)): ?><p style="text-align:center;">没有更多数据...</p><?php endif; ?>


        <div class="page">
            <?php if(!empty($show)): echo ($show); ?> 共有 <?php echo ($totalRows); ?> 条数据<?php endif; ?>
        </div>
    </div>

    <script src="/Public/Admin/vendors/js/vendor.bundle.base.js"></script>
    <script>
        function delConfirm(id) {
            var delOk = window.confirm('确定要删除该条信息?');
            if (delOk) {
                window.location.href = '/index.php?m=Admin&c=Moodlies&a=del&id=' + id;
            }
        }
    </script>
</body>

</html>