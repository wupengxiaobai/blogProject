<?php 
namespace Home\Model;
use \Think\Model;
class NewListModel extends Model{

    public function getData($parmas){
        $data = $this   ->  field('blog_new_list.*, blog_menu.name')
                        ->  join('left join blog_menu on blog_new_list.category_id = blog_menu.id')
                        ->  where("{$parmas['type']}")
                        ->  order('istop desc,id desc')
                        ->  limit($parmas['page']->firstRow.','.$parmas['page']->listRows)
                        ->  select();
        return $data;
    }

    //  查询推荐文章
    public function findIstopArticle(){
        $data = $this   -> field('blog_new_list.*,blog_menu.name as categoryname,blog_menu.pid')
                        -> join('left join blog_menu on blog_new_list.category_id = blog_menu.id')
                        -> where('istop = 1') 
                        -> select();
        foreach($data as $k=>$v){
            $pname = D('Menu')->field('name')->find($v['pid']);
            $data[$k]['pname'] = $pname['name'];
        };
        return $data;
    }

    //  查询最新文章,  id, title, category_id(找pid), addtime
    public function findNewArticle($count=3){
        $data = $this   ->  field('blog_new_list.id, blog_new_list.title,blog_new_list.addtime, blog_menu.pid')
                        ->  join('left join blog_menu on blog_new_list.category_id = blog_menu.id')
                        ->  order('addtime desc')
                        ->  limit("{$count}") 
                        ->  select();
        return $data;
    }

    //  查询访问最多,  id, title, category_id(找pid), addtime
    public function findVisitArticle($count=3){
        $data = $this   ->  field('blog_new_list.id, blog_new_list.title,blog_new_list.addtime,blog_new_list.lookcount, blog_menu.pid')
                        ->  join('left join blog_menu on blog_new_list.category_id = blog_menu.id')
                        ->  order('lookcount desc')
                        ->  limit("{$count}") 
                        ->  select();
        return $data;
    }

    //  根据标题模糊查询
    public function getDataLikeTitle($search_val){
        $data = $this   -> field('blog_new_list.*,blog_menu.name as categoryname')
                        -> join("left join blog_menu on blog_new_list.category_id = blog_menu.id")
                        -> where("title like '%{$search_val}%'") -> select();
        // 给属性添加请求地址
        foreach ($data as $key => $value) {
            $data[$key]['action'] = 'new';
            $data[$key]['addtime'] = date('Y-m-d',$data[$key]['addtime']);
            $data[$key]['pname'] = '慢生活';
            $data[$key]['content'] = htmlspecialchars_decode($data[$key]['content']);
        } 
        return $data;
    }
}