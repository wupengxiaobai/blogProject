<?php 
namespace Home\Model;

use \Think\Model;
class MoodliesModel extends Model{
    
    //  定义方法获取碎言碎语数据类别
    public function getData($params){
        $data = $this   ->  order('istop desc,addtime desc')  
                        ->  limit($params['page'] -> firstRow.','.$params['page'] -> listRows)
                        ->  select();
        return $data;
    }
}