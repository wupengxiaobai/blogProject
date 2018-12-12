<?php
namespace Admin\Model;
class RuleModel extends CommonModel{
    //  自定义字段
    protected $fields = array('id', 'rule_name', 'module_name', 'controller_name', 'action_name', 'parent_id', 'is_show');
    //  自动验证
    protected $_validate = array(
        array('rule_name','require','权限名称不能为空'),
        array('module_name','require','模型不能为空'),
        array('controller_name','require','控制器不能为空'),
        array('action_name','require','方法不能为空'),
    ); 

    //  获取某个分类的子分类
    public function getChildren($id=0){
        $data = $this -> select();
        $list = getTree2($data,$id,1);
        return $list;
    }

    public function getCateTree(){
        $data  = $this->field('t1.id,t1.rule_name,t1.module_name,t1.controller_name,t1.action_name,t1.parent_id,t1.is_show,t2.rule_name as parent_name')->alias('t1')->join("left join blog_rule as t2 on t1.parent_id = t2.id")->select();
        $list = getTree2($data);      
        return $list;
    }

    //  删除
    public function remove($rule_id){
        $res = $this->where("parent_id = $rule_id")->select();
        if($res){   //  如果说该权限下存在子权限, 则不能删除
            return false;
        }
        return $this -> where("id = $rule_id") -> delete();
    }

    //  查询一条数据的详情
    public function findOne($id){
        return $this -> where("id = $id") -> find();
    }

    //  更新数据
    public function update($data){
        //  需要过滤掉设置父分类为自己或者自己下的子分类
        $trees = $this->getChildrenIds($data['id']);
        //  将自己的id放入到排除的id中
        $trees[] = $data['id'];
        foreach($trees as $val){
            //  如果父级的id在排除的id之内,则提示并返回
            if($data['parent_id'] == $val){
                $this->error = '不能设置子分类为上级分类';
                return false;
            }
        }
        return $this->save($data);
    }

    //  获取某个分类的子分类的id
    public function getChildrenIds($id=0){
        $data = $this -> select();
        $list = getTree2($data,$id,1);
        foreach($list as $key=>$val){
            $listIds[] = $val['id'];
        }
        return $listIds;
    }

}