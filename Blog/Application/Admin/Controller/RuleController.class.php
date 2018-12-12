<?php
namespace Admin\Controller;
class RuleController extends CommonController{

    public function add(){
        $RuleModel = D('Rule');
        if(IS_GET){
            //  获取分类无限极
            $cates = $RuleModel -> getChildren();
            $this->assign('cate',$cates);
            $this->display();
        }else{
            $data = $RuleModel->create();
            if(!$data){
                $this->error($RuleModel->getError());
            }
            $insert = $RuleModel->add($data);

            /**
             * 添加规则的时候, 触发超级管理员角色对应的用户的缓存文件删除
             */
            D('Role')->changeSuperAdmin();


            $this->success('添加权限成功');
        }
    }

    public function index(){
        //  查询全部
        $RuleModel = D('Rule');
        $data = $RuleModel -> getCateTree();
        $this->assign('data', $data);
        $this->display();
    }

    //  删除
    public function dels(){
        $rule_id = intval(I('get.rule_id'));
        $res = D('Rule') -> remove($rule_id);
        if($res===false){
            $this-> error('删除失败!');
        }else{
            
            /**
             * 删除权限的时候, 触发超级管理员角色对应的用户的缓存文件删除
             */
            D('Role')->changeSuperAdmin();

            $this-> success('删除成功!');
        }
    }
    
    //  修改
    public function edit(){
        $RuleModel = D('Rule'); 
        if(IS_GET){
            $Rule_id = intval(I('get.rule_id'));
            //  查询自身
            $info = $RuleModel -> findOne($Rule_id);
            //  查询全部权限
            $rules = $RuleModel -> getCateTree();
            $this -> assign('info', $info);
            $this -> assign('rules', $rules);
            $this -> display();
        }else{
            $data = $RuleModel->create();
            if(!$data){
                $this->error($RuleModel->getError());
            }
            $res = $RuleModel -> update($data);
            if($res === false){
                $this->error($RuleModel->getError());
            }
            /**
             * 修改权限的时候, 触发超级管理员角色对应的用户的缓存文件删除
             */
            D('Role')->changeSuperAdmin();
            $this->success('修改权限成功!', U('index'));
        }
    }
}