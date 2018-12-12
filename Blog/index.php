<?php
/**
 * 入口文件
 */

// 检测PHP环境
if (version_compare(PHP_VERSION, '5.3.0', '<')) {
    die('require PHP > 5.3.0 !');
}

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG', true);

// 定义应用目录
define('APP_PATH', './Application/');

//  工作目录常量
define('WORKING_PATH',str_replace('\\','/',__DIR__));
//  上传根目录
define('UPLOAD_ROOT_PATH','/Public/Upload/');

// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

