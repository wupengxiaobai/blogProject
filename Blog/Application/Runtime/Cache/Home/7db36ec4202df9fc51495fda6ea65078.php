<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>

        我的博客--碎言碎语

    </title>
    <meta name="keywords" content="" />
    <meta name="description" content="主题的个人博客, 优雅、稳重、大气,低调。" />

    
    <link href="/Public/Home/css/base.css" rel="stylesheet">
    <link href="/Public/Home/css/mood.css" rel="stylesheet">
    <link href="/Public/Home/css/style.css" rel="stylesheet">

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

    
    <div class="moodlist" style="min-height:570px;">
        <h1 class="t_nav">
            <span>删删写写，回回忆忆，虽无法行云流水，却也可碎言碎语。</span>
            <a href="<?php echo U('index');?>" class="n1">网站首页</a>
            <a href="javascript:;" class="n2">碎言碎语</a>
        </h1>
        <div class="bloglist">

            <!-- 碎言碎语列表 -->
            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><ul class="arrow_box">
                    <div class="sy">
                        <img src="<?php echo ($vo['picture']); ?>">
                        <p> <?php echo (htmlspecialchars_decode($vo['content'])); ?></p>
                    </div>
                    <span class="dateview"><?php echo (date('Y-m-d',$vo["addtime"])); ?></span>
                </ul><?php endforeach; endif; else: echo "" ;endif; ?>

        </div>

        <div class="my-page">
            <p style="padding:20px;">共有 <?php echo ($totalRows); ?> 条[碎言碎语]</p>
            <?php if(empty($show)): ?>没有更多了...<?php endif; ?>
            <?php echo ($show); ?>
        </div>
    </div>


    <footer>
        <p>Everything is possible
            <span style="color:red;">❤</span> - Go for
            <a href="<?php echo U('Admin/User/login');?>" target="_blank" title="进入管理员">admin</a>
        </p>
    </footer>

    
    <script src="/Public/Home/js/silder.js"></script>
    <script>
        var oTopA = document.getElementById('topnav').getElementsByTagName('a');
        var obj = oTopA[3];
        obj.id = 'topnav_current';
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