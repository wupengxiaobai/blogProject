<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>

        我的博客--简历

    </title>
    <meta name="keywords" content="" />
    <meta name="description" content="主题的个人博客, 优雅、稳重、大气,低调。" />

    
    <link href="/Public/Home/css/base.css" rel="stylesheet">
    <link href="/Public/Home/css/style.css" rel="stylesheet">
    <style>
        .main {
            margin: 20px 0px;
            padding: 20px 50px;
        }

        .main .left,
        .main .right {
            width: 48%;
            min-height: 200px;
        }

        .main .left .desc {
            width: 355px;
        }

        .main .left .desc .name {
            margin: 42px 0px 22px 32px;
            font-size: 32px;
            font-weight: 600;
            color: #000;
        }

        .main .left .desc .profession {
            font-size: 22px;
            font-weight: 200;
            color: rgb(192, 80, 77);
        }

        .main .left .desc .profession span {
            color: rgb(126, 126, 126);
        }

        .main .left .myself {
            margin-top: 22px;
            width: 320px
        }

        .main .left .myself ul li {
            margin-top: 20px;
            font-size: 16px;
            color: rgb(154, 145, 96);
            border-bottom: 1px solid rgb(190, 190, 190);
        }

        .main .left .myself ul li .item {
            display: inline-block;
            width: 135px;
        }

        .main .left .myself ul li.tt {
            font-size: 22px;
            font-weight: 600;
            color: rgb(126, 126, 126)
        }

        .main .left .skill {
            margin-top: 80px;
        }

        .main .left .skill ul li.tt {
            color: #333;
            font-weight: normal;
        }
        .main .left .skill ul li span.val{
            letter-spacing: 5px;
        }

        .main .right .top {
            margin-top: 30px;
            width: 100%;
            overflow: hidden;
        }

        .main .right .top .avatar {
            float: right;
            margin-right: 80px;
            margin-top: 10px;
            width: 138px;
            height: 170px;
            box-shadow: 3px 0px 3px 1px #ccc, 2px 1px 3px 1px #ccc, 2px -1px 3px 1px #ccc;
        }

        .main .right .top .avatar img {
            margin: 5px 9px;
            width: 120px;
            height: 160px;
        }

        .main .right .top .desc {
            float: right;
            margin-top: 30px;
            text-indent: 2em;
            width: 340px;
            font-size: 16px;
        }

        .main .right .whyme {
            float: right;
            margin-top: 80px;
            width: 340px;
        }

        .main .right .whyme .title {
            margin-bottom: 15px;
            font-size: 30px;
            color: #333;
            font-weight: 600;
        }

        .main .right .whyme .title span {
            color: red;
            display: inline-block;
            animation: xinxin 1s infinite alternate forwards;
        }

        @keyframes xinxin {
            0% {
                transform: scale(1);
                text-shadow: 0 0 2px red;
            }

            100% {
                transform: scale(1.5);
                text-shadow: 0 0 5px red;
            }
        }

        .main .right .whyme .desc {
            font-size: 15px;
        }

        .main .bottom {
            margin-top: 80px;
            width: 100%;
            min-height: 20px;
        }

        .main .bottom .title {
            font-size: 30px;
            color: #333;
            margin-bottom: 10px;
            border-bottom: 1px solid rgb(190, 190, 190);
        }

        .main .bottom .content {
            text-indent: 2em;
            font-size: 16px;
        }

        .main .section3 {
            position: relative;
            margin-top: 120px;
            width: 100%;
            min-height: 1100px;
        }

        .main .section3 h2 {
            position: absolute;
            top: -20px;
            width: 100%;
            font-size: 30px;
            color: #333;
            border-bottom: 1px solid rgb(190, 190, 190);
            margin-bottom: 10px;
            font-weight: 400;
        }

        .main .section3 .line {
            position: absolute;
            top: 100px;
            left: 50%;
            margin-left: -1px;
            width: 3px;
            height: 950px;
            background: rgb(73, 125, 186);
        }

        .main .section3 .title {
            position: absolute;
            top: 50px;
            left: 50%;
            margin-left: -100px;
            text-align: center;
            line-height: 30px;
            width: 200px;
            height: 30px;
            font-weight: 600;
            font-size: 28px;
            color: rgb(78, 73, 73);
            cursor: default;
        }

        .main .section3 .title_end{
            top: 1080px;
            margin-left: -150px; 
            width:300px;
        }


        .main .section3 .dot {
            position: absolute;
            left: 50%;
            margin-left: -4px;
            width: 6px;
            height: 6px;
            background-color: rgb(78, 73, 73);
            border: 2px solid #fff;
            border-radius: 50%;
        }

        .main .section3 .dot.start {
            top: 100px;
            margin-left: -5px;
            width: 8px;
            height: 8px;
            background-color: rgb(73, 125, 186);
        }

        .main .section3 .dot.end {
            top: 1050px;
            margin-left: -10px;
            width: 0px;
            height: 0px;
            border-radius: 0px;
            border-width: 10px;
            border-top-color: rgb(73, 125, 186);
            border-left-color: transparent;
            border-right-color: transparent;
            border-bottom-color: transparent;
            border-style: solid;
            background-color: transparent;
        }


        .main .section3 .dot {
            top: 180px;
        }

        .main .section3 .dot div {
            position: absolute;
        }

        .main .section3 .dot .cont {
            left: -300px;
            transform: translateY(-50%);
            padding: 10px;
            width: 260px;
            text-indent: 2em;
            background-color: rgb(73, 125, 186);
            color: #fff;
            cursor: default;
            transition: .5s;
        }

        .main .section3 .dot .cont:hover {
            box-shadow: 0px 0px 5px 2px #ddd;
            transform: translateY(-55%);
        }


        .main .section3 .dot .time {
            left: 30px;
            top: -22px;
            padding: 10px;
            width: 180px;
            font-size: 22px;
            color: rgb(78, 73, 73);
        }

        .main .section3 .dot.dot1 {
            top: 360px;
        }

        .main .section3 .dot.dot1 .cont {
            top: 0px;
            left: 30px;
            background-color: rgb(156, 194, 193);
        }

        .main .section3 .dot.dot1 .time {
            top: -22px;
            left: -210px;
        }

        .main .section3 .dot.dot2 {
            top: 500px;
        }

        .main .section3 .dot.dot2 .cont {
            background: rgb(150, 166, 188);
        }

        .main .section3 .dot.dot3 {
            top: 680px;
        }

        .main .section3 .dot.dot3 .cont {
            top: 0px;
            left: 30px;
            background: rgb(212, 150, 177);
        }

        .main .section3 .dot.dot3 .time {
            top: -22px;
            left: -210px;
        }

        .main .section3 .dot.dot4 {
            top: 830px;
        }

        .main .section3 .dot.dot4 .cont {
            background: rgb(164, 186, 133);
        }

        .main .section3 .dot.dot5 {
            top: 950px;
        }

        .main .section3 .dot.dot5 .cont {
            top: 0px;
            left: 30px;
            font-weight: 600px;
            background-color: rgb(192, 80, 77);
        }

        .main .section3 .dot.dot5 .time {
            top: -22px;
            left: -180px;
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

    
    <article class="blogs">
        <h1 class="t_nav">
            <span>"简历", 我求职的密匙.</span>
            <a href="<?php echo U('index');?>" class="n1">网站首页</a>
            <a href="javascript:;" class="n2">我的简历</a>
        </h1>

        <div class="main">
            <section class="section1 clearFix">
                <div class="left">
                    <div class="desc">
                        <p class="name">吴鹏</p>
                        <p class="profession"><?php echo ($data['work']); ?> <span>实习</span></p>
                    </div>
                    <!-- 简介 -->
                    <div class="myself">
                        <ul>
                            <li class="tt"><span class="item">个人信息</span></li>
                            <li><span class="item">姓名</span><span class='val'><?php echo ($data['name']); ?></span></li>
                            <li><span class="item">出生</span><span class='val'><?php echo ($data['birthday']); ?></span></li>
                            <li><span class="item">所在地</span><span class='val'><?php echo ($data['address']); ?></span></li>
                            <li><span class="item">Email</span><span class='val'><?php echo ($data['email']); ?></span></li>
                            <li><span class="item">手机</span><span class='val'><?php echo ($data['mobilephone']); ?></span></li>
                            <li><span class="item">QQ</span><span class='val'><?php echo ($data['qq']); ?></span></li>
                            <li><span class="item">情感状况</span><span class='val'><?php echo ($data['emotion']); ?></span></li>
                        </ul>
                    </div>
                    <!-- 技能评估 -->
                    <div class="skill myself">
                        <ul>
                            <li class="tt"><span class="item">专业技能</span></li>
                            <?php if(is_array($skill)): $i = 0; $__LIST__ = $skill;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><span class="item"><?php echo ($vo["skillname"]); ?></span><span class='val' style='color:gold'><?php echo (str_repeat('●',$vo["grade"])); ?></span><span class='val' style="color:gainsboro;"><?php echo (str_repeat('●',$vo["residue"])); ?></span></li><?php endforeach; endif; else: echo "" ;endif; ?>
                           
                        </ul>
                    </div>
                </div>
                <div class="right">
                    <div class="top">
                        <div class="avatar">
                            <img src="<?php echo ($data['avatar']); ?>" alt="">
                        </div>
                        <div class="desc"><?php echo ($data['desc']); ?></div>
                    </div>
                    <div class="whyme">
                        <div class="title">为什么选我? <span>❤</span></div>
                        <div class="desc"><?php echo (htmlspecialchars_decode($data['whyme'])); ?></div>
                    </div>
                </div>
            </section>

            <section class="section2">
                <div class="bottom">
                    <div class="title">自我评价</div>
                    <div class="content"><?php echo ($data['myself']); ?></div>
                </div>
            </section>

            <section class="section3">
                <h2>校园经历</h2>
                <div class="title">我的大学</div>
                <div class="title title_end">Everything Is Possible</div>
                <div class="line"></div>
                <div class="dot start"></div>
                <?php if(is_array($experience)): $key = 0; $__LIST__ = $experience;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><div class="dot dot<?php echo ($key-1); ?>">
                        <div class="cont"><?php echo ($vo["content"]); ?></div>
                        <div class="time"><?php echo ($vo["time"]); ?></div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                <div class="dot end"></div>
            </section>
        </div>
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