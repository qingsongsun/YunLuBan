<?php
class worker_C{
    static $setting=array(
            filter=>array(
                //array('name'=>'用户名','code'=>'name','type'=>'str')
            ),
            lists=>array(
                array(name=>'头像',code=>'icon',type=>'photo'),
                array(name=>'名字',code=>'name',type=>'str'),
                array(name=>'职位',code=>'pro',type=>'str')
            ),
            edit=>array(//str:单行 text:编辑器 pwd:密码 photo:图片 file:文件 date:日期 select:选择
                array(name=>'名字',code=>'name',type=>'str'),
                array(name=>'职位',code=>'pro',type=>'str'),
                array(name=>'手机号码',code=>'mebile',type=>'str'),
                array(name=>'头像',code=>'icon',type=>'photo')
            ),
            page=>array(
                everyPage=>5,
            ),
            action=>array(
                array(name=>'编',url=>'?c=worker&a=edit&id={id}'),
                array(name=>'删',url=>'?c=worker&a=delete&id={id}',comfirm=>true),
            ),
            url=>array(
                doEdit=>'?c=worker&a=doEdit',
                afterEdit=>'?c=worker&a=lists',
                afterDelete=>'?c=worker&a=lists',
            ),
            table=>'worker'
        
            
            
            
        
        );
    private static function checkLogin(){
        index_C::checkLogin();
    }
    
    
    static function lists(){
        include_once DIR_LIB.'code/common_lists.php';
    }
    
    static function edit(){
        include_once DIR_LIB.'code/common_edit.php';
    }
    
    
    static function doEdit(){
        include_once DIR_LIB.'code/common_doEdit.php';
    }
    
    static function delete(){
        include_once DIR_LIB.'code/common_delete.php';
    }
    
}
