<?php
namespace Home\Controller;

use \Think\Controller;

class IndexController extends Controller
{

    //  博客首页的显示
    public function index(){
        $newModel = D('New_list');
        $knowledgeModel = D('Knowledge');

        //  1. 查询推荐文章数据并构造一个合理的数据数组
        $newdata = $newModel -> findIstopArticle();
        $knowledgedata = $knowledgeModel -> findIstopArticle();
        //  合并数组,并根据时间倒序: 推荐文章数据
        $data = array_merge($newdata, $knowledgedata);
        //  抽取排序的条件属性.
        $data = array_sort($data,'addtime','desc');


        //  2. 最新文章的查询前三条: id, title, pid, addtime
        $newArticle1 = $newModel -> findNewArticle();
        $newArticle2 = $knowledgeModel -> findNewArticle();
        $newArticle = array_merge($newArticle1, $newArticle2);
        $newArticle = array_sort($newArticle,'addtime','desc');


        //  3. 文章点击排行前三: id, title, pid, addtime
        $visitArticle1 = $newModel -> findVisitArticle();
        $visitArticle2 = $knowledgeModel -> findVisitArticle();
        $visitArticle = array_merge($visitArticle1, $visitArticle2);
        //  使用自定义函数 array_sort 进行二维数组按照指定key值排序
        $visitArticle = array_sort($visitArticle,'lookcount','desc');
        unset($visitArticle[5]);    //  删除数组第六个取前五


        //  4. 友情链接
        $friendlyLink = M('Friendly')->limit(5)->select();

        
        //  5. 网站基本信息数据
        $websiteInfo = M('Info')->find();


        //  6. 搜索框处理
        if(IS_AJAX){
            $search_val = I('get.search_val');
            if(empty($search_val)){
                $search_val = '';
            }else{
                $search_val =  I('get.search_val');
            }
            //  6.1 执行模糊查找获得结果重新赋值 data 数据
            $newdata = $newModel -> getDataLikeTitle($search_val);
            $knowledgedata = $knowledgeModel -> getDataLikeTitle($search_val);
            $data = array_merge($newdata, $knowledgedata);
            $data = array_sort($data,'addtime','desc');
            foreach ($data as $key => $value) {
              $value['content'] = bqsub($value['content'], "</p>");
              $arrdata[] = $value;
            }
            $this -> ajaxReturn(array('err_code'=> 1, 'msg'=> $arrdata));
        }
        
        $this->assign(array(
            'data'          =>  $data,
            'newArticle'    =>  $newArticle,
            'visitArticle'  =>  $visitArticle,
            'friendlyLink'  =>  $friendlyLink,
            'websiteInfo'   =>  $websiteInfo
        ));
        $this->display();
    }

    //  博客关于我的显示
    public function about(){
        // 查询数据并且赋值视图
        $about = M('About')->find();
        $about['content'] = htmlspecialchars_decode($about['content']);

        //  网站基本信息数据
        $websiteInfo = M('Info')->find();

        $this->assign(array(
            'about' =>  $about,
            'websiteInfo' => $websiteInfo
        ));
        $this->display('Index/about');
    }

