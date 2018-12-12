<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>

        我的博客

    </title>
    <meta name="keywords" content="" />
    <meta name="description" content="主题的个人博客, 优雅、稳重、大气,低调。" />

    
    <link href="/Public/Home/css/base.css" rel="stylesheet">
    <link href="/Public/Home/css/style.css" rel="stylesheet">

    <!--[if lt IE 9]>
<script src="/Public/Home/js/modernizr.js"></script>
<![endif]-->
</head>

<body>
    <header>
        <div id="logo"><a href="<?php echo U('index');?>"></a></div>
        <nav class="topnav" id="topnav">
            <a href="<?php echo U('index');?>"><span>首页</span><span class="en">Protal</span></a>
            <a href="<?php echo U('about');?>"><span>关于我</span><span class="en">About</span></a>
            <a href="<?php echo U('newlist');?>"><span>慢生活</span><span class="en">Life</span></a>
            <a href="<?php echo U('moodlist');?>"><span>碎言碎语</span><span class="en">Doing</span></a>
            <a href="<?php echo U('knowledge');?>"><span>学无止境</span><span class="en">Learn</span></a>
            <a href="<?php echo U('resume');?>"><span>我的简历</span><span class="en">Resume</span></a>
            <a href="<?php echo U('book');?>"><span>留言版</span><span class="en">Gustbook</span></a>
        </nav>
    </header>

    
    <article class="blogs">
        <h1 class="t_nav">
            <span>“慢生活”不是懒惰，放慢速度不是拖延时间，而是让我们在生活中寻找到平衡。</span>
            <a href="<?php echo U('index');?>" class="n1">网站首页</a>
            <a href="javascript:;" class="n2">慢生活</a>
        </h1>
        <div class="newblog left">

            <!-- 慢生活列表 -->
            <?php if(is_array($newList)): $i = 0; $__LIST__ = $newList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="new-item">
                    <h2><?php echo ($vo["title"]); ?></h2>
                    <p class="dateview"><span>发布时间：<?php echo ($vo["addtime"]); ?></span><span>作者：<?php echo ($vo["nickname"]); ?></span><span>分类：[<a href="/news/life/"><?php echo ($vo["category_id"]); ?></a>]</span></p>
                    <figure><img src="/Public/Home/images/001.png"></figure>
                    <ul class="nlist">
                        <p>如果说掌握一门赖以生计的技术是技术人员要学会的第一课的话， 那么我觉得技术人员要真正学会的第二课，不是技术，而是业务、交流与协作，学会关心其他工作伙伴的工作情况和进展...</p>
                        <a title="/" href="/" target="_blank" class="readmore">阅读全文>></a>
                    </ul>
                    <div class="line"></div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>


            <div class="page"><a title="Total record"><b>41</b></a><b>1</b><a href="/news/s/index_2.html">2</a><a href="/news/s/index_2.html">&gt;</a><a
                    href="/news/s/index_2.html">&gt;&gt;</a></div>
        </div>
        <aside class="right">
            <div class="rnav">
                <ul>
                    <!-- 慢生活类别 -->
                    <li class="rnav1"><a href="/download/" target="_blank">日记</a></li>
                    <li class="rnav2"><a href="/newsfree/" target="_blank">程序人生</a></li>
                    <li class="rnav3"><a href="/web/" target="_blank">欣赏</a></li>
                    <li class="rnav4"><a href="/newshtml5/" target="_blank">短信祝福</a></li>
                </ul>
            </div>
            <div class="news">
                <h3>
                    <p>最新<span>生活</span></p>
                </h3>
                <ul class="rank">

                    <!-- 最新慢生活 -->
                    <li><a href="/" title="Column 三栏布局 个人网站模板" target="_blank">Column 三栏布局 个人网站模板</a></li>

                </ul>
                <h3 class="ph">
                    <p>点击<span>排行</span></p>
                </h3>
                <ul class="paih">

                    <!-- 排行慢生活 -->
                    <li><a href="/" title="Column 三栏布局 个人网站模板" target="_blank">Column 三栏布局 个人网站模板</a></li>

                </ul>
            </div>
            <div class="visitors">
                <h3>
                    <p>最近访客</p>
                </h3>
                <ul>

                </ul>
            </div>

            <!-- Baidu Button BEGIN -->
            <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare"><a class="bds_tsina"></a><a class="bds_qzone"></a><a
                    class="bds_tqq"></a><a class="bds_renren"></a><span class="bds_more"></span><a class="shareCount"></a></div>
            <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585"></script>
            <script type="text/javascript" id="bdshell_js"></script>
            <script type="text/javascript">
                document.getElementById("bdshell_js").src =
                    "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date() / 3600000)
            </script>
            <!-- Baidu Button END -->

        </aside>
    </article>


    <footer>
        <p>Everything is possible <a href="javascript:;" title="">❤</a> - Go for <a href="<?php echo U('Admin/User/login');?>"
                title="进入管理员">admin</a></p>
    </footer>

    
    <script src="/Public/Home/js/silder.js"></script>

</body>

</html>