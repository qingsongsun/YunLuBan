<?php
class projects_change_C{
    static $setting=array(
            filter=>array(
                //array('name'=>'用户名','code'=>'name','type'=>'str')
            ),
            lists=>array(
                array(name=>'订单编号',code=>'projectsId',type=>'str'),
                array(name=>'工种',code=>'about',type=>'str'),
                array(name=>'日期',code=>'date',type=>'str'),
                array(name=>'增减数量',code=>'sizeChange',type=>'str'),
                array(name=>'单价(元)',code=>'price',type=>'str'),
                array(name=>'小计(元)',code=>'changeAmount',type=>'str'),
                array(name=>'客户已确认',code=>'status',type=>'str'),
            ),
            edit=>array(//str:单行 text:编辑器 pwd:密码 photo:图片 file:文件 date:日期 select:选择
                array(name=>'工种',code=>'about',type=>'str'),
                array(name=>'日期',code=>'date',type=>'date'),
                array(name=>'描述',code=>'description',type=>'str'),
                array(name=>'增减数量',code=>'sizeChange',type=>'str'),
                array(name=>'单价(元)',code=>'price',type=>'str'),
                array(name=>'小计(元)',code=>'changeAmount',type=>'str'),
                array(name=>'客户已确认',code=>'status',type=>'select',arr=>array('待确认'=>0,'已确认'=>1)),
            ),
            add=>array(//str:单行 text:编辑器 pwd:密码 photo:图片 file:文件 date:日期 select:选择
                
            ),
            page=>array(
                everyPage=>10,
            ),
            action=>array(
                array(name=>'编',url=>'?c=projects_change&a=edit&id={id}'),
                array(name=>'删',url=>'?c=projects_change&a=delete&id={id}',comfirm=>true),
            ),
            url=>array(
                doEdit=>'?c=projects_change&a=doEdit',
                doAdd=>'?c=projects_change&a=doAdd',
                afterEdit=>'?c=projects_change&a=lists',
                afterDelete=>'?c=projects_change&a=lists',
            ),
            table=>'projects_change',
            nav=>array(
                '添加'=>'?c=projects_change&a=add',
            )
        
            
            
            
        
        );
    private static function checkLogin(){
        index_C::checkLogin();
    }
    
    static function ini(){
        //初始化
        $arr=array($_GET[projectsId]=>$_GET[projectsId]);
        self::$setting[nav]=array('添加'=>'?c=projects_change&a=add&projectsId='.$_GET[projectsId],);
        self::$setting[url][afterAdd]='?c=projects_change&a=lists&projectsId='.$_POST[projectsId];
        self::$setting[url][afterEdit]='?c=projects_change&a=lists&projectsId='.getOne("select projectsId from projects_change where id='{$_POST[id]}'")[projectsId];
        self::$setting[url][afterDelete]='?c=projects_change&a=lists&projectsId='.getOne("select projectsId from projects_change where id='{$_GET[id]}'")[projectsId];
        
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
