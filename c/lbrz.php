<?php
/**
 * 
 * @author Administrator
 *拎包入住
 */
class lbrz_C{
    
    //套餐
    static function index(){
        $id=$_GET['id'];
        header("Location: v/smarty/common_lbrz.php?id=$id");
        exit();
    }
    
//     //现代简约
//     static function xdjy(){
//         header("Location: v/smarty/common_lbrz.php?a=xdjy");
//         exit();
//     }
    
//     //现代时尚
//     static function xdss(){
//         header("Location: v/smarty/common_lbrz.php?a=xdss");
//         exit();
//     }
    
//     //新中式
//     static function xzs(){
//         header("Location: v/smarty/common_lbrz.php?a=xzs");
//         exit();
//     }
    
//     //现代欧式
//     static function xdos(){
//         header("Location: v/smarty/common_lbrz.php?a=xdos");
//         exit();
//     }
    
//     //个性艺术风
//     static function gxysf(){
//         header("Location: v/smarty/common_lbrz.php?a=gxysf");
//         exit();
//     }

}