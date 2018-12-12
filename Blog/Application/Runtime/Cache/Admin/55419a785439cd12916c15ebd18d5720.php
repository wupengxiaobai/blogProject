<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>权限管理</title>
    <link href="https://cdn.bootcss.com/twitter-bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet">
    <style>
        tr>td {
            text-align: center;
        }

        tr>th {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container" style="margin-bottom:100px;margin-top:20px;">

        <div class="panel panel-default">
            <div class="panel-heading">权限管理</div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>序号</th>
                        <th>权限名称</th>
                        <th>控制器名</th>
                        <th>模型名称</th>
                        <th>方法名称</th>
                        <th>上级权限</th>
                        <th>是否显示</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(is_array($data)): $key = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><tr>
                            <td><?php echo ($key); ?></td>
                            <td style="text-align:left">|<?php echo (str_repeat('----',$vo["level"])); echo ($vo["rule_name"]); ?></td>
                            <td><?php echo ($vo["controller_name"]); ?></td>
                            <td><?php echo ($vo["module_name"]); ?></td>
                            <td><?php echo ($vo["action_name"]); ?></td>
                            <td><?php echo ($vo["parent_name"]); ?>
                                <?php if(empty($vo["parent_name"])): ?>顶级权限<?php endif; ?>
                            </td>
                            <td><?php if($vo["is_show"] == 1 ): ?>是<?php else: ?>否<?php endif; ?></td>
                            <td>
                                <a href="javascript:;" onClick="delconfirm(<?php echo ($vo['id']); ?>)">删除</a>
                                <a href="<?php echo U('edit',array('rule_id'=>$vo['id']));?>">编辑</a>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
        </div>

    </div>

    <script>
        function delconfirm($id) {
            if (confirm('您确定要删除吗?')) {
                location.href = '/Admin/Rule/dels/rule_id/' + $id;
            }
        }
    </script>
</body>


</html>