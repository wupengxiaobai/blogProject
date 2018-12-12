<?php 
namespace Admin\Controller;
class MoodliesController extends CommonController{

    //  碎言碎语首页显示
    public function index(){
        //  关键字搜索处理
        $val = I('get.search_val');
        $search_val = $val ? ("content like '%$val%'") : '2>1';
        //  实例化模型
        $model = D('Moodlies');
        //  查询数据并展示列表
        //  分页
        $count = $model -> where($search_val) -> count();
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

    //  碎言碎语添加显示
    public function add(){
        if(IS_POST){
            $post = I('post.');
            $model = D("Moodlies");
            $res = $model -> addData($post, $_FILES['picture']);
            if($res){
                $this->error('添加成功!',U('index'),3);
            }else{
                $this->error('添加失败!');
            }
        }else{
            $this->display();
        }
    }

    //  下载版图
    public function download(){
        $id = I('get.id');
        //  查询数据执行下载
        $data = M('New_list')->find($id);
        $file = WORKING_PATH . $data['picture'];
        header('Content-type:application/octet-stream');
        header('Content-Disposition: attachment; filename="'. basename($file) . '"');
        header('Content-Length: '. filesize($file));
        readfile($file);
    }

    //  删除操作
    public function del(){
        $id = I('get.id');
        $result = M('Moodlies') -> delete($id);
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
            $model = D('Moodlies');
            $result = $model->saveData($post,$_FILES['picture']);
            if($result === false){
                $this->error('修改失败!');
            }else{
                $this->success('修改成功!',U('index'),3);
            }
        }else{
            $id = I('get.id');
            //  查询数据, 渲染视图
            $data = M('Moodlies')->find($id);
            $category = M('Menu')->where('pid = 3')->select();
            $this -> assign(array('data'=>$data,'category'=>$category));
            $this -> display();
        }
    }
}