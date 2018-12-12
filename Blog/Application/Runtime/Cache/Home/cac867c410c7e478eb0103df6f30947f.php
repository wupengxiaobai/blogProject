<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>

        我的博客--留言板

    </title>
    <meta name="keywords" content="" />
    <meta name="description" content="主题的个人博客, 优雅、稳重、大气,低调。" />

    
    <link href="/Public/Home/css/base.css" rel="stylesheet">
    <link href="/Public/Home/css/style.css" rel="stylesheet">
    <style>
        .blogs{
            overflow: hidden;
        }
        .blogs .left{
            float: left;
            margin-top: 30px;
            width: 666px;
            min-height: 390px;
            width: 100%;
        }
        .blogs .left form label{
            font-size:22px;;
            font-weight: 600px;
        }
        .blogs .left form textarea{
            margin-top: 10px;
            padding: 10px;
            width: calc(100% - 25px);
            height: 280px;
            border: 1px solid gainsboro;
            outline: none;
            border-radius: 5px;
        }
        .blogs .left form input[class=submitbtn],.blogs .left form input[class=buttonbtn]{
            background: antiquewhite;
            padding: 5px 10px;
            color: palevioletred;
            border: 1px solid antiquewhite;
            outline:none;
            cursor: pointer;
        }
        .blogs .left form input[class=buttonbtn]{
            color: gray
        }
        .blogs .left form input[class=buttonbtn]:hover{
            color: #333;
        }
        .blogs .left form input[class=submitbtn]:hover{
            color: deeppink;
        }
        .blogs .left form input[type=text]{
            margin: 5px 0px;
            width: calc(100% - 25px);
            padding: 5px 10px;
            border: 1px solid gainsboro;
            outline: none;
            border-radius: 5px;
        }
    </style>

    <!--[if lt IE 9]>
<script src="/Public/Home/js/modernizr.js"></script>
<![endif]-->
</head>

<body>
    <header>
        <div id="logo" data-logo="<?php echo ($websiteInfo['logo']); ?>"><a href="<?php echo U('index');?>"></a></div>
        <nav class="topnav" id="topnav">
            <a href="<?php echo U('index');?>"><span>首页</span><span class="en">Protal</span></a>
            <a href="<?php echo U('about');?>"><span>关于我</span><span class="en">About</span></a>
            <a href="<?php echo U('newlist');?>"><span>慢生活</span><span class="en">Life</span></a>
            <a href="<?php echo U('moodlist');?>"><span>碎言碎语</span><span class="en">Doing</span></a>
            <a href="<?php echo U('knowledge');?>"><span>学无止境</span><span class="en">Learn</span></a>
            <a href="<?php echo U('resume');?>"><span>博主简历</span><span class="en">Resume</span></a>
            <a href="<?php echo U('book');?>"><span>留言板</span><span class="en">Gustbook</span></a>
        </nav>
    </header>

    
    <article class="blogs" style="min-height: 530px;">
        <h1 class="t_nav">
            <span> 轻轻地留下你的足迹, 证明你也曾来过.</span>
            <a href="<?php echo U('index');?>" class="n1">网站首页</a>
            <a href="javascript:;" class="n2">留言板</a>
        </h1>


        <div class="left">
            <form action="" method="POST">
                <label for='content'>有说快话, 有印就留. ^_^</label>
                <textarea name="content" id="content" placeholder="咳咳, 请留步."></textarea>
                <input type="text" name="mobilephone" placeholder='咳咳, 请留个电话!' />
                <input type="text" name="email" placeholder='咳咳, 请留个邮箱!' />
                <input class="submitbtn" type="button" value="提交留言">
                <input class="buttonbtn" type="button" value="重置">
            </form>
        </div>
    </article>


    <footer>
        <p>Everything is possible
            <span style="color:red;">❤</span> - Go for
            <a href="<?php echo U('Admin/User/login');?>" target="_blank" title="进入管理员">admin</a>
        </p>
    </footer>

    
    <script src="/Public/Home/js/silder.js"></script>
    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <script>
        var $subB = $('.submitbtn');
        var flag = true;
        $subB.on('click', function () {
            var data = $('form').serializeArray();
            if (flag) {
                $.ajax({
                    type: "POST",
                    url: '',
                    data: data,
                    dataType: 'json',
                    success: function (data) {
                        if (data['err_code'] == 1) {
                            alert(data['msg']);
                        } else {
                            alert(dara['msg']);
                        }
                    },
                    error: function (err) {
                        alert('ε(┬┬﹏┬┬)3 稳住!');
                        console.log(err);
                    }
                });
                flag = false;
            } else {
                alert('您已经留下足迹了!!! 我们不接收一串又一串脚印<(*￣▽￣*)/');
            }
            $('form')[0].reset();
        })
        $('.buttonbtn').on('click', function () {
            $('form')[0].reset();
        })
    </script>


    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <script>
        var loginUrl = $('#logo').attr('data-logo');
        $('#logo').find('a').css({
            backgroundImage: 'url(' + loginUrl + ')',
            backgroundRepeat: 'no-repeat',
            backgroundSize: 'cover',
            backgroundPosition: 'center'
        })
    </script>
</body>

</html>