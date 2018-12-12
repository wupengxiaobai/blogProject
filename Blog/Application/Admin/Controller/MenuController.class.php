<?php
namespace Admin\Controller;
class MenuController extends CommonController{

    //  添加类别
    public function add(){
        if(IS_POST){
            $post = I('post.');
            $post['link'] = '';
            $result = M('Menu')->add($post);
            if($result){
                $this->success('添加类别成功!',U('index'),3);
            }else{
                $this->error('添加类别失败!');
            }
        }else{
            $this->display();
        }
    }

    //  类别管理
    public function index(){

        //  关键字搜索处理
        $val = I('get.search_val');
        $search_val = $val ? ("name like '%$val%'") : '2>1';
        //  实例化模型
        $model = D('Menu');
        //  查询数据并展示列表
        //  分页
        $count = $model -> where("$search_val and pid>0") -> count();
        $page = new \Think\Page($count,7);

        $page->rollPage = 5;
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('first','首页');
        $page->setConfig('last','尾页');

        $totalRows = $page -> totalRows;

        //  生成 html
        $show = $page->show();

        $params = array(
            'page' => $page,
            'search_val' =>  $search_val
        );

        $data = $model -> getData($params);

        $this->assign(array(
            'data' => $data,
            'show' => $show,
            'totalRows'=>  $totalRows
        ));
        $this->display();
    }

    //  删除操作
    public function del(){
        $id = I('get.id');
        $result = M('Menu') -> delete($id);
        if($result === false){
            $this -> error('删除失败!');
        }else{
            $this -> success('删除成功!',U('index'),3);
        }
    }

    //  显示修改视图及修改业务
    public function edit(){
        if(IS_POST){
            $post = I('post.');
            $model = D('Menu');
            $result = $model->save($post);
            if($result === false){
                $this->error('修改失败!');
            }else{
                $this->success('修改成功!',U('index'),3);
            }
        }else{
            $id = I('get.id');
            //  查询数据, 渲染视图
            $data = M('Menu')->find($id);
            $this -> assign(array('data'=>$data));
            $this -> display();
        }
    }
}