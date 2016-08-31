<?php
class projects_images_design_C{
    static $setting=array(
            filter=>array(
                //array('name'=>'用户名','code'=>'name','type'=>'str')
            ),
            lists=>array(
                array(name=>'图片名(图纸名)',code=>'name',type=>'str'),
                array(name=>'图片',code=>'src',type=>'photo'),
                array(name=>'订单编号',code=>'projectsId',type=>'str'),
                
            ),
            edit=>array(//str:单行 text:编辑器 pwd:密码 photo:图片 file:文件 date:日期 select:选择
                array(name=>'图片名(图纸名)',code=>'name',type=>'str'),
                array(name=>'图片',code=>'src',type=>'photo'),
            ),
            add=>array(//str:单行 text:编辑器 pwd:密码 photo:图片 file:文件 date:日期 select:选择
                
            ),
            page=>array(
                everyPage=>10,
            ),
            action=>array(
                array(name=>'编',url=>'?c=projects_images_design&a=edit&id={id}'),
                array(name=>'删',url=>'?c=projects_images_design&a=delete&id={id}',comfirm=>true),
            ),
            url=>array(
                doEdit=>'?c=projects_images_design&a=doEdit',
                doAdd=>'?c=projects_images_design&a=doAdd',
                afterEdit=>'?c=projects_images_design&a=lists',
                afterDelete=>'?c=projects_images_design&a=lists',
            ),
            table=>'projects_images_design',
            nav=>array(
                '添加'=>'?c=projects_images_design&a=add',
            )
        
            
            
            
        
        );
    private static function checkLogin(){
        index_C::checkLogin();
    }
    
    static function ini(){
        //初始化
        $arr=array($_GET[projectsId]=>$_GET[projectsId]);
        self::$setting[nav]=array('添加'=>'?c=projects_images_design&a=add&projectsId='.$_GET[projectsId],);
        self::$setting[url][afterAdd]='?c=projects_images_design&a=lists&projectsId='.$_POST[projectsId];
        self::$setting[url][afterEdit]='?c=projects_images_design&a=lists&projectsId='.getOne("select projectsId from projects_images_design where id='{$_POST[id]}'")[projectsId];
        self::$setting[url][afterDelete]='?c=projects_images_design&a=lists&projectsId='.getOne("select projectsId from projects_images_design where id='{$_GET[id]}'")[projectsId];
        
        self::$setting[add]=self::$setting[edit];
        self::$setting[add][s1]=array(name=>'项目id',code=>'projectsId',type=>'select',arr=>$arr);
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
        self::ini();
        include_once DIR_LIB.'code/common_delete.php';
    }
    
}
