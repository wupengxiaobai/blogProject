<?php
namespace Admin\Model;
class AdminModel extends CommonModel{

    //  声明字段
    protected $fields = array('id','username','password');
    //  自动验证
    protected $_validate = array(
        array('username','require','用户名不能为空'),
        array('password','require','用户密码不能为空'),
        array('username','','用户名不能重复',1,'unique')
    );
    //  自动完成
    protected $_auto = array(
        array('password','md5',3,'function'),   //  密码的md5加密
    );
    //  内置钩子给中间表添加数据
    protected function _after_insert($data)
    {
        $admin_role = array(
            'admin_id' => $data['id'],
            'role_id' => I('post.role_id')
        );
        M('Admin_role')->add($admin_role);
    }

    //  管理员数据获取
    public function listData(){
        $count = $this->count();
        $pageSize = 3;
        $page = new \Think\Page($count, $pageSize);
        $show = $page->show();
        $p = intval(I('get.p'));
        $list = $this->field("a.*,c.role_name")->page($p,$pageSize)->alias('a')->join("left join blog_admin_role as b on a.id=b.admin_id")->join("left join blog_role as c on b.role_id = c.id")->select();
        return array(
            'pageStr' => $show,
            'list'  => $list
        );
    }

    //  管理员删除
    public function remove($admin_id){
        // dump($admin_id);die;
        //  开启事务管理
        $this -> startTrans();
        //  admin 表数据的删除
        $adminStatus = $this->where("id = $admin_id")->delete();
        if(!$adminStatus){
            $this->rollback();
            return false;
        }
        //  中间关联表的数据删除
        $adminRoleStatus = M('Admin_role')->where("admin_id = $admin_id")->delete();
        if(!$adminRoleStatus){
            $this->rollback();
            return false;
        }
        $this->commit();
        return true;
    }

    public function findOne($id){
        return $this -> field("a.*,b.role_id")->alias("a")  -> join("left join blog_admin_role as b on a.id = b.admin_id") -> where("a.id = $id") -> find();
    }

    public function update($data){
        $role_id = I('post.role_id');
        //  修改本表数据
        $this->save();
        //  修改中间表的数据
        M('Admin_role')->where("admin_id =" . $data['id'])->save(array('role_id'=>$role_id));
    }

}
