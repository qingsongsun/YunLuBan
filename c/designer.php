<?php
/**
 * 
 * @author Administrator
 *精英设计师
 */
class designer_C{
    
    //首页
    static function index() {
        header("Location: v/smarty/common_designer.php");
        exit();
    }
    
    //设计师详细信息
    static function showOne(){
        $id=$_GET['id'];
        if ($id){
        header("Location: v/smarty/common_designer_showOne.php?id=$id");
        exit();
        }
    }
}