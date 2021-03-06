<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>博客后台管理</title>
  <link rel="stylesheet" href="/Public/Admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="/Public/Admin/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="/Public/Admin/css/style.css">
  <link rel="shortcut icon" href="/Public/Admin//Public/Admin/images/favicon.png" />
</head>

<body>

  <div class="container-scroller">
    <!-- 头部 -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html"><img src="/Public/Admin/images/logo.svg" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="/Public/Admin/images/logo-mini.svg" alt="logo" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <div class="nav-profile-img">
                <img src="<?php echo ($data['avatar']); ?>" alt="image">
                <span class="availability-status online"></span>
              </div>
              <div class="nav-profile-text">
                <p class="mb-1 text-black"><?php echo ($data['nickname']); ?></p>
              </div>
            </a>
            <div class="myself dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item nav-linking" data-src="<?php echo U('myself');?>" style="cursor:pointer">
                <i class="mdi mdi-cached mr-2 text-success"></i>
                修改资料
              </a>
              <div class="dropdown-divider"></div>
              <a href="javascript:;" onClick='logoutPrompt()' class="dropdown-item" href="#">
                <i class="mdi mdi-logout mr-2 text-primary"></i>
                退出
              </a>
            </div>
          </li>

          <!-- 信息接收 -->
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell-outline"></i>
              <span class="count-symbol bg-danger"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <h6 class="p-3 mb-0">未读留言</h6>
              <div class="dropdown-divider"></div>
              <a href="javascript:;" data-src="<?php echo U('Book/index');?>" class="dropdown-item preview-item gobook">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="mdi mdi-settings"></i>
                  </div>
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject font-weight-normal mb-1">留言板</h6>
                  <p class="text-gray ellipsis mb-0">
                    有 <span class="lycount" style="color:deeppink;font-weight:600;">0</span> 条未查看
                  </p>
                </div>
              </a>
            </div>
          </li>

          <!-- 退出 -->
          <li class="nav-item nav-logout d-none d-lg-block">
            <a class="nav-link" href="javascript:;" onClick='logoutPrompt()'>
              <i class="mdi mdi-power"></i>
            </a>
          </li>

          <!-- 回到顶部 -->
          <li class="nav-item nav-settings d-none d-lg-block">
            <a class="nav-link" href="#">
              <i class="mdi mdi-format-line-spacing"></i>
            </a>
          </li>
        </ul>
        <button id="rightbtn" class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
          data-toggle="offcanvas" data-target='#sidebar'>
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>


    <!-- 主体部分 -->
    <div class="container-fluid page-body-wrapper">

      <!-- 左侧导航 -->
      <nav class="sidebar offcanvas sidebar-offcanvas navbar-toggler" id="sidebar">
        <ul class="nav nav-list">
          <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="nav-profile-image">
                <img src="<?php echo ($data['avatar']); ?>" alt="profile">
                <span class="login-status online"></span>
              </div>
              <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2"><?php echo ($data['nickname']); ?></span>
                <span class="text-secondary text-small">
                  <?php echo ($data['jurisdiction']); ?>
                </span>
              </div>
              <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
          </li>

          <?php if(is_array($menus)): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(!empty($vo["is_show"])): ?><!--判断如果显示导航则显示-->
              <li class="nav-item">
                <?php if(($vo["parent_id"]) == "0"): ?><a class="nav-link" data-toggle="collapse" href="#<?php echo ($vo['controller_name']); ?>" aria-expanded="false"
                    aria-controls="<?php echo ($vo['controller_name']); ?>">
                    <span class="menu-title"><?php echo ($vo["rule_name"]); ?></span>
                    <i class="menu-arrow"></i>
                  </a><?php endif; ?>
                <div class="collapse" id="<?php echo ($vo['controller_name']); ?>">
                  <ul class="nav flex-column sub-menu">
                    <?php if(is_array($menus)): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if(($v["parent_id"]) == $vo["id"]): if(!empty($v["is_show"])): ?><!--判断如果显示导航则显示-->
                          <li class="nav-item">
                            <a class="nav-link" data-src="<?php echo U($v['module_name'].'/'.$v['controller_name'].'/'.$v['action_name']);?>"><?php echo ($v["rule_name"]); ?></a>
                          </li><?php endif; endif; endforeach; endif; else: echo "" ;endif; ?>
                  </ul>
                </div>
              </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>






          <!-- <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#Role" aria-expanded="false" aria-controls="Role">
                            <span class="menu-title">角色添加</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="Role">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" data-src="<?php echo U('Role/add');?>"> 添加角色 </a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" data-src="<?php echo U('Role/index');?>"> 角色管理 </a></li>
                            </ul>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#admin" aria-expanded="false" aria-controls="admin">
                            <span class="menu-title">管理员添加</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="admin">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" data-src="<?php echo U('Admin/add');?>"> 添加管理员 </a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" data-src="<?php echo U('Admin/index');?>"> 管理员管理 </a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#rule" aria-expanded="false" aria-controls="rule">
                            <span class="menu-title">权限添加</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="rule">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" data-src="<?php echo U('Rule/add');?>"> 添加权限 </a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" data-src="<?php echo U('Rule/index');?>"> 权限管理 </a></li>
                            </ul>
                        </div>
                    </li>
 -->



        </ul>
      </nav>

      <!-- 右侧主体内容 -->
      <div class="main-panel">
        <!-- 默认显示主页home -->
        <iframe name="iframe" src="<?php echo U('Index/welcome');?>" id="iframe" width="100%" height="100%" frameborder="0"></iframe>
      </div>


    </div>
  </div>
  <script src="/Public/Admin/vendors/js/vendor.bundle.base.js"></script>
  <script>
    function logoutPrompt() {
      var conf = window.confirm('确定要退出?');
      if (conf) {
        window.location.href = '/index.php?m=Admin&c=User&a=logout';
      }
    }


    $(function () {

      //  iframe框架src改变
      $('.nav-list,.myself').find('.nav-link,.nav-linking').on('click', function () {
        // iframe 框架内容更新
        var $url = $(this).attr('data-src')
        if ($url) {
          $("#iframe").attr("src", $url);
          // console.log($url);
        };
      })
      $('.gobook').on('click', function () {
        var $url = $(this).attr('data-src')
        if ($url) {
          $("#iframe").attr("src", $url);
          // console.log($url);
        };
      })

      //  样式处理
      $('.menu-title,.nav-link').css('cursor', 'pointer');
      $('.nav-link').on('click', function () {
        $('.nav-link').css({
          color: 'rgb(51,51,51)',
          fontWeight: '100'
        });
        $(this).css({
          color: '#6a008a',
          fontWeight: '600'
        });
      })


      var flag = true;
      $('#rightbtn').on('click', function () {
        if (flag) {
          $('#sidebar').css({
            right: '0px'
          })
          flag = false;
        } else {
          $('#sidebar').css({
            right: '-500px'
          })
          flag = true;
        }
      })

      function sendAJAX() {
        $.ajax({
          url: '/index.php?m=Admin&c=Index&a=sendAJAX',
          dataType: 'json',
          success: function (data) {
            $('.lycount').html(data);
            if (data > 0) {
              $('.count-symbol').css({
                'display': 'block'
              })
            } else {
              $('.count-symbol').css({
                'display': 'none'
              })
            }
          }
        })
      }
      //  30秒发送一次ajax确定留言未查看数目
      sendAJAX();
      setInterval(sendAJAX, 1000 * 30);


    })
  </script>
