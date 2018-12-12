<?php
namespace Admin\Controller;
class ResumeController extends CommonController{

    //  列表页的展示
    public function index(){

        //  关键字搜索处理
        $val = I('get.search_val');
        $search_val = $val ? ("work like '%$val%'") : '2>1';
        //  实例化模型
        $model = D('Resume');
        //  查询数据并展示列表
        //  分页
        $count = $model -> where($search_val) -> count();
        $page = new \Think\Page($count,5);

        $page->rollPage = 2;
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

    //  添加视图显示及提交业务
    public function add(){
        if(IS_POST){
            $post = I('post.');
            //  实例化模型
            $model = D('Resume');
            $res = $model -> addData($post, $_FILES['avatar']);
            if($res){
                $this->success('添加简历成功!',U('index'),3);
            }else{
                $this->error('添加简历失败!');
            }
        }else{
            $this->display();
        }
    }

    //  技能值修改视图显示及业务
    public function editskill(){
        if(IS_POST){
            $post = I('post.');
            $res = array();    
            $model = M('Resume_skill');
            foreach($post as $key => $val){
                // $sql = "update blog_resume_skill set grade = $val where skillname = '$key'";
                $data = array(
                    'grade' => $val
                );
                $res[] = $model -> where("skillname='$key'")-> save($data);
            } 
            foreach($res as $i){
                if($i === false){
                    $this->error('保存数据失败!');
                }
            }
            $this->success('保存数据成功!');
        }else{
            //  查询数据赋值视图
            $skills = M('resume_skill')->select();
            $this->assign(array(
                'skills' => $skills
            ));
            $this->display();
        }
    }

    //  经历的修改视图显示及业务
    public function editexperience(){
        if(IS_POST){
            $post = I('post.');
            $res = array();    
            $model = M('Resume_experience');
            //  构建合理数组方便保存
            $array = array(
                '1' => array(
                    'id'  => 1,
                    'time' => $post['time1'],
                    'content' => $post['content1']
                ),
                '2' => array(
                    'id'  => 2,
                    'time' => $post['time2'],
                    'content' => $post['content2']
                ),
                '3' => array(
                    'id'  => 3,
                    'time' => $post['time3'],
                    'content' => $post['content3']
                ),
                '4' => array(
                    'id'  => 4,
                    'time' => $post['time4'],
                    'content' => $post['content4']
                ),
                '5' => array(
                    'id'  => 5,
                    'time' => $post['time5'],
                    'content' => $post['content5']
                ),
                '6' => array(
                    'id'  => 6,
                    'time' => $post['time6'],
                    'content' => $post['content6']
                )
            );
            //  循环执行修改操作
            foreach($array as $key=>$val){
                // $sql = "update blog_resume_experience set time = '{$time}',content = '{$content}' where id = {$id}";
                $data = array(
                    'id' => $val['id'],
                    'time' => $val['time'],
                    'content' => $val['content'] 
                );
                $res[] = $model -> save($data);
            } 
            //  遍历测试保存是否都成功
            foreach($res as $i){
                if($i === false){
                    $this->error('保存数据失败!');
                }
            }
            $this->success('保存数据成功!');
        }else{
            //  查询数据赋值视图
            $experience = M('resume_experience')->select();
            $this->assign(array(
                'experience' => $experience
            ));
            $this->display();            
        }
    }
    
    //  删除
    public function del(){
        $id = I('get.id');
        $res = M('Resume') -> delete($id);
        if($res){
            $this->success("删除成功!");
        }else{
            $this->error('删除失败!');
        }
    }

    //  修改
    public function edit(){
        if(IS_POST){
            $post = I('post.');
            $model = D('Resume');
            $result = $model->saveData($post,$_FILES['avatar']);
            if($result === false){
                $this->error('修改失败!');
            }else{
                $this->success('修改成功!',U('index'),3);
            }
        }else{
            $id = I('get.id');
            $data = M('Resume') -> find($id);
            $this->assign(array(
                'data' => $data
            ));
            $this->display();
        }
    }

    //  下载头像
    public function download(){
        $id = I('get.id');
        //  查询数据执行下载
        $data = M('Resume')->find($id);
        $file = WORKING_PATH . $data['avatar'];
        header('Content-type:application/octet-stream');
        header('Content-Disposition: attachment; filename="'. basename($file) . '"');
        header('Content-Length: '. filesize($file));
        readfile($file);
    }
}