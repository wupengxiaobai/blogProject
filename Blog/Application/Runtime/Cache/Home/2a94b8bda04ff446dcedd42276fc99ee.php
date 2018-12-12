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
  <link href="/Public/Home/css/index.css" rel="stylesheet">

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

    
  <div class="banner" data-banner="<?php echo ($websiteInfo['banner']); ?>">
    <section class="box">
      <ul class="texts" data-banner="<?php echo ($websiteInfo['banner_text']); ?>">
      </ul>
      <div class="avatar">
        <a href="#" data-avatar="<?php echo ($websiteInfo['avatar']); ?>"><span><?php echo ($websiteInfo['avatar_text']); ?></span></a>
      </div>
    </section>
  </div>
  <article>
    <h2 class="title_tj">
      <p>文章<span>推荐</span></p>
    </h2>
    <div class="bloglist left" style="overflow:hidden">

      <!-- 文章列表 -->
      <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="article_item">
          <h3><?php echo ($vo["title"]); ?></h3>
          <figure><img src="<?php echo ($vo["picture"]); ?>"></figure>
          <ul style="overflow:hidden;">
            <div class="content" style="height:91px;overflow:hidden;"><?php echo (bqsub(htmlspecialchars_decode($vo["content"]),"</p>")); ?></div>
            <a href="<?php if($vo["pid"] == 3 ): echo U('newDetail',array('id' => $vo['id'])); else: echo U('know',array('id' => $vo['id'])); endif; ?>"
              class="readmore">阅读全文>></a>
          </ul>
          <p class="dateview">
            <span><?php echo (date('Y-m-d',$vo["addtime"])); ?></span>
            <span>作者：<?php echo ($vo["author"]); ?></span>
            <span><?php echo ($vo["pname"]); ?>[<a href="javascript:;"><?php echo ($vo["categoryname"]); ?></a>]</span>
          </p>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>

    </div>
    <aside class="right">
      <div class="news">
        <div class="search">
          <label>
            <h3 class="search">
              <p>站内<span>搜索</span></p>
            </h3>
            <input type="text" name="search_article" class="search_article" placeholder="请输入关键字, 回车搜索">
          </label>
        </div>
        <h3>
          <p>最新<span>文章</span></p>
        </h3>
        <ul class="rank">

          <!-- 最新文章链接 -->
          <?php if(is_array($newArticle)): $i = 0; $__LIST__ = $newArticle;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
              <a href="<?php if($vo["pid"] == 3 ): echo U('newDetail',array('id'=>$vo['id'])); else: echo U('know',array('id'=>$vo['id'])); endif; ?>"
                title="<?php echo ($vo["title"]); ?>" target="_blank"><?php echo (msubstr($vo["title"],0,10)); ?><span style="float:right"><?php echo (date('Y-m-d',$vo["addtime"])); ?></span>
              </a>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>

        </ul>
        <h3 class="ph">
          <p>点击<span>排行</span></p>
        </h3>
        <ul class="paih">

          <!-- 文章点击排行 -->
          <?php if(is_array($visitArticle)): $i = 0; $__LIST__ = $visitArticle;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
              <a href="<?php if($vo["pid"] == 3 ): echo U('newDetail',array('id'=>$vo['id'])); else: echo U('know',array('id'=>$vo['id'])); endif; ?>"
                title="<?php echo ($vo["title"]); ?>" target="_blank"><?php echo ($vo["title"]); ?><span style="float:right"><?php echo (date('Y-m-d',$vo["addtime"])); ?></span></a>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>

        </ul>
        <h3 class="links">
          <p>友情<span>链接</span></p>
        </h3>
        <ul class="website">

          <!-- 友情链接 -->
          <?php if(is_array($friendlyLink)): $i = 0; $__LIST__ = $friendlyLink;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
              <a href='<?php echo ($vo["link"]); ?>' target="_blank"><?php echo ($vo["name"]); ?></a>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>


        </ul>

        <h3 class="links">
          <p>页面<span style="color:gold">分享</span></p>
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
        <a href="javascript:;" title="没事就扫我吧" class="weixin" data-weixin="<?php echo ($websiteInfo['weixin']); ?>"> </a>
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
    //  处理首页一些网站基本信息
    (function () {
      //  处理 头像
      var url = $('.avatar').find('a').attr('data-avatar');
      $('.avatar').find('a').css({
        backgroundImage: 'url(' + url + ')'
      })

      //  处理banner文字
      var text = $('.texts').attr('data-banner');
      var arr = text.split('|');
      var str = "";
      for (var key in arr) {
        str += '<p>' + arr[key] + '</p>';
      }
      $('.texts').append(str)

      //  处理bannner 图
      var bannerlink = $('.banner').attr('data-banner');
      $('.banner').css({
        backgroundImage: 'url(' + bannerlink + ')',
        backgroundRepeat: 'no-repeat',
        backgroundSize: 'cover',
        backgroundPosition: 'center'
      })

      //  处理微信
      var weixinlink = $('.weixin').attr('data-weixin');
      $('.weixin').css({
        backgroundImage: 'url(' + weixinlink + ')',
        backgroundRepeat: 'no-repeat',
        backgroundSize: 'cover',
        backgroundPosition: 'center'
      })


      //  处理搜索功能
      $('.search_article').on('keydown', function (ev) {
        if (ev.keyCode == 13) {
          var search_val = $(this).val();
          //  发送ajax获取搜索文章显示在指定位置
          $.ajax({
            url: "<?php echo U('index');?>",
            data: {
              search_val: search_val
            },
            dataType: 'json',
            success: function (data) {
              var str = '';
              if (data['err_code'] == 1) {
                if (!data['msg']) {
                  $('.bloglist').html('没有匹配文章! 换个关键词试试...');
                  return;
                }
                if (data['msg'].length) {
                  for (var key in data['msg']) {
                    str +=
                      `<div class="article_item">
                                      <h3>${data['msg'][key]['title']}</h3>
                                      <figure><img src="${data['msg'][key]['picture']}"></figure>
                                      <ul style="overflow:hidden;">
                                          <div class='content'>${data['msg'][key]['content']}</div>
                                          <a href="U('${data['msg'][key]['action']}',array('id'=>${data['msg'][key]['id']}))" class="readmore">阅读全文>></a>
                                      </ul>
                                      <p class="dateview">
                                          <span>${data['msg'][key]['addtime']}</span>
                                          <span>作者：${data['msg'][key]['author']}</span>
                                          <span>${data['msg'][key]['pname']} [<a href="javascript:;">${data['msg'][key]['categoryname']}</a>]</span>
                                      </p>
                                  </div>`
                  }
                  $('.bloglist').html(str);
                } else {
                  $('.bloglist').html('没有匹配文章! 换个关键词试试...');
                }
              }
            },
            error: function (err) {
              console.log('服务器错误了!')
            }
          })
        }
      })
    })()
  </script>

  <script src="/Public/Home/js/silder.js"></script>
  <script>
    var oTopA = document.getElementById('topnav').getElementsByTagName('a');
    var obj = oTopA[0];
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