<?php 
namespace Home\Model;
use \Think\Model;
class MenuModel extends Model{
    protected $fields = array('id, name');
    
    //  定义方法获取慢生活类别
    public function getmenuType($category_id){
        $data = $this -> field('id,name') ->  where("pid = $category_id") ->  select();
        return $data;
    }
}