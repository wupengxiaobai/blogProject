<?php
namespace Admin\Controller;

use \Think\Controller;

class IndexController extends CommonController
{
    public function index(){
        $data = session('login_msg');
        //  根据管理员id查询权限,用于显示
        $jurisdiction = M('Admin_role')->field('role_name')->alias('t1')->join("left join blog_role as t2 on t1.role_id = t2.id")->where("t1.admin_id={$data['id']}")->find();
        $data['jurisdiction'] = $jurisdiction['role_name'];

        //  获取当前用户的权限信息
        $menus = $this->user['menus'];

        $this->assign(array(
            'data' => $data,
            'menus' => $menus
        ));
        $this->display();
    }

    public function home(){
        //  查找数据渲染视图
        $data = M('Info')->find();
        $friendly = M('Friendly') -> select();
        $this->assign(array(
            'data' => $data,
            'friendly' =>  $friendly
        ));
        $this->display();
    }

    public function welcome(){ 
        $data = session('login_msg');
        $this->assign('data',$data);
        $this->display();
    }

    //  个人信息
    public function myself(){
        if(IS_POST){
            $post = I('post.');
            if($_FILES['avatar']['error'] == '0'){
                //  有头像上传
                $cfg = array(
                    'rootPath' => WORKING_PATH . UPLOAD_ROOT_PATH
                );
                $upload = new \Think\Upload($cfg);
                $info = $upload -> uploadOne($_FILES['avatar']);
                //  保存头像路径
                $post['avatar'] = UPLOAD_ROOT_PATH . $info['savepath'] . $info['savename'];
            }
            if($post['type']=='add'){
                unset($post['type']);
                // dump($post);
                $post['admin_id'] = $post['id'];
                $res = M('Admin_info')->add($post);
            }else{
                //  执行数据修改操作
                $res = M('Admin_info')->save($post);
            }
            if($res === false){
                $this->error('资料修改失败!');
            }else{
                $this->success('资料修改成功');
            }
        }else{
            $sess= session('login_msg');
            $id = $sess['id'];
            $data = M('Admin_info')->where("admin_id=$id")->find();
            if($data){
                $data = M('Admin_info')->where("admin_id=$id")->find();
            }else{
                $data = array(
                    'id'=> $id,
                    'type' => 'add'
                );
            }
            $this->assign(array(
                'data' => $data
            ));
            $this->display();
        }
    }

    //  监听未读来信, 更新数据
    public function sendAJAX(){
        $count = M('Book') -> where("islook = 0") -> count();
        echo $count;
    }

    //  修改logo
    public function changeLogo(){
        if($_FILES['logo']['error']=='4'){
            $this->error('请选择logo图标上传!');
        }
        $model = M('Info');
        //  接收信息
        $post = I('post.')?I('post.'):array();
        $file = $_FILES['logo'];
        //  处理上传图片
        if($file['error'] == '0'){  //  有上传文件, 文件上传, 修改数据.
            $cfg = array('rootPath' => WORKING_PATH . UPLOAD_ROOT_PATH);
            $upload = new \Think\Upload($cfg);
            $info = $upload -> uploadOne($file);
            //  上传成功, 保存路径数据
            $post['logo'] = UPLOAD_ROOT_PATH . $info['savepath'] . $info['savename'];
        }
        //  执行数据修改
        // $model->find();
        $result = $model->save($post);
        if($result===false){
            $this->error('修改失败!');
        }else{
            $this->success('修改成功!');
        }
    }
    
    //  修改微信
    public function changeWeiXin(){
        if($_FILES['weixin']['error']=='4'){
            $this->error('请选择微信二维码图片上传!');
        }
        $model = M('Info');
        //  接收信息
        $post = I('post.')?I('post.'):array();
        $file = $_FILES['weixin'];
        //  处理上传图片
        if($file['error'] == '0'){  //  有上传文件, 文件上传, 修改数据.
            $cfg = array('rootPath' => WORKING_PATH . UPLOAD_ROOT_PATH);
            $upload = new \Think\Upload($cfg);
            $info = $upload -> uploadOne($file);
            //  上传成功, 保存路径数据
            $post['weixin'] = UPLOAD_ROOT_PATH . $info['savepath'] . $info['savename'];
        }
        //  执行数据修改
        $result = $model->save($post);
        if($result===false){
            $this->error('修改失败!');
        }else{
            $this->success('修改成功!');
        }
    }

    //  修改banner文字
    public function changeBanner(){
        $model = M('Info');
        //  接收信息
        $post = I('post.');
        $file = $_FILES['banner'];
        //  处理上传图片
        if($file['error'] == '0'){  //  有上传文件, 文件上传, 修改数据.
            $cfg = array('rootPath' => WORKING_PATH . UPLOAD_ROOT_PATH);
            $upload = new \Think\Upload($cfg);
            $info = $upload -> uploadOne($file);
            //  上传成功, 保存路径数据
            $post['banner'] = UPLOAD_ROOT_PATH . $info['savepath'] . $info['savename'];
        }

        //  执行数据修改
        $result = $model->save($post);
        if($result===false){
            $this->error('修改失败!');
        }else{
            $this->success('修改成功!');
        }
    }
    //  修改头像网名
    public function changeAvatar(){
        $model = M('Info');
        //  接收信息
        $post = I('post.');
        $file = $_FILES['avatar'];
        //  处理上传图片
        if($file['error'] == '0'){  //  有上传文件, 文件上传, 修改数据.
            $cfg = array('rootPath' => WORKING_PATH . UPLOAD_ROOT_PATH);
            $upload = new \Think\Upload($cfg);
            $info = $upload -> uploadOne($file);
            //  上传成功, 保存路径数据
            $post['avatar'] = UPLOAD_ROOT_PATH . $info['savepath'] . $info['savename'];
        }

        //  执行数据修改
        $result = $model->save($post);
        if($result===false){
            $this->error('修改失败!');
        }else{
            $this->success('修改成功!');
        }
    }

    //  删除友情链接
    public function delFriendly(){
        $id = I('get.id');
        $res = M('Friendly') -> delete($id);
        if($res === false){
            $this->error('删除失败!');
        }else{
            $this->success('删除成功!');
        }
    }

    //  添加友情链接
    public function addFriendly(){
        $post = I('post.');
        $res  = M('Friendly')->add($post);
        if($res){
            $this->success('添加成功!');
        }else {
            $this->error('添加失败!');
        }
    }

    //  修改友情链接
    public function editFriendly(){
        if (IS_POST) {
            $post = I('post.');
            $res  = M('Friendly')->save($post);
            if($res===false){
                $this->error('修改失败!');
            }else {
                $this->success('修改成功!');
            }
        }else{
            $id = I('get.id');
            $data = M('Friendly')->find($id);
            echo json_encode($data);
        }
    }
}