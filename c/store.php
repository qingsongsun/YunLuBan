<?php
/**
 * 体验馆
*/
class store_C {

    /**
     * 主页
     */
    static function index() {
        header("Location: v/smarty/common_store.php");
        exit();
    }
    
    /**
     * 体验馆
     */
    static function show(){
        $id=$_GET['id'];
        if ($id){
            header("Location: v/smarty/common_showOne_store.php?id=$id");
            exit();
        }
    }
    
}