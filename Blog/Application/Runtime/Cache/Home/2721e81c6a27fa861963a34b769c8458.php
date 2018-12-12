<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>

        我的博客--慢生活

    </title>
    <meta name="keywords" content="" />
    <meta name="description" content="主题的个人博客, 优雅、稳重、大气,低调。" />

    
    <link href="/Public/Home/css/base.css" rel="stylesheet">
    <link href="/Public/Home/css/new.css" rel="stylesheet">

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

    

    <article class="blogs">
        <h1 class="t_nav">
            <span>您当前的位置：<a href="<?php echo U('index');?>">首页</a>&nbsp;&gt;&nbsp;
                <a href="<?php echo U('newList');?>">慢生活</a>&nbsp;&gt;&nbsp;<a href="javascript:;"></a></span>
            <a href="<?php echo U('index');?>" class="n1">网站首页</a>
            <a href="javascript:;" class="n2">慢生活</a>
        </h1>
        <div class="index_about">
            <h2 class="c_titile"><?php echo ($data['title']); ?></h2>
            <p class="box_c">
                <span class="d_time">发布时间：<?php echo (date('Y-m-d H:i:s',$data['addtime'])); ?></span>
                <span>编辑：<?php echo ($data["author"]); ?></span>
            </p>
            <ul class="infos">
                <?php echo (htmlspecialchars_decode($data["content"])); ?>
            </ul>
            <div class="keybq">
                <!-- TODO: 待开发关键词 -->
                <p><span>关键字词</span></p>

            </div>
            <div class="ad"> </div>

            <div class="nextinfo">
                <p>上一篇：<a href="<?php echo U('newDetail',array('id'=>$arr['prev']['id']));?>"><?php echo ($arr['prev']['title']); ?></a>
                    <?php if(empty($arr['prev'])): ?>没有了......<?php endif; ?>
                </p>
                <p>下一篇：<a href="<?php echo U('newDetail',array('id'=>$arr['next']['id']));?>"><?php echo ($arr['next']['title']); ?></a>
                    <?php if(empty($arr['next'])): ?>没有了......<?php endif; ?>
                </p>
            </div>

            <div class="otherlink">
                <h2>相关文章</h2>
                <ul>
                    <!-- TODO: 待处理相关文章 -->
                    <!-- 相关文章列表 -->
                    <li>
                        <a href="javascript:;" title="现在，我相信爱情！">现在，我相信爱情！</a>
                    </li>

                </ul>
            </div>
        </div>

        <aside class="right">

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
            <div class="blank"></div>
            <div class="news">
                <h3>
                    <p>最新<span>生活</span></p>
                </h3>
                <ul class="rank">
                    <!-- 最新慢生活 -->
                    <?php if(is_array($newArticle)): $i = 0; $__LIST__ = $newArticle;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                            <a href="<?php echo U('newDetail',array('id'=>$vo['id']));?>" title="<?php echo ($vo["title"]); ?>"><?php echo (msubstr($vo["title"],0,10)); ?><span
                                    style="float:right"><?php echo (date('Y-m-d H:i:s',$vo["addtime"])); ?></a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>

                <h3 class="ph">
                    <p>排行<span>生活</span></p>
                </h3>
                <ul class="paih">
                    <!-- 排行慢生活 -->
                    <?php if(is_array($visitArticle)): $i = 0; $__LIST__ = $visitArticle;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                            <a href="<?php echo U('newDetail',array('id'=>$vo['id']));?>" title="<?php echo ($vo["title"]); ?>"><?php echo (msubstr($vo["title"],0,10)); ?><span
                                    style="float:right"><?php echo (date('Y-m-d H:i:s',$vo["addtime"])); ?></a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <div class="visitors">
                <h3>
                    <p>其它</p>
                </h3>
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
    <script>
        var oTopA = document.getElementById('topnav').getElementsByTagName('a');
        var obj = oTopA[2];
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