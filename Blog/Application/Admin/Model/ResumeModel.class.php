<?php
namespace Admin\Model;
class ResumeModel extends CommonModel{
    //  获取数据
    public function getData($params){
        $data = $this   ->  where("{$params['search_val']}")
                        ->  limit($params['page'] -> firstRow.','.$params['page'] -> listRows)
                        ->  select();
                return $data;
    }

    //  添加简历
    public function addData($post, $file){
        if($file['error'] == '0'){
            //  上传了头像, 执行保存头像业务
            $cfg = array(
                'rootPath' => WORKING_PATH . UPLOAD_ROOT_PATH
            );
            $upload = new \Think\Upload($cfg);
            $info = $upload -> uploadOne($file);
            if($info){  //  上传成功
                //  补充图片路径的保存
                $post['avatar'] = UPLOAD_ROOT_PATH . $info['savepath'] . $info['savename'];
            }
        }
        $result = $this->add($post);
        return $result;
    }

    //  修改简历
    public function saveData($post,$file){
        // dump($post);die;
        if($file['error'] == '0'){
            //  有文件传递: 处理文件上传
            $cfg = array(
                'rootPath' => WORKING_PATH . UPLOAD_ROOT_PATH,
            );
            $upload = new \Think\Upload($cfg);
            $info = $upload -> uploadOne($file);
            //  上传成功, 补充$post数据
            if($info){
                $post['avatar'] = UPLOAD_ROOT_PATH . $info['savepath'] . $info['savename'];
            }
        }
        //  补充时间的修改
        $result = $this->save($post);
        return $result;
    }
}