    //  博客慢生活的显示
    public function newlist(){
        $model = D('New_list');
        //  类型
        $type = I('get.type') ? 'blog_new_list.category_id = ' . I('get.type') : '2>1';
        //  分页
        $count = $model -> where(" $type ") -> count();
        $page = new \Think\Page($count, 3);
        $page-> rollPage = 5;
        $page->setConfig('prev','<');
        $page->setConfig('next','>');
        $page->setConfig('first','<<');
        $page->setConfig('last','>>');

        $totalRows = $page -> totalRows;

        //  分页的 html 
        $show    = $page  -> show();
        //  获取传递的分页页面值
        $params = array(
            'type' =>  $type,
            'page' =>  $page
        );
        //  查询数据并且赋值视图
        $newlist = $model -> getData($params);

        //  查询慢生活类别
        $category_id = 3;
        $newType = D('Menu') -> getmenuType($category_id);

        //  查询最新
        $count = 5;
        $newArticle = $model -> findNewArticle($count);
        //  查看访问最多
        $visitArticle = $model -> findVisitArticle($count);
      
        //  网站基本信息数据
        $websiteInfo = M('Info')->find();

        $this->assign(array(
            'newlist'       =>   $newlist,
            'newType'       =>   $newType,
            'show'          =>   $show,
            'totalRows'     =>   $totalRows,
            'newArticle'    =>   $newArticle,
            'visitArticle'  =>   $visitArticle,
            'websiteInfo'   =>   $websiteInfo
        ));
        $this->display('Index/newlist');
    }

    //  慢生活详情文章显示
    public function newDetail(){
        $id = I('get.id');
        $model = D('New_list');

        // 当前条详情数据的查询
        $data = $model   ->  field('blog_new_list.*,blog_menu.name')
                                ->  join('left join blog_menu on blog_new_list.category_id = blog_menu.id')
                                ->  where("blog_new_list.id={$id}")
                                ->  find();
        //  上下条数据
        $prev = $model   ->  field('id,title') 
                                ->  where("blog_new_list.id > $id")
                                ->  order('istop desc,id asc')
                                ->  limit(1)
                                ->  find();
        $next = $model   ->  field('id,title') 
                                ->  where("blog_new_list.id < $id")
                                ->  order('istop desc,id desc')
                                ->  limit(1)
                                ->  find();
        $arr = array(
            'prev' => $prev,
            'next' => $next
        );

        //  查询最新
        $count = 5;
        $newArticle = $model -> findNewArticle($count);
        //  查看访问最多
        $visitArticle = $model -> findVisitArticle($count);

        //  访问+1
        D() -> execute("update blog_new_list set lookcount = lookcount+1 where id={$id}");

        
        //  网站基本信息数据
        $websiteInfo = M('Info')->find();

        $this->assign(array(
            'data'          => $data,
            'arr'           => $arr,
            'newArticle'    => $newArticle,
            'visitArticle'  => $visitArticle,
            'websiteInfo'   => $websiteInfo
        ));  
        $this->display('Index/new');
    }

    //  博客碎言碎语
    public function moodlist(){ 
        $model = D('Moodlies');
        //  分页
        $count = $model -> count();
        $page = new \Think\Page($count, 5);
        $page-> rollPage = 5;
        $page->setConfig('prev','<');
        $page->setConfig('next','>');
        $page->setConfig('first','<<');
        $page->setConfig('last','>>');

        $totalRows = $page -> totalRows;

        //  分页的 html 
        $show    = $page  -> show();
        //  获取传递的分页页面值
        $params = array(
            'page' =>  $page
        );
        $data = $model -> getData($params);

        //  网站基本信息数据
        $websiteInfo = M('Info')->find();

        $this -> assign(array(
            'totalRows' => $totalRows,
            'data' => $data,
            'show' => $show,
            'websiteInfo' => $websiteInfo
        ));
        //  获取数据渲染视图
        $this->display('Index/moodlist');
    }

