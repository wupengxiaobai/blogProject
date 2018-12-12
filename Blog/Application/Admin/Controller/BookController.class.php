<?php
namespace Admin\Controller;
class BookController extends CommonController{

    //  显示管理列表
    public function index(){
        //  关键字搜索处理
        $val = I('get.search_val');
        $search_val = $val ? ("content like '%$val%'") : '2>1';
        //  实例化模型
        $model = D('Book');
        //  查询数据并展示列表
        //  分页
        $count = $model -> where($search_val) -> count();
        $page = new \Think\Page($count,8);

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
        $result = M('Book')->delete($id);
        if($result===false){
            $this->error('删除留言失败!');
        }else{
            $this->success('删除留言成功!');
        }
    }

    //  查看操作
    public function see(){
        $id = I('get.id');
        $model =  M('Book');
        //  查询数据
        $data = $model->find($id);
        //  修改数据状态为已查看
        if($data['islook'] == 0){
            $model -> islook = 1;
            $model -> save();
        }
        $this->assign(array(
            'data' => $data
        ));
        $this->display();
    }
}