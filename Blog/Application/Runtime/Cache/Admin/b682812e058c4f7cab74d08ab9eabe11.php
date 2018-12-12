<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>管理员管理</title>
    <link href="https://cdn.bootcss.com/twitter-bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet">
    <style>
        tr>td {
            text-align: center;
        }

        tr>th {
            text-align: center;
        }

        .page {
            text-align: right;
        }

        .page a,
        .page .current {
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

        .page .current,
        .page a:hover {
            color: #fff;
            background: gray;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="container" style="margin-bottom:100px;margin-top:100px;">

        <div class="panel panel-default">
            <div class="panel-heading">管理员管理</div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>序号</th>
                        <th>管理员</th>
                        <th>权限</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(is_array($data['list'])): $key = 0; $__LIST__ = $data['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><tr>
                            <td><?php echo ($key); ?></td>
                            <td><?php echo ($vo["username"]); ?></td>
                            <td><?php echo ($vo["role_name"]); ?></td>
                            <td>
                                <?php if(($vo["id"]) > "1"): ?><a href="javascript:;" onClick="delconfirm(<?php echo ($vo['id']); ?>)">删除</a>
                                    <a href="<?php echo U('edit',array('admin_id'=>$vo['id']));?>">编辑</a><?php endif; ?>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
        </div>

        <div class="page">
            <?php if(!empty($data['pageStr'])): echo ($data['pageStr']); endif; ?>
            <?php if(empty($data['pageStr'])): ?>没有更多数据分页...<?php endif; ?>
        </div>
    </div>

    <script>
        function delconfirm($id) {
            if (confirm('您确定要删除吗?')) {
                location.href = '/index.php/Admin/Admin/dels/admin_id/' + $id;
            }
        }
    </script>
</body>


</html>