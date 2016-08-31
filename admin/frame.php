<?php
/**
 * 超精�?框架
 * 数据库函�?(取代mod部分)
 * 
 */
error_reporting(E_ALL ^ E_NOTICE);
include 'config.php';
$conn = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PWD, MYSQL_DATABASE);
$conn->set_charset("utf-8");
if (mysqli_connect_errno())
    exit('连接错误');



/**
 * 过滤请求
 */
$black_words = array(array('select', 'from'), array('delete', 'from'), array('update', 'set'), array('insert', 'into'), array('replace', 'into'), array('information_schema'), array('drop', 'database'), array('drop', 'table'), array('truncate', 'table'), array('show', 'databases'), array('show', 'tables'), array('union', 'select'));
foreach ($_REQUEST as $key => $value) {
    if (in_array($key, array('controller', 'action')))
        continue;
    if (is_numeric($value))
        continue;
    foreach ($black_words as $v) {
        $tmp = count($v);
        $ishack = array();
        for ($i = 0; $i < $tmp; $i++) {
            if (is_array($value)) {
                foreach ($value as $val) {
                    if (is_array($val) || is_numeric($val))
                        continue; //第三维以上的数组不在�?�?
                    $ishack[] = strpos(strtolower($val), $v[$i]);
                }
            }else {
                $ishack[] = strpos(strtolower($value), $v[$i]);
            }
        }
        if (!empty($ishack) && !in_array(false, $ishack, true)) {
            exit("您输入的数据有点敏感，被拦截了，您别黑我�?-_-!");
        }
    }
}
/**
 * 加载�?些常用函�?
 */
include 'lib/allan.php';//�?般不是在这里加载的，这个特殊
define('DIR_LIB', 'lib/');
/**
 * cli模式特殊处理
 */
if(PHP_SAPI=='cli'){
    $_GET['c']=$argv[1];
    $_GET['a']=$argv[2];
}

/**
 * �?单控制器和action
 */
$frameC = strtolower($_GET['c']);
$frameA = strtolower($_GET['a']);
if(!$frameC)$frameC='index';
$frameC=$frameC.'_C';
if(!$frameA)$frameA='index';
//if(method_exists($frameC, 'ini'))$frameC::ini();
$frameC::$frameA();

//自动加载�?
function __autoload($classname) {
    if(strstr($classname,'_C'))
    $classpath = "c/" . str_replace('_C','',$classname) . '.php';
    if(strstr($classname,'_M'))
    $classpath = "m/" . str_replace('_M','',$classname) . '.php';
    //CLI模式处理
    if(PHP_SAPI=='cli')
        $classpath=BASE_DIR.$classpath;
    if (file_exists($classpath)) {
        require_once($classpath);
    } else {
        echo 'class file' . $classpath . 'not found!';
    }
}

/**
 * 数据 插入
 * @param type $tables
 * @param type $data
 * @return boolean
*/

function insert($tables, $data) {
    if (!count($data))
        return FALSE;
    foreach ($data as $key => $value) {
        $set.="`$key`=?,";
    }
    $sql = "insert into `$tables` set " . trim($set, ',');
    return query_pre($sql, $data);
}
/*
function insert($tables, $data){
    global $conn;
    if (!count($data))
        return FALSE;
    foreach ($data as $key => $value) {
        $value=mysqli_real_escape_string($conn,$value);
        $set.="`$key`='$value',";
    }
    $sql = "insert into `$tables` set " . trim($set, ',');
    return query($sql);
}
 * 
 */

/**
 * 数据 更新
 * @param type $tables
 * @param type $updateData
 * @param type $where
 * @param type $whereData
 * @return type
 * 
 */
function update($tables, $updateData, $where, $whereData = null) {
    if (!is_array($whereData) and $whereData)
        $whereData = array($whereData);
    foreach ($updateData as $key => $value) {
        $set.="`$key`=?,";
    }
    $sql = "update `$tables` set " . trim($set, ',') . " where $where";
    if ($whereData)
        $updateData = array_merge($updateData, $whereData);
    return query_pre($sql, $updateData);
}

/*
function update($tables, $updateData, $where, $whereData = null){
    //$where='id=? and a=?' $whereData=array(1,2)
    global $conn;
    if (!is_array($whereData) and $whereData)
        $whereData = array($whereData);
    foreach ($updateData as $key => $value) {
        $value=mysqli_real_escape_string($conn,$value);
        $set.="`$key`='$value',";
    }
    if(!strstr($where, '?'))
        $newWhere=$where;
    else{
        if(substr_count($where, '?')!=count($whereData))exit('sql错误');
        $ex=explode('?', $where);
        foreach($ex as $k=>$e)if($e)
            $newWhere.=$e."'".mysqli_real_escape_string($conn,$whereData[$k])."'";
    }
    $sql = "update `$tables` set " . trim($set, ',') . " where $newWhere";
    return query($sql);
}
 * 
 */


/**
 * 数据 取一�?
 * @param type $sql
 * @param type $data
 * @return type
 */
function getOne($sql, $data = null) {
    if (!is_array($data) and $data)
        $data = array($data);
    if (strstr($sql, '?') and $data)
        return query_pre($sql, $data)[0];
    else
        return query($sql)->fetch_all(MYSQLI_ASSOC)[0];
}

/**
 * 数据 取全�?
 * @param type $sql
 * @param type $data
 * @return type
 */
function getAll($sql, $data = null) {
    if (!is_array($data) and $data)
        $data = array($data);
    if (strstr($sql, '?') and $data)
        return query_pre($sql, $data);
    else{
        $return =query($sql);
        if($return)return $return->fetch_all(MYSQLI_ASSOC);else echo $sql;
    }
        
}

/**
 * 自定义执�?
 * @global mysqli $conn
 * @param type $sql
 * @return type
 */
function query($sql) {
    global $conn;
    return $conn->query($sql);
}

/**
 * 返回行数
 */
function getCount($sql){
    return query($sql)->num_rows;
}
/**
 * 预处�? 防注入，加�??
 * @global mysqli $conn
 * @param type $sql
 * @param type $data
 * @return boolean
 */
function query_pre($sql, $data) {
    global $conn;
    if (count($data) == 0)
        return false;
    foreach ($data as $key => $value) {
        //$set.="`$key`=?,";
        $ss.='s';
        $k++;
        $v = 'v' . $k;
        $$v = $value;
        $str.='$v' . $k . ',';
    }
    $str = trim($str, ',');
    $pre = $conn->prepare($sql);
    $eval = '$pre->bind_param(' . $ss . ', ' . $str . ');';
    eval($eval);
    $return = $pre->execute();


    if (!strstr(strtolower(substr($sql, 0, 8)), 'select'))
        return $return;
    else
        return $pre->get_result()->fetch_all(MYSQLI_ASSOC);
}

?>
