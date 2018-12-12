<?php 
namespace Admin\Model;
class AboutModel extends CommonModel{

    //  自定义字段
    protected $fields = array('id', 'title', 'content', 'sort');

    //  查询数据并返回
    public function findData(){
        return $this->find();
    }

    //  保存数据并返回bool
    public function saveData($post){
        return $this->save($post);
    }
}