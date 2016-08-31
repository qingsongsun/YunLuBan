<?php
class designer_C{
    static $setting=array(
            filter=>array(
                //array('name'=>'用户名','code'=>'name','type'=>'str')
            ),
            lists=>array(
                array(name=>'头像',code=>'icon',type=>'photo'),
                array(name=>'名字',code=>'name',type=>'str'),
                array(name=>'专业',code=>'pro',type=>'str'),
                array(name=>'经验(年)',code=>'years',type=>'str'),
                array(name=>'擅长风格',code=>'style',type=>'str'),
                array(name=>'费用',code=>'cost',type=>'str'),
            ),
            edit=>array(//str:单行 text:编辑器 pwd:密码 photo:图片 file:文件 date:日期 select:选择
                array(name=>'名字',code=>'name',type=>'str'),
                array(name=>'专业',code=>'pro',type=>'str'),
                array(name=>'经验(年)',code=>'years',type=>'str'),
                array(name=>'擅长风格',code=>'style',type=>'str'),
                array(name=>'服务区域',code=>'service',type=>'str'),
                array(name=>'费用',code=>'cost',type=>'str'),
                array(name=>'所在地',code=>'location',type=>'select' ,arr=>array('中山'=>'中山','深圳'=>'深圳')),
                array(name=>'头像',code=>'icon',type=>'photo'),
                
            ),
            add=>array(//str:单行 text:编辑器 pwd:密码 photo:图片 file:文件 date:日期 select:选择
                
            ),
            page=>array(
                everyPage=>10,
            ),
            action=>array(
                array(name=>'编',url=>'?c=designer&a=edit&id={id}'),
                array(name=>'删',url=>'?c=designer&a=delete&id={id}',comfirm=>true),
            ),
            url=>array(
                doEdit=>'?c=designer&a=doEdit',
                doAdd=>'?c=designer&a=doAdd',
                afterEdit=>'?c=designer&a=lists',
                afterDelete=>'?c=designer&a=lists',
            ),
            table=>'designer',
            nav=>array(
                '添加'=>'?c=designer&a=add',
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
