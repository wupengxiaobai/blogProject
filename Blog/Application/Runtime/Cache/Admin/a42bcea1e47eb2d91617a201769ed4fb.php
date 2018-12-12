<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/Public/plugin/bootstrap/css/bootstrap.min.css">
    <title>简历管理</title>
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
        <form action="" method="get">
            <div class="input-group pull-right" style="margin:10px 20px;width:300px;">
                <input type="text" name="search_val" class="form-control" placeholder="按职业搜索">
                <span class="input-group-btn">
                    <button class="search btn btn-success" type="submit">Search</button>
                </span>
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr class="success">
                    <th>序号</th>
                    <th>姓名</th>
                    <th>意向职业</th>
                    <th>邮箱</th>
                    <th>照片</th>
                    <th>排序</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php if(is_array($data)): $key = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><tr>
                        <td><?php echo ($key); ?></td>
                        <td><?php echo ($vo["name"]); ?></td>
                        <td><?php echo ($vo["work"]); ?></td>
                        <td><?php echo ($vo["email"]); ?></td>
                        <td>
                            <img style="height:26px;" src="<?php echo ($vo["avatar"]); ?>" alt="">
                            <?php if(!empty($vo["avatar"])): ?>[<a href="<?php echo U('download',array('id'=>$vo['id']));?>">下载</a>]<?php endif; ?>
                        </td>
                        <td><?php echo ($vo["sort"]); ?></td>
                        <td>
                            <button class="del btn btn-danger btn-xs" onClick="delConfirm(<?php echo ($vo['id']); ?>)">删除</button>
                            <a href="<?php echo U('edit',array('id'=>$vo['id']));?>" class="btn btn-info btn-xs">编辑</a>
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>

        <div class="page">
            <?php if(!empty($show)): echo ($show); ?> 共有 <?php echo ($totalRows); ?> 条数据<?php endif; ?>
            <?php if(empty($show)): ?>没有更多数据分页...<?php endif; ?>
        </div>
    </div>

    <script src="/Public/Admin/vendors/js/vendor.bundle.base.js"></script>
    <script>
        function delConfirm($id) {
            var delOk = window.confirm('确定要删除该条信息?');
            if (delOk) {
                window.location.href = '/index.php/Admin/Resume/del/id/' + $id;
            }
        }
    </script>
</body>

</html>