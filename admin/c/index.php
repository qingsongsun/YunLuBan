<?php
/**
 * 后台主页
 */
class index_C {
    static function index() {
        self::checkLogin();
        self::main();
    }
    /**
     * 登录
     */
    static function login(){
        include V.'index_login.php';
    } 
    /**
     * 退出
     */
    static function logout(){
        $_SESSION['adminUserId']=null;
        header("location:?a=login");
        exit;
    }
    /**
     * 主框架
     */
    static function main(){
        self::checkLogin();
        include V.'index_main.php';
    }
    /**
     * 检查登录
     */
    static function checkLogin(){
        if(!$_SESSION['adminUserId'])
            self::logout ();
    }
    
    static function doLogin(){
        $userName=$_POST[username];
        $passWord=$_POST[password];
        $login=getOne("select * from admin where username=? and password=?",array($userName,  md5($passWord)));
        if($login){
            $_SESSION['adminUserId']=$login[id];
            header("location:?a=main");
        }else header("location:?a=login");
    }
    
}
