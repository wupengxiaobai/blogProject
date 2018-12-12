<?php 
namespace Home\Model;
use \Think\Model;
class KnowledgeModel extends Model{

    public function getData($parmas){
        $data = $this   ->  field('blog_knowledge.*, blog_menu.name')
                        ->  join('left join blog_menu on blog_knowledge.category_id = blog_menu.id')
                        ->  where("{$parmas['type']}")
                        ->  order('istop desc,id desc')
                        ->  limit($parmas['page']->firstRow.','.$parmas['page']->listRows)
                        ->  select();
        return $data;
    }

    //  查询推荐笔记
    public function findIstopArticle(){
        $data = $this   -> field('blog_knowledge.*,blog_menu.name as categoryname,blog_menu.pid')
                        -> join('left join blog_menu on blog_knowledge.category_id = blog_menu.id')
                        -> where('istop = 1') 
                        -> select();
        foreach($data as $k=>$v){
            $name = D('Menu')->field('name')->find($v['pid']);
            $data[$k]['pname'] = $name['name'];
        }
        return $data;
    }

    //  查询最新笔记,  id, title, category_id(找pid)
    public function findNewArticle($count = 3){
        $data = $this   ->  field('blog_knowledge.id, blog_knowledge.title, blog_knowledge.addtime, blog_menu.pid')
                        ->  join('left join blog_menu on  blog_knowledge.category_id = blog_menu.id')
                        ->  order('addtime desc')
                        ->  limit("{$count}") 
                        ->  select();
        return $data;
    }

    //  查询访问最多笔记,  id, title, category_id(找pid)
    public function findVisitArticle($count = 3){
        $data = $this   ->  field('blog_knowledge.id, blog_knowledge.title, blog_knowledge.addtime,blog_knowledge.lookcount, blog_menu.pid')
                        ->  join('left join blog_menu on  blog_knowledge.category_id = blog_menu.id')
                        ->  order('lookcount desc')
                        ->  limit("{$count}") 
                        ->  select();
        return $data;
    }
    
    //  根据标题模糊查询
    public function getDataLikeTitle($search_val){
        $data = $this -> field('blog_knowledge.*,blog_menu.name as categoryname')
                      -> join("left join blog_menu on blog_knowledge.category_id = blog_menu.id")
                      -> where("title like '%{$search_val}%'") -> select();
        // 给数据添加/修改需求项
        foreach ($data as $key => $value) {
            $data[$key]['action'] = 'know';
            $data[$key]['addtime'] = date('Y-m-d',$data[$key]['addtime']);
            $data[$key]['pname'] = '学无止境';
            $data[$key]['content'] = htmlspecialchars_decode($data[$key]['content']);
        } 
        return $data;
    }
}