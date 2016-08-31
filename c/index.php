<?php
/**
 * 后台主页
 */
class index_C {
    
    /**
     * 主页
     */
    static function index() {
       header("Location: v/smarty/common_index.php");
       exit();
    }
    /**
     * 登录
     */
    static function login(){
        header("Location: v/smarty/common_main.php?a=login");
        exit();
    }
    /**
     * 注册
     */
    static function reg(){
        header("Location: v/smarty/common_main.php?a=reg");
        exit();
    }
    /**
     * 忘记密码
     */
    static function findpass(){
        header("Location: v/smarty/common_main.php?a=findpass");
        exit();
    }
    /**
     * 中国银行贷款
     */
    static function provide_boc(){
        header("Location: v/smarty/common_provide.php?a=boc");
        exit();
    }
    /**
     * 建设银行贷款
     */
    static function provide_ccb(){
        header("Location: v/smarty/common_provide.php?a=ccb");
        exit();
    }
    /**
     * 服务流程
     */
    static function flow(){
        header("Location: v/smarty/common_flow.php");
        exit();
    }
    /** 
     * 398套餐
     */
    static function setMeal(){
       header("Location: v/smarty/common_setMeal.php");
       exit();
    }
    
    /**
     * 检查登录
     */
    static function checkLogin(){
        if(!$_SESSION['memberId']){
            header("Location: v/smarty/common_main.php?a=login&mess=2");
            exit();
        }
    }
    
    /**
     * 留言
     */
    static function message(){
        self::checkLogin();
        $mess=$_POST[mess];
        if($mess){
            $date=date('Y-m-d');
            insert("message", array(mess=>$mess,date=>$date,memberId=>$_SESSION['memberId']));
            self::index();
        }else {
            self::index();
        }
    } 
    
    /**
     * foot部分
     */
    static function about(){
       header("Location: v/smarty/common_temp.php?a=about");
       exit();
    }
    static function touch(){
        header("Location: v/smarty/common_temp.php?a=touch");
        exit();
    }
    static function help(){
        header("Location: v/smarty/common_temp.php?a=help");
        exit();
    }
    static function feedback(){
        header("Location: v/smarty/common_temp.php?a=feedback");
        exit();
    }
    static function join(){
        header("Location: v/smarty/common_temp.php?a=join");
        exit();
    }
    static function statement(){
        header("Location: v/smarty/common_temp.php?a=statement");
        exit();
    }
    
}