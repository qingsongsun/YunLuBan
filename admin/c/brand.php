<?php
class brand_C{
    static $setting=array(
            filter=>array(
                //array('name'=>'用户名','code'=>'name','type'=>'str')
            ),
            lists=>array(
                array(name=>'logo',code=>'logo',type=>'photo'),
                array(name=>'品牌',code=>'name',type=>'str'),
            ),
            edit=>array(//str:单行 text:编辑器 pwd:密码 photo:图片 file:文件 date:日期 select:选择
                array(name=>'品牌',code=>'name',type=>'str'),
                array(name=>'logo',code=>'logo',type=>'photo'),
            ),
            page=>array(
                everyPage=>10,
            ),
            action=>array(
                array(name=>'编',url=>'?c=brand&a=edit&id={id}'),
                array(name=>'删',url=>'?c=brand&a=delete&id={id}',comfirm=>true),
            ),
            url=>array(
                doEdit=>'?c=brand&a=doEdit',
                afterEdit=>'?c=brand&a=lists',
                afterDelete=>'?c=brand&a=lists',
            ),
            table=>'brand',
        nav=>array(
            '添加'=>'?c=brand&a=add',
        )
        );
    
    private static function checkLogin(){
        index_C::checkLogin();
    }
    
    
    static function ini(){
        //初始化
        self::$setting[add]=self::$setting[edit];
    }
    
    static function lists(){
        self::ini();
        include_once DIR_LIB.'code/common_lists.php';
    }
    static function add(){
        self::ini();
        $add=1;
        include_once DIR_LIB.'code/common_edit.php';
    }
    static function edit(){
        self::ini();
        include_once DIR_LIB.'code/common_edit.php';
    }
    
    static function doAdd(){
        self::ini();
        include_once DIR_LIB.'code/common_doEdit.php';
    }
    static function doEdit(){
        self::ini();
        include_once DIR_LIB.'code/common_doEdit.php';
    }
    
    static function delete(){
        include_once DIR_LIB.'code/common_delete.php';
    }
}
