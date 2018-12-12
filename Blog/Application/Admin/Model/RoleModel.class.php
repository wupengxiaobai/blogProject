<?php
namespace Admin\Model;
class RoleModel extends CommonModel{
    //  自定义字段
    protected $fields = array('id', 'role_name');
    //  自动验证
    protected $_validate = array(
        array('role_name','require','不能为空'),
        array('role_name','','角色不能重复',1,'unique')
    ); 

    //  获取数据
    public function listData(){
        //  定义每页显示数量
        $pageSize = 3;
        $count = $this->count();
        $page = new \Think\Page($count, $pageSize);
        //  生成页码html
        $show = $page->show();
        //  获取当前页码
        $p = intval(I('get.p'));
        //  列表数据
        $list = $this->page($p,$pageSize)->select();
        return array(
            'pageStr' => $show,
            'list'    => $list
        );
    }

    //  删除
    public function remove($role_id){
        return $this -> where("id = $role_id") -> delete();
    }

    //  查询一条数据的详情
    public function findOne($id){
        return $this -> where("id = $id") -> find();
    }

    /**
     * 解决添加角色权限时, 超级管理员导航不能更新(超级管理员角色缓存文件未更新)
     */
     public function changeSuperAdmin(){
        //  获取所有的角色为超级管理员的用户
        $user = M('Admin_role')->where("role_id = 1")->select();
        foreach($user as $key=>$val){
            S('user_' . $val['admin_id'], null);
        }
    }

}