<?php
namespace Admin\Controller;
class AdminController extends CommonController{

    //  管理员的新增视图显示及新增业务的处理
    public function add(){
        if(IS_GET){
            //  查询角色数据赋值视图
            $role = M('Role')->select();
            $this->assign('role',$role);
            $this->display();
        }else{
            //  接收数据
            $username = intval(I('post.username'));
            $password = I('post.password');
            //  实例模型
            $AdminModel = D('Admin');
            //  处理
            $res = $AdminModel -> create();
            if(!$res){
                $this->error($AdminModel->getError());
            }
            $AdminModel -> add();
            $this->success('添加管理员成功!', U('index'));
        }
    }
    
    //  管理员列表
    public function index(){
        $AdminModel = D('Admin');
        $data = $AdminModel->listData();
        $this->assign('data', $data);
        $this->display();
    }

    //  管理员删除
    public function dels(){
        $admin_id = intval(I('get.admin_id'));
        $res = D('Admin')->remove($admin_id);
        if($res == false){
            $this->error('删除管理失败!');
        }else{
            $this->success('删除管理成功!',U('index'));
        }
    }

    //  管理员编辑
    public function edit(){
        $AdminModel = D('Admin');
        if(IS_GET){
            $admin_id = intval(I('get.admin_id'));
            //  查询全部角色数据
            $roles = M('Role')->select();
            //  查询当前管理员数据
            $data = $AdminModel -> findOne($admin_id);
            $this->assign(array(
                'data' => $data,
                'roles' => $roles
            ));
            $this->display();
        }else{
            $data = $AdminModel -> create();
            if(!$data){
                $this->error($AdminModel->getError());
            }
            if($data['id'] <= 1){
                $this->error('参数错误!');
            }
            $AdminModel->update($data);
            $this->success('修改成功!', U('index'));
        }
    }
}