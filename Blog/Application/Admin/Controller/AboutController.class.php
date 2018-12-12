<?php 
namespace Admin\Controller;
class AboutController extends CommonController{

    //  关于显示及保存业务
    public function index(){
       if(IS_POST){
            $post = I('post.');
            $data = D('About')->saveData($post);
            if ($data === false) {
                $this->error('保存数据失败');
            }else{
                $this->error('保存数据成功');
            }
       }else{
            //  查询数据库, 执行关于我的数据查询, 并赋值视图
            $model = D('About');
            $data = $model->findData();
            if(!$data){
                $this->error('获取数据失败');
            }
            $this->assign(array(
                'data' => $data
            ));
            $this->display();
       }
    }
}