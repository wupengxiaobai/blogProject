<?php 
namespace Admin\Model;
class KnowledgeModel extends CommonModel
{
    // 自定义字段
    protected $fields = array('id','title', 'author','content','description','category_id','istop','hasfile','picture','thumb_pic','addtime');
    // 自动验证
    protected $_validate = array(
        array('title','require','标题不能为空'),
        array('author','require','标题不能为空'),
        array('content','require','内容不能为空'),
        array('category_id','require','类别不能为空')
    );

    //  添加数据
    public function addData($post,$file){
        //  如果有文件上传执行上传文件操作
        if($file['error'] == '0'){
            $cfg = array(
                'rootPath' => WORKING_PATH . UPLOAD_ROOT_PATH,
            );
            $upload = new \Think\Upload($cfg);
            $info = $upload -> uploadOne($file);
            //  上传成功, 补充$post数据
            if($info){
                $post['picture'] = UPLOAD_ROOT_PATH . $info['savepath'] . $info['savename'];
                $post['hasfile'] = 1;

                //  制作缩略图
                $img = new \Think\Image();
                $img -> open(WORKING_PATH . $post['picture']);
                $img -> thumb(150,80);
                $img -> save(WORKING_PATH . UPLOAD_ROOT_PATH . $info['savepath'] . 'thumb_' . $info['savename']);
                //  补全数据
                $post['thumb_pic'] = UPLOAD_ROOT_PATH . $info['savepath'] . 'thumb_' . $info['savename'];
            }
        }

        //  补充事件
        $post['addtime'] = time();
        $result = $this->add($post);
        return $result;
    }

    //  获取数据
    public function getData($params){
        $data = $this   ->  field('blog_knowledge.*, blog_menu.name as type')
                        ->  join('left join blog_menu on blog_knowledge.category_id = blog_menu.id')
                        ->  where("{$params['search_val']}")
                        ->  limit($params['page'] -> firstRow.','.$params['page'] -> listRows)
                        ->  select();
                return $data;
    }

    // 修改数据
    public function saveData($post,$file){
        if($file['error'] == '0'){
            //  有文件传递: 处理文件上传
            $cfg = array(
                'rootPath' => WORKING_PATH . UPLOAD_ROOT_PATH,
            );
            $upload = new \Think\Upload($cfg);
            $info = $upload -> uploadOne($file);
            //  上传成功, 补充$post数据
            if($info){
                $post['picture'] = UPLOAD_ROOT_PATH . $info['savepath'] . $info['savename'];
                $post['hasfile'] = 1;

                //  制作缩略图
                $img = new \Think\Image();
                $img -> open(WORKING_PATH . $post['picture']);
                $img -> thumb(150,80);
                $img -> save(WORKING_PATH . UPLOAD_ROOT_PATH . $info['savepath'] . 'thumb_' . $info['savename']);
                //  补全数据
                $post['thumb_pic'] = UPLOAD_ROOT_PATH . $info['savepath'] . 'thumb_' . $info['savename'];
            }
        }
        //  补充时间的修改
        // $post['addtime'] = time();
        $result = $this->save($post);
        return $result;
    }
}
