<?php
namespace Admin\Model;

class MenuModel extends CommonModel{


    //  获取数据
    public function getData($params){
        $data = $this   ->  where("{$params['search_val']} and pid>0")
                        ->  limit($params['page'] -> firstRow.','.$params['page'] -> listRows)
                        ->  order('id desc')
                        ->  select();
        return $data;
    }

 
}