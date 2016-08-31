<?php
class member_C{
    static $setting=array(
            filter=>array(
                //array('name'=>'用户名','code'=>'name','type'=>'str')
            ),
            lists=>array(
                array(name=>'用户名',code=>'username',type=>'str'),
                array(name=>'姓名',code=>'name',type=>'str'),
                array(name=>'性别',code=>'sex',type=>'str'),
                array(name=>'生日',code=>'birthday',type=>'str'),
            ),
            edit=>array(//str:单行 text:编辑器 pwd:密码 photo:图片 file:文件 date:日期 select:选择
                array(name=>'用户名',code=>'username',type=>'str'),
                array(name=>'姓名',code=>'name',type=>'str'),
                array(name=>'性别',code=>'sex',type=>'select',arr=>array('男'=>'男','女'=>'女')),
                array(name=>'生日',code=>'birthday',type=>'date'),
                array(name=>'密码',code=>'password',type=>'pwd'),
                array(name=>'头像',code=>'icon',type=>'photo'),
            ),
            page=>array(
                everyPage=>10,
            ),
            action=>array(
                array(name=>'编',url=>'?c=member&a=edit&id={id}'),
                array(name=>'删',url=>'?c=member&a=delete&id={id}',comfirm=>true),
            ),
            url=>array(
                doEdit=>'?c=member&a=doEdit',
                afterEdit=>'?c=member&a=lists',
                afterDelete=>'?c=member&a=lists',
            ),
            table=>'member'
        
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
