<?php 
namespace Admin\Model;
class BookModel extends CommonModel{

    public function getData($params){
        $data = $this   ->  where("{$params['search_val']}")
                        ->  order('addtime desc')
                        ->  limit($params['page'] -> firstRow.','.$params['page'] -> listRows)
                        ->  select();
        return $data;
    }
}