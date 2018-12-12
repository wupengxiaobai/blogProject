<?php
namespace Admin\Controller;
use \Think\Controller;
class UserController extends Controller{

    //  用户登录视图和登录业务
    public function login(){
        if(IS_POST){
            $post = I('post.');
            //  验证验证码
            if(empty($post['verify'])) $this->error('请输入验证码!');
            $verify = new \Think\Verify();
            $resu = $verify->check($post['verify']);
            if($resu){
                unset($post['verify']);
                //  执行查询
                $username = $post['username'];
                $password = md5($post['password']);
                $result = D('Admin')->where("username = '{$username}' and password = '{$password}'")->find();
                if($result){
                    // 验证成功: 保存 session, 并跳转首页
                    //  根据用户名查找管理员基本信息
                    $info = D('Admin_info')->where("admin_id={$result['id']}")->find();
                    $info2 = D('Admin_role')->where("admin_id={$result['id']}")->find();
                    //  保存session
                    session('login_msg', array(
                        'nickname' =>$info['nickname'],
                        'avatar'=>$info['avatar'],
                        'id'=> $info2['admin_id'],
                    ));
                    $this->error('登录成功!', U('Index/index'), 3);
                }else{
                    $this->error('登录失败! 请检查账号密码是否正确.',U('login'));
                }
            }else{
                $this->error('验证码输出有误!');
            }
        }else{
            $this->display();
        }
    }

    //  生成验证码
    public function verify(){
        $conf = array(
            'fong-size'=>14,
            'useNoise'=>false,
            'fontttf' => '4.ttf',
            'length'=>4,

        );
        $verify = new \Think\Verify($conf);
        $verify -> entry();
    }

    //  用户退出业务
    public function logout(){
        //  删除 session, 跳转登录页面
        session('login_msg',NULL);
        $this->success('退出管理系统成功!',U('User/login'));
    }
}