<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>网站基本信息的修改</title>
  <link rel="stylesheet" href="/Public/plugin/bootstrap/css/bootstrap.min.css">
</head>

<body>

  <div class="container">

    <!-- 网站基础的修改 -->
    <div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title">网站基础设置</h3>
      </div>
      <div class="panel-body">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" style="margin-bottom:0px;">
          <div class="panel">
            <div class="panel-heading" role="tab" id="headingOne">
              <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"
                  aria-controls="collapseOne">
                  网站LOGO
                </a>
              </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
              <div class="panel-body">
                <form method="POST" action="<?php echo U('changeLogo');?>" enctype="multipart/form-data" id="formLogo">
                  <input type="hidden" name="id" value="1">
                  <div class="form-group" style="overflow:hidden;">
                    <div class="left pull-left" style="width:48%;">
                      <img height="100" src="<?php echo ($data['logo']); ?>" alt="网站LOGO">
                    </div>
                    <div class="right pull-right" style="width:48%;">
                      <input type="file" name="logo">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-info btn-xs">提交修改</button>
                </form>
              </div>
            </div>
          </div>
          <div class="panel">
            <div class="panel-heading" role="tab" id="headingTwo">
              <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"
                  aria-expanded="false" aria-controls="collapseTwo">
                  网站BANNER 和 文字
                </a>
              </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
              <div class="panel-body">
                <form method="POST" action="<?php echo U('changeBanner');?>" enctype="multipart/form-data" id="formBanner">
                  <div class="form-group" style="overflow:hidden">
                    <input type="hidden" name="id" value="1">
                    <div class="left pull-left" style="width:48%;">
                      <img height="100" src="<?php echo ($data['banner']); ?>" alt="网站banner">
                    </div>
                    <div class="right pull-right" style="width:48%;">
                      <input type="file" name="banner">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="text">文字[文字段之间使用 "|" 号分割]</label>
                    <input type="text" value="<?php echo ($data['banner_text']); ?>" id="text" class="form-control" name="banner_text" />
                  </div>
                  <button type="submit" class="btn btn-info btn-xs">提交修改</button>
                </form>
              </div>
            </div>
          </div>
          <div class="panel">
            <div class="panel-heading" role="tab" id="headingThree">
              <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"
                  aria-expanded="false" aria-controls="collapseThree">
                  我的头像 和 网名
                </a>
              </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
              <div class="panel-body">
                <form method="POST" action="<?php echo U('changeAvatar');?>" enctype="multipart/form-data" id="formAvatar">
                  <input type="hidden" name="id" value="1">
                  <div class="form-group" style="overflow:hidden">
                    <div class="left pull-left" style="width:48%;">
                      <img height="100" src="<?php echo ($data['avatar']); ?>" alt="我的头像">
                    </div>
                    <div class="right pull-right" style="width:48%;">
                      <input type="file" name="avatar">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="name">网名</label>
                    <input type="text" id="name" value="<?php echo ($data['avatar_text']); ?>" class="form-control" name="avatar_text" />
                  </div>
                  <button type="submit" class="btn btn-info btn-xs">提交修改</button>
                </form>
              </div>
            </div>
          </div>
          <div class="panel">
            <div class="panel-heading" role="tab" id="headingFour">
              <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true"
                  aria-controls="collapseFour">
                  微信图片
                </a>
              </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
              <div class="panel-body">
                <form method="POST" action="<?php echo U('changeWeiXin');?>" enctype="multipart/form-data" id="formWeixin">
                  <input type="hidden" name="id" value="1">
                  <div class="form-group" style="overflow:hidden;">
                    <div class="left pull-left" style="width:48%;">
                      <img height="100" src="<?php echo ($data['weixin']); ?>" alt="微信图片">
                    </div>
                    <div class="right pull-right" style="width:48%;">
                      <input type="file" name="weixin">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-info btn-xs">提交修改</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- 友情链接 -->
    <div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title">友情链接 <a data-toggle="modal" data-target="#myModal2" style="color:darkslategrey" href="javascript:;">添加</a></h3>

        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabe2">友情链接添加</h4>
              </div>
              <div class="modal-body">
                <form id="formAddFriendly" action="<?php echo U('addFriendly');?>" method="POST">
                  <div class="form-group">
                    <label for="name1">链接名称</label>
                    <input type="text" class="form-control" name='name' id="name1">
                  </div>
                  <div class="form-group">
                    <label for="link1">链接地址</label>
                    <input type="text" class="form-control" name='link' id="link1">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                <button type="submit" form="formAddFriendly" class="btn btn-primary savelink">添加</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="panel-body">
        <table class="table table-hover" style="margin-bottom:0;">
          <thead>
            <tr>
              <th>序号</th>
              <th>标题描述</th>
              <th>链接地址</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
            <?php if(is_array($friendly)): $key = 0; $__LIST__ = $friendly;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><tr>
                <td><?php echo ($key); ?></td>
                <td><?php echo ($vo["name"]); ?></td>
                <td><a href="<?php echo ($vo["link"]); ?>" target='_blank'><?php echo ($vo["link"]); ?></a></td>
                <td>
                  <a href="javascript:;" onClick="delFriendly(<?php echo ($vo['id']); ?>)" class="btn btn-danger btn-xs">删除</a>
                  <button class="btn btn-primary btn-xs" data-toggle="modal" data-id="<?php echo ($vo['id']); ?>" data-target="#myModal">修改</button>
                </td>
              </tr><?php endforeach; endif; else: echo "" ;endif; ?>
          </tbody>
        </table>
      </div>


      <!-- 编辑模态框 -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">友情链接编辑</h4>
            </div>
            <div class="modal-body">
              <form id="formFriendly" action="<?php echo U('editFriendly');?>" method="POST">
                <input type="hidden" name="id" value="">
                <div class="form-group">
                  <label for="name">链接名称</label>
                  <input type="text" class="form-control" name='name' id="name" value="">
                </div>
                <div class="form-group">
                  <label for="link">链接地址</label>
                  <input type="text" class="form-control" name='link' id="link" value="">
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
              <button type="submit" form="formFriendly" class="btn btn-primary savelink">保存修改</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdn.bootcss.com/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
  <script>
    function delFriendly(id) {
      var conf = confirm('您确定要删除该友情链接吗???');
      if (conf) {
        window.location.href = "/index.php?m=Admin&c=Index&a=delFriendly&id=" + id;
      }
    }

    $('#myModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var id = button.data('id')
      var modal = $(this)
      var url = "/index.php?m=Admin&c=Index&a=editFriendly&id=" + id;
      $.ajax({
        url: url,
        dataType: 'json',
        success: function (data) {
          $('#formFriendly').find('input:hidden').val(data['id']);
          $('#formFriendly').find('#name').val(data['name']);
          $('#formFriendly').find('#link').val(data['link']);
        }
      })
    })

  </script>
</body>

</html>