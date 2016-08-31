<?php
class infoType_C{
    static $setting=array(
            filter=>array(
                //array('name'=>'用户名','code'=>'name','type'=>'str')
            ),
            lists=>array(
                array(name=>'分类名',code=>'name',type=>'str'),
                array(name=>'代号',code=>'code',type=>'str'),
            ),
            edit=>array(//str:单行 text:编辑器 pwd:密码 photo:图片 file:文件 date:日期 select:选择
                array(name=>'分类名',code=>'name',type=>'str'),
                array(name=>'代号(唯一)',code=>'code',type=>'str'),
            ),
            add=>array(//str:单行 text:编辑器 pwd:密码 photo:图片 file:文件 date:日期 select:选择
                
            ),
            page=>array(
                everyPage=>10,
            ),
            action=>array(
                array(name=>'查看',url=>'?c=info&a=lists&infotypeId={id}'),
                array(name=>'编',url=>'?c=infoType&a=edit&id={id}'),
                array(name=>'删',url=>'?c=infoType&a=delete&id={id}',comfirm=>true),
            ),
            url=>array(
                doEdit=>'?c=infoType&a=doEdit',
                doAdd=>'?c=infoType&a=doAdd',
                afterEdit=>'?c=infoType&a=lists',
                afterDelete=>'?c=infoType&a=lists',
            ),
            table=>'infotype',
            nav=>array(
                '添加'=>'?c=infoType&a=add',
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
