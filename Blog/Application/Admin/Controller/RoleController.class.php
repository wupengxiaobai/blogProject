<?php
namespace Admin\Controller;
class RoleController extends CommonController{

    //  添加角色视图及业务处理
    public function add(){
        if(IS_GET){
            $this->display();
        }else{
            $RoleModel = D('Role');
            $res = $RoleModel->create();
            if(!$res){
                $this->error($RoleModel->getError());
            }
            $RoleModel->add();
            $this->success('添加角色成功', U('index'), 3);
        }
    }

    //  首页列表显示
    public function index(){
        $RoleModel = D('Role');
        $data = $RoleModel -> listData();
        $this->assign('data', $data);
        $this->display();
    }

    //  删除角色
    public function dels(){
        $role_id = intval(I('get.role_id'));
        if($role_id<=1){
            //  超级管理员, 返回参数错误
            $this->error('参数错误!');
        }
        $res = D('Role') -> remove($role_id);
        if($res===false){
            $this-> error('删除失败!');
        }else{
            $this-> success('删除成功!');
        }
    }

    //  修改角色
    public function edit(){
        $RoleModel = D('Role'); 
        if(IS_GET){
            $role_id = intval(I('get.role_id'));
            $info = $RoleModel -> findOne($role_id);
            $this -> assign('info', $info);
            $this -> display();
        }else{
            $data = $RoleModel->create();
            if($data['id'] <= 1){
                $this->error($RoleModel->getDbError());
            }
            $RoleModel->save();
            $this->success('修改角色成功!',U('index'));
        }
    }

    //  角色赋权限
    public function permission(){
        $RoleMode = D('Role');
        if(IS_GET){
            //  获取所有权限并且格式化
            $cate = D('Rule')->getChildren();
            //  获取当前角色信息
            $role_id = intval(I('get.role_id'));
            //  获取当前角色对应的权限
            $rule_ids = D('Role_rule')->field('rule_id')->where("role_id=$role_id")->select();
            $ids = array();
            foreach($rule_ids as $key=>$val){
                $ids[] = $val['rule_id'];
            }
            $role = $RoleMode ->where("id = $role_id")->find();
            $this->assign('cate',$cate);
            $this->assign('role',$role);
            $this->assign('ids',$ids);
            $this->display();
        }else{
            $role_id = I('post.role_id');
            
            //  先删除之前的权限, 再添加现有的
            $hasIds = D('Role_rule')->where("role_id=$role_id")->select();
            $tep = array();
            foreach($hasIds as $val){
                $tep[] = $val['id'];
            }
            $tep = implode(',', $tep);
            D('Role_rule')->delete($tep);
            
            //  添加权限操作
            $post = I('post.');
            $post = $post['rule'];
            //  数据保存到角色和权限中间表
            $arr = array();
            foreach($post as $key=>$val){
                $arr[] = array(
                    'role_id' => $role_id,
                    'rule_id' => $val
                );
            }
            $result = D('Role_rule')->addAll($arr);


            /**
             * 在修改角色权限的时候, 删除使用当前角色的用户用来保存的用户信息文件(缓存文件).
             */
            //  获取使用当前修改角色的所有管理员用户id
            $user_info = M('admin_role')->where("role_id = $role_id")->select();
            //  在角色权限修改的时候, 删除该角色对应的所有管理员的信息文件
            foreach($user_info as $key=>$val){
                //  获取文件并删除
                S('user_'.$val['admin_id'], null);
            }


            if($result){
                $this->success('设置权限成功',U('index'));
            }else{
                $this->error('设置权限失败');
            }
            
        }
    }

    
    
}