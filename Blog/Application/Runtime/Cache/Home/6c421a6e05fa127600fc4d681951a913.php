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
  <!--  <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <script>
      //  文章内容取前2个p,省略号代替
      $(function(){
        $('.content').find('p').each(function () {
          if ($(this).index() > 1) {
            $(this).remove()
          }
        })
        $('.content').append('<span>...</span>')
      })
    </script> -->

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
      <span>“慢生活”不是懒惰，放慢速度不是拖延时间，而是让我们在生活中寻找到平衡。</span>
      <a href="<?php echo U('index');?>" class="n1">网站首页</a>
      <a href="javascript:;" class="n2">慢生活</a>
    </h1>
    <div class="newblog left" style="min-height:470px;">

      <!-- 慢生活列表 -->
      <?php if(is_array($newlist)): $i = 0; $__LIST__ = $newlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="new-item">
          <h2><?php echo ($vo["title"]); ?></h2>
          <p class="dateview">
            <span>发布时间：<?php echo (date('Y-m-d H:i:s',$vo["addtime"])); ?></span>
            <span>作者：<?php echo ($vo["author"]); ?></span>
            <span>分类：[<a href="javascript:;"><?php echo ($vo["name"]); ?></a>]</span>
          </p>
          <figure><img src="<?php echo ($vo["picture"]); ?>"></figure>
          <ul class="nlist" style="overflow:hidden">
            <div class='content' style="height:91px;overflow:hidden;">
              <?php echo (bqsub(htmlspecialchars_decode($vo["content"]),"</p>")); ?>
            </div>
            <a href="<?php echo U('newDetail',array('id'=>$vo['id']));?>" target="" class="readmore">阅读全文>></a>
          </ul>
          <div class="line"></div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
      <p style="padding:20px;">共有 <?php echo ($totalRows); ?> 条[慢生活系列]</p>
      <div class="my-page">
        <?php if(empty($show)): ?>没有更多了...<?php endif; ?>
        <?php echo ($show); ?>
      </div>

    </div>
    <aside class="right">
      <div class="rnav">
        <ul>
          <!-- 慢生活类别 -->
          <?php if(is_array($newType)): $key = 0; $__LIST__ = $newType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><li class="rnav<?php echo ($key); ?>">
              <a href="<?php echo U('newlist',array('type'=>$vo['id']));?>" target=""><?php echo ($vo["name"]); ?></a>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </div>
      <div class="news">
        <h3>
          <p>最新<span>生活</span></p>
        </h3>
        <ul class="rank">

          <!-- 最新慢生活 -->
          <?php if(is_array($newArticle)): $i = 0; $__LIST__ = $newArticle;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
              <a href="<?php echo U('newDetail',array('id'=>$vo['id']));?>" title="<?php echo ($vo["title"]); ?>"><?php echo (msubstr($vo["title"],0,6)); ?><span
                  style="float:right"><?php echo (date('Y-m-d H:i:s',$vo["addtime"])); ?></a>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <?php if(empty($visitArticle)): ?><ul>
            <li style="border: none;text-align: center">
              没有更多相关文章
            </li>
          </ul><?php endif; ?>
        <h3 class="ph">
          <p>点击<span>排行</span></p>
        </h3>
        <ul class="paih">

          <!-- 排行慢生活 -->
          <?php if(is_array($visitArticle)): $i = 0; $__LIST__ = $visitArticle;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
              <a href="<?php echo U('newDetail',array('id'=>$vo['id']));?>" title="<?php echo ($vo["title"]); ?>"><?php echo (msubstr($vo["title"],0,6)); ?><span
                  style="float:right"><?php echo (date('Y-m-d H:i:s',$vo["addtime"])); ?></a>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <?php if(empty($visitArticle)): ?><ul>
            <li style="border: none;text-align: center">
              没有更多相关文章
            </li>
          </ul><?php endif; ?>
      </div>
      <div class="visitors">
        <h3>
          <p>页面分享</p>
        </h3>
        <!-- Baidu Button BEGIN -->
        <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare"><a class="bds_tsina"></a><a class="bds_qzone"></a><a
            class="bds_tqq"></a><a class="bds_renren"></a><span class="bds_more"></span><a class="shareCount"></a></div>
        <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585"></script>
        <script type="text/javascript" id="bdshell_js"></script>
        <script type="text/javascript">
          document.getElementById("bdshell_js").src =
            "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date() /
              3600000)
        </script>
        <!-- Baidu Button END -->
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