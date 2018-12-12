<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>

        
    我的博客--关于我


    </title>
    <meta name="keywords" content="" />
    <meta name="description" content="主题的个人博客, 优雅、稳重、大气,低调。" />

    
    <link href="/Public/Home/css/base.css" rel="stylesheet">
    <link href="/Public/Home/css/about.css" rel="stylesheet">

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

    
    <article class="aboutcon" style="min-height: 530px;">
        <h1 class="t_nav"><span>像“草根”一样，紧贴着地面，低调的存在，冬去春来，枯荣无恙。</span>
            <a href="<?php echo U('index');?>" class="n1">网站首页</a>
            <a href="javascript:;" class="n2">关于我</a>
        </h1>
        <div class="about left" style="min-height:420px;">
            <h2><?php echo ($about['title']); ?></h2>
            <?php echo ($about['content']); ?>
        </div>
        <aside class="right">
            <div class="about_c">
                <p>网名：<span><?php echo ($about['nickname']); ?></span> | <?php echo ($about['enname']); ?></p>
                <p>姓名：<?php echo ($about['truename']); ?> </p>
                <p>生日：<?php echo ($about['birthday']); ?></p>
                <p>籍贯：<?php echo ($about['native']); ?></p>
                <p>现居：<?php echo ($about['address']); ?></p>
                <p>职业：<?php echo ($about['profession']); ?></p>
                <p>爱好：<?php echo ($about['hobbies']); ?></p>
            </div>
        </aside>
    </article>


    <footer>
        <p>Everything is possible
            <span style="color:red;">❤</span> - Go for
            <a href="<?php echo U('Admin/User/login');?>" target="_blank" title="进入管理员">admin</a>
        </p>
    </footer>

    
    <script src="/Public/Home/js/silder.js"></script>


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