</body>

</html>



<!--                     <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#moodlies" aria-expanded="false" aria-controls="moodlies">
                                <span class="menu-title">碎言碎语</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="moodlies">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link" data-src="<?php echo U('Moodlies/add');?>"> 添加碎言碎语</a></li>
                                    <li class="nav-item"> <a class="nav-link" data-src="<?php echo U('Moodlies/index');?>"> 碎言碎语管理 </a></li>
                                </ul>
                            </div>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false"
                                aria-controls="general-pages">
                                <span class="menu-title">学无止境</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="general-pages">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link" data-src="<?php echo U('Knowledge/add');?>"> 添加科目
                                        </a></li>
                                    <li class="nav-item"> <a class="nav-link" data-src="<?php echo U('Knowledge/index');?>"> 科目管理 </a></li>
                                </ul>
                            </div>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#resume" aria-expanded="false" aria-controls="resume">
                                <span class="menu-title">我的简历</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="resume">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item"> <a class="nav-link" data-src="<?php echo U('Resume/add');?>"> 添加简历 </a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-src="<?php echo U('Resume/index');?>"> 我的简历 </a></li>
                                    <li class="nav-item"> <a class="nav-link" data-src="<?php echo U('Resume/editskill');?>"> 修改技能值
                                        </a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-src="<?php echo U('Resume/editexperience');?>">
                                            修改经历内容 </a> </li>
                                </ul>
                            </div>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#book" aria-expanded="false" aria-controls="book">
                                <span class="menu-title">留言板</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="book">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item">
                                        <a class="nav-link" data-src="<?php echo U('Book/add');?>"> 添加留言 </a>
                                    </li>
                                    <li class="nav-item"> <a class="nav-link" data-src="<?php echo U('Book/index');?>"> 留言板管理 </a></li>
                                </ul>
                            </div>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#menu" aria-expanded="false" aria-controls="menu">
                                <span class="menu-title">文章类别管理</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="menu">
                                <ul class="nav flex-column sub-menu">
                                    <li class="nav-item">
                                        <a class="nav-link" data-src="<?php echo U('Menu/add');?>"> 添加类别 </a>
                                    </li>
                                    <li class="nav-item"> <a class="nav-link" data-src="<?php echo U('Menu/index');?>"> 类别管理 </a></li>
                                </ul>
                            </div>
                        </li>
     -->