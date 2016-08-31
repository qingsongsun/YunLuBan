<?php
/**
 * 
 * @author Administrator
 *家居商城
 */
class supermarket_C {
    
    //首页
    static function index(){
        header("Location: v/smarty/common_shop.php");
        exit();
    }

//商品详情
static function showOne(){
    $id=$_GET['id'];
    if ($id){
        header("Location: v/smarty/common_shop_showOne.php?id=$id");
        exit();
    }
    header("Location: v/smarty/common_shop.php");
    exit();

}

}