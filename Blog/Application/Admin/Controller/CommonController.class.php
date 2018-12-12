<?php 
namespace Admin\Controller;
use \Think\Controller;
/**
 * 中间控制器 CommonController
 */
class CommonController extends Controller{

    //  第一步: 创建属性, 存储权限验证和用户信息
    //  1.1标识是否进行权限验证
    public $is_check_rule = true;
    //  1.2保存用户的信息, 包括基本信息, 角色id, 权限信息
    public $user = array();

    public function _initialize(){
        $isLogin = session('login_msg');
        if(empty($isLogin)){
            $this->error('检测到您未登录, 请先登录!', U('User/login'));die;
        }

        //  读取当前用户对应的文件信息, 如果没有则操作数据库进行信息读取并保存文件. 有则直接使用文件中的数据
        $this->user = S('user_' . $isLogin['id']);
        if(!$this->user){
            //  第二步: 保存属性到用户信息中
            //      2.1 将session数据保存到属性中
            $this->user = $isLogin;
            //      2.2 根据session中id查询当前登录用户角色
            $role_info = M('Admin_role')->where("admin_id = {$isLogin['id']}")->find();
            //      2.3 将登录用户权限保存到登录用户信息中
            $this->user['role_id'] = $role_info['role_id'];

            //  第三步: 根据user中用户的id获取用户权限信息
            if($this->user['role_id'] == 1){
                //  3.1 如果是超级管理员, 不进行权限验证
                $this->is_check_rule = false;
                //  超级管理员的权限获取
                $RulesInfo = M('Rule')->select();
                //  保存权限地址
                $this->user['menus'] = $RulesInfo;
            }else{
                //  3.2 如果是非超级管理员, 进行权限验证
                //  3.2.1 根据角色id获取对应的权限的 id
                $RulesInfo = M('Role_rule')->where("role_id={$this->user['role_id']}")->select();
                foreach($RulesInfo as $val){
                    $Rules[] = $val['rule_id'];
                }
                $Rules = implode(',', $Rules);
                //  第四步: 通过权限id查找对应权限信息, 转换成一维数组(权限地址)保存到用户信息中
                //  4.1 根据 权限id 查找对应权限信息
                $userRules =  M('Rule')->where("id in ({$Rules})")->select();
                //  4.2 生成权限地址保存到用户信息中如: Admin/User/login  
                foreach($userRules as $val){
                    //  保存权限信息
                    $this->user['menus'][] = $val;
                    //  保存权限地址
                    $this->user['rules'][] = strtolower($val['module_name'] . '/' . $val['controller_name'] . '/' . $val['action_name']);
                }
            }

            //  读取信息完成, 将数据写入到文件中
            S('user_' . $isLogin['id'], $this->user);
        }

        //  如果是超级管理员, 不进行权限验证
        if($this->user['role_id'] == 1){
            $this->is_check_rule = false;
        }

        //  第五步: 权限访问限制
        if($this->is_check_rule){
            //  5.1 往权限中增加管理员默认具备的访问权限(后台首页)
            $this->user['rules'][] = 'admin/index/index';
            $this->user['rules'][] = 'admin/index/myself';
            $this->user['rules'][] = 'admin/index/welcome';

            //  如果非超级管理员, 进行权限访问限制
            //  构建当前访问的路径
            $currentLink = strtolower(MODULE_NAME . '/' . CONTROLLER_NAME . '/' . ACTION_NAME);
            if(!in_array($currentLink, $this->user['rules'])){
                if(IS_AJAX){
                    //  如果是ajax访问
                    $this->ajaxReturn(array('status'=>0,'message'=>'没有访问权限'));
                }else{
                    echo('没有权限访问');exit;
                }
            }
        }
        
    }


    //  页面丢失空操作
    public function _empty(){
        $this->display('Empty/404');
    }

}