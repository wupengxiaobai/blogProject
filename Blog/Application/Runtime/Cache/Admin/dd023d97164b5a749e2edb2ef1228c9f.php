<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>管理员登录</title>
    <link rel="stylesheet" href="/Public/Admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/Public/Admin/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="/Public/Admin/css/style.css">
    <link rel="shortcut icon" href="/Public/Admin/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row w-100">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo">
                                <img src="/Public/Admin/images/logo.svg">
                            </div>
                            <h4>你好! 让我们从这里开始.</h4>
                            <h6 class="font-weight-light">用户登录</h6>
                            <form id="form-login" action="<?php echo U('User/login');?>" method="POST" class="pt-3">
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control form-control-lg" id="exampleInputEmail1"
                                        placeholder="输入用户名..">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1"
                                        placeholder="输入密码..">
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" name="verify" class="form-control" placeholder="输入验证码"
                                            aria-describedby="basic-addon2">
                                        <img width='130' class="input-group-addon verify" id="basic-addon2" src="<?php echo U('verify');?>">
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <a class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn"
                                        href="javascript:;">登录</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/Public/Admin/vendors/js/vendor.bundle.base.js"></script>
  
    <script>
        var formBtn = document.getElementsByClassName('btn')[0];
        var form = document.getElementById('form-login');
        formBtn.onclick = function () {
            form.submit();
        }

        var verify = document.getElementsByClassName('verify')[0];
        verify.onclick = function () {
            this.src = "/index.php?m=Admin&c=User&a=verify&" + Math.random();
        }
    </script>
</body>

</html>