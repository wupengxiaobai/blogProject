<?php 

/**
 * 递归实现无限极分类的方法
 *  @param list     列表数据
 *  @param pid      父级id
 *  @param level    属性(用于空格)
 *  @param iscache  是否重置原静态的数据
 */
function getTree($list, $pid = 0, $level = 0, $iscache = true){
    static $tree = array();
    //  如果不需要之前的数据, 则此处判断第四个参数. 重置数组数据为空
    if(!$iscache) $tree = array();
    foreach($list as $item){
        if($item['pid'] == $pid){
            $item['level'] = $level;
            $tree[] = $item;
            getTree($list, $item['id'], $level + 1);
        }
    }
    return $tree;
}

function getTree2($list, $pid = 0, $level = 0, $iscache = true){
    static $tree = array();
    //  如果不需要之前的数据, 则此处判断第四个参数. 重置数组数据为空
    if(!$iscache) $tree = array();
    foreach($list as $item){
        if($item['parent_id'] == $pid){
            $item['level'] = $level;
            $tree[] = $item;
            getTree2($list, $item['id'], $level + 1);
        }
    }
    return $tree;
}


/**  
 *字符串截取函数
 *开启mbstring扩展
 */
 function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true){
    if(mb_strlen($str,$charset)>$length)
    {
        if(function_exists("mb_substr")){
            if($suffix)
                return mb_substr($str, $start, $length, $charset)."...";
            else
                return mb_substr($str, $start, $length, $charset);
        }elseif(function_exists('iconv_substr')) {
            if($suffix)
                return iconv_substr($str,$start,$length,$charset)."...";
            else
                return iconv_substr($str,$start,$length,$charset);
        }
        $re['utf-8'] = "/[x01-x7f]|[xc2-xdf][x80-xbf]|[xe0-xef][x80-xbf]{2}|[xf0-xff][x80-xbf]{3}/";
        $re['gb2312'] = "/[x01-x7f]|[xb0-xf7][xa0-xfe]/";
        $re['gbk'] = "/[x01-x7f]|[x81-xfe][x40-xfe]/";
        $re['big5'] = "/[x01-x7f]|[x81-xfe]([x40-x7e]|xa1-xfe])/";
        preg_match_all($re[$charset], $str, $match);
        $slice = join("",array_slice($match[0], $start, $length));
        if($suffix) return $slice."…";
        return $slice;
    }
    else
    {
        return $str;
    }
}



/**
 * 标签截取
 */
function str_n_pos($str,$find,$n){
  for ($i=1;$i<=$n;$i++){
      $pos = strpos($str,$find);
      $str = substr($str,$pos+1);
      $pos_val=$pos+$pos_val+1;
  }
  return $pos_val-1;
}


function bqsub($str, $bq, $pos=2){
  $len = strlen($bq);
  $res = str_n_pos($str, $bq, $pos);
  return (substr($str, 0, $res + $len).'...');
}


/**
 * 空格换行符过滤
 */
function trimAll($parma){
    if(is_array($parma)){
        return array_map('trimAll',$parma);
    }
    $before = array(" ","   ","\t","\r","\n");
    $after = array('','','','','');
    return str_replace($before,$after,$parma);
}

/**
 * 二维数组排序 function
 *
 * @param [array] $arr
 * @param [key] $keys
 * @param string $type 排序方式, 默认升序
 * @return void 
 */
function array_sort($arr,$keys,$type='asc'){ 
    $keysvalue = $new_array = array();
    foreach ($arr as $k=>$v){
        $keysvalue[$k] = $v[$keys];
    }
    if($type == 'asc'){
        asort($keysvalue);
    }else{
        arsort($keysvalue);
    }
    reset($keysvalue);
    foreach ($keysvalue as $k=>$v){
        $new_array[$k] = $arr[$k];
    }
    return $new_array; 
}