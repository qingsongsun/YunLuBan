<?php
class store_C{
    static $setting=array(
            filter=>array(
                //array('name'=>'用户名','code'=>'name','type'=>'str')
            ),
            lists=>array(
                    array(name=>'图片',code=>'pic',type=>'photo'),
                    array(name=>'城市',code=>'city',type=>'str'),
                    array(name=>'名字',code=>'name',type=>'str'),
                    array(name=>'电话',code=>'mebile',type=>'str'),
            ),
            edit=>array(//str:单行 text:编辑器 pwd:密码 photo:图片 file:文件 date:日期 select:选择
                    array(name=>'名字',code=>'name',type=>'str'),
                    array(name=>'城市',code=>'city',type=>'str'),
                    array(name=>'地址',code=>'address',type=>'str'),
                    array(name=>'营业时间',code=>'time',type=>'str'),
                    array(name=>'电话',code=>'mebile',type=>'str'),
                    array(name=>'标语',code=>'title',type=>'str'),
                    array(name=>'介绍',code=>'text',type=>'text'),
                    array(name=>'图片',code=>'pic',type=>'photo'),
                ),
            add=>array(//str:单行 text:编辑器 pwd:密码 photo:图片 file:文件 date:日期 select:选择
                
            ),
            page=>array(
                everyPage=>10,
            ),
            action=>array(
                array(name=>'编',url=>'?c=store&a=edit&id={id}'),
                array(name=>'删',url=>'?c=store&a=delete&id={id}',comfirm=>true),
            ),
            url=>array(
                doEdit=>'?c=store&a=doEdit',
                doAdd=>'?c=store&a=doAdd',
                afterEdit=>'?c=store&a=lists',
                afterDelete=>'?c=store&a=lists',
            ),
            table=>'store',
            nav=>array(
                '添加'=>'?c=store&a=add',
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
