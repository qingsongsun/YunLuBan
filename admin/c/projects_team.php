<?php
class projects_team_C{
    static $setting=array(
            filter=>array(
                //array('name'=>'用户名','code'=>'name','type'=>'str')
            ),
            lists=>array(
                array(name=>'成员',code=>'workerId',type=>'select'),
                array(name=>'备注',code=>'remark',type=>'text'),
            ),
            edit=>array(//str:单行 text:编辑器 pwd:密码 photo:图片 file:文件 date:日期 select:选择
                's2'=>array(name=>'成员',code=>'workerId',type=>'select'),
                array(name=>'备注',code=>'remark',type=>'text'),
            ),
            add=>array(//str:单行 text:编辑器 pwd:密码 photo:图片 file:文件 date:日期 select:选择
                
            ),
            page=>array(
                everyPage=>10,
            ),
            action=>array(
                array(name=>'编',url=>'?c=projects_team&a=edit&id={id}'),
                array(name=>'删',url=>'?c=projects_team&a=delete&id={id}',comfirm=>true),
            ),
            url=>array(
                doEdit=>'?c=projects_team&a=doEdit',
                doAdd=>'?c=projects_team&a=doAdd',
                afterEdit=>'?c=projects_team&a=lists',
                afterDelete=>'?c=projects_team&a=lists',
            ),
            table=>'projects_team',
            nav=>array(
                '添加'=>'?c=projects_team&a=add',
            )
        
            
            
            
        
        );
    private static function checkLogin(){
        index_C::checkLogin();
    }
    
    static function ini(){
        //初始化
        $arr=array($_GET[projectsId]=>$_GET[projectsId]);
        self::$setting[nav]=array('添加'=>'?c=projects_team&a=add&projectsId='.$_GET[projectsId],);
        self::$setting[url][afterAdd]='?c=projects_team&a=lists&projectsId='.$_POST[projectsId];
        self::$setting[url][afterEdit]='?c=projects_team&a=lists&projectsId='.getOne("select projectsId from projects_team where id='{$_POST[id]}'")[projectsId];
        self::$setting[url][afterDelete]='?c=projects_team&a=lists&projectsId='.getOne("select projectsId from projects_team where id='{$_GET[id]}'")[projectsId];
        
        
        $get=getAll("select * from worker");
        if($get)foreach ($get as $g)
            $arr2[$g[name]]=$g[id];
        self::$setting[edit][s2][arr]=$arr2;
        
                
                
                self::$setting[add]=self::$setting[edit];
        self::$setting[add][s1]=array(name=>'项目id',code=>'workerId',type=>'select',arr=>$arr);
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
