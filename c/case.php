<?php
/**
 * 
 * @author Administrator
 *案例馆
 */
class case_C{
    
    //首页(最新案例)
    static function index(){
        header("Location: v/smarty/common_case.php");
        exit();
    }
    
    //案例展示
    static function showOne() {
        $psId=$_GET['psId'];
        if ($psId){
            header("Location: v/smarty/common_case_showOne.php?id=$psId");
            exit();
        }
    }

}