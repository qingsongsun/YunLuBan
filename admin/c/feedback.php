<?php
class feedback_C{
    static $setting=array(
            filter=>array(
               
            ),
            lists=>array(
                    array(name=>'信息',code=>'mess',type=>'str'),
                    array(name=>'日期',code=>'date',type=>'date'),
                    array(name=>'状态',code=>'status',type=>'str')
            ),
            edit=>array(//str:单行 text:编辑器 pwd:密码 photo:图片 file:文件 date:日期 select:选择
                    array(name=>'信息',code=>'mess',type=>'str'),
                    array(name=>'日期',code=>'date',type=>'date'),
                    array(name=>'电话',code=>'mobile',type=>'str'),
                    array(name=>'邮箱',code=>'email',type=>'str'),
                    array(name=>'状态',code=>'status',type=>'select',arr=>array('审核中'=>'审核中','审核失败'=>'审核失败','审核通过'=>'审核通过'))
            ),
            add=>array(//str:单行 text:编辑器 pwd:密码 photo:图片 file:文件 date:日期 select:选择
                
            ),
            page=>array(
                everyPage=>10,
            ),
            action=>array(
                array(name=>'编',url=>'?c=feedback&a=edit&id={id}'),
                array(name=>'删',url=>'?c=feedback&a=delete&id={id}',comfirm=>true),
            ),
            url=>array(
                doEdit=>'?c=feedback&a=doEdit',
                doAdd=>'?c=feedback&a=doAdd',
                afterEdit=>'?c=feedback&a=lists',
                afterDelete=>'?c=feedback&a=lists',
            ),
            table=>'feedback',
        
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
    