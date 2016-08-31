<?php
/**
 * 后台主页
*/
class live_C {
    
    //直播间
    static function index() {
        header("Location: v/smarty/common_live.php");
        exit();
    }
    
    //直播详情
    static function live(){
        $pid=$_GET['pid'];
        if ($pid){
        header("Location: v/smarty/common_live_room.php?pid=$pid");
        exit();
        }else {
            header("Location: v/smarty/common_index.php");
            exit();
        }
    }
}