    //  博客学无止境的显示
    public function knowledge(){
        $model = D('Knowledge');
        //  类型
        $type = I('get.type') ? 'blog_knowledge.category_id = ' . I('get.type') : '2>1';
        //  分页
        $count = $model -> where(" $type ") -> count();
        $page = new \Think\Page($count, 3);
        $page-> rollPage = 5;
        $page->setConfig('prev','<');
        $page->setConfig('next','>');
        $page->setConfig('first','<<');
        $page->setConfig('last','>>');

        $totalRows = $page -> totalRows;

        //  分页的 html 
        $show    = $page  -> show();
        //  获取传递的分页页面值
        $params = array(
            'type' =>  $type,
            'page' =>  $page
        );
        //  查询数据并且赋值视图
        $knowledge = $model -> getData($params);
        //  查询慢生活类别
        $category_id = 5;
        $knowledgeType = D('Menu') -> getmenuType($category_id);

        //  查询最新
        $count = 5;
        $newArticle = $model -> findNewArticle($count);
        //  查看访问最多
        $visitArticle = $model -> findVisitArticle($count);

        //  网站基本信息数据
        $websiteInfo = M('Info')->find();

        $this->assign(array(
            'knowledge'         =>   $knowledge,
            'knowledgeType'     =>   $knowledgeType,
            'show'              =>   $show,
            'totalRows'         =>   $totalRows,
            'newArticle'        =>   $newArticle,
            'visitArticle'      =>   $visitArticle,
            'websiteInfo'       =>   $websiteInfo
        ));
        $this->display('Index/knowledge');

    }

    //  学无止境文章详情显示
    public function know(){
        $id = I('get.id');
        
        $model = D('Knowledge');
        // 当前条详情数据的查询
        $data = $model   ->  field('blog_knowledge.*,blog_menu.name')
                                ->  join('left join blog_menu on blog_knowledge.category_id = blog_menu.id')
                                ->  where("blog_knowledge.id={$id}")
                                ->  find();
        //  上下条数据
        $prev = $model   ->  field('id,title') 
                                ->  where("blog_knowledge.id > $id")
                                ->  order('istop desc,id asc')
                                ->  limit(1)
                                ->  find();
        $next = $model   ->  field('id,title') 
                                ->  where("blog_knowledge.id < $id")
                                ->  order('istop desc,id desc')
                                ->  limit(1)
                                ->  find();
        $arr = array(
            'prev' => $prev,
            'next' => $next
        );

        //  查询最新
        $count = 5;
        $newArticle = $model -> findNewArticle($count);
        //  查看访问最多
        $visitArticle = $model -> findVisitArticle($count);

        
        //  访问+1
        D() -> execute("update blog_knowledge set lookcount = lookcount+1 where id={$id}");

        //  网站基本信息数据
        $websiteInfo = M('Info')->find();

        $this->assign(array(
            'data'          =>   $data,
            'arr'           =>   $arr,
            'newArticle'    =>   $newArticle,
            'visitArticle'  =>   $visitArticle,
            'websiteInfo'   =>   $websiteInfo
        ));  
        $this->display('Index/know');
    }

    //  博客我的简历
    public function resume(){
        //  查询基本信息数据
        $data = M('Resume') -> order('sort asc') -> find();
        //  查询技能值并处理数据
        $skill = M('Resume_skill') -> order('sort')-> select();
        foreach($skill as $key=>$item){
            $skill[$key]['residue'] = 10 - (int)$item['grade'];
        }
        //  查询经历
        $experience = M('Resume_experience')  -> select();
        
        //  网站基本信息数据
        $websiteInfo = M('Info')->find();
        // dump($data);die;
        $this->assign(array(
            'data' => $data,
            'skill' => $skill,
            'experience' => $experience,
            'websiteInfo'  => $websiteInfo
        ));
        $this->display('Index/resume');
    }

    //  博客留言板
    public function book(){
        if (IS_POST) {
            $post = I('post.');
            //  直接插入数据操作
            $post['addtime'] = time();
            $res = M('Book')->add($post);
            if($res){
                echo json_encode(array('err_code'=>'1','msg'=>'留言成功'));
            }else{
                echo json_encode(array('err_code'=>'0','msg'=>'留言失败'));
            }
        }else{
            
            //  网站基本信息数据
            $websiteInfo = M('Info')->find();
            $this->assign(array(
                'websiteInfo'  => $websiteInfo
            ));
            $this->display('Index/book');
        }
    }

    //  空
    public function _empty(){
      $this->display('Empty/404');
    }

}