<?php
class info_C{
    static $setting=array(
            filter=>array(
                //array('name'=>'用户名','code'=>'name','type'=>'str')
            ),
            lists=>array(
                    array(name=>'分组',code=>'infotypeId',type=>'select'),
                    array(name=>'显示',code=>'name',type=>'str'),
                    array(name=>'必填值',code=>'value1',type=>'str'),
                    array(name=>'附加值',code=>'value2',type=>'str'),
            ),
            edit=>array(//str:单行 text:编辑器 pwd:密码 photo:图片 file:文件 date:日期 select:选择
                's1'=>array(name=>'分组',code=>'infotypeId',type=>'select'),
                array(name=>'显示',code=>'name',type=>'str'),
                    array(name=>'必填值',code=>'value1',type=>'str'),
                    array(name=>'附加值',code=>'value2',type=>'str'),
            ),
            add=>array(//str:单行 text:编辑器 pwd:密码 photo:图片 file:文件 date:日期 select:选择
                
            ),
            page=>array(
                everyPage=>10,
            ),
            action=>array(
                array(name=>'编',url=>'?c=info&a=edit&id={id}'),
                array(name=>'删',url=>'?c=info&a=delete&id={id}',comfirm=>true),
            ),
            url=>array(
                doEdit=>'?c=info&a=doEdit',
                doAdd=>'?c=info&a=doAdd',
                afterEdit=>'?c=info&a=lists',
                afterDelete=>'?c=info&a=lists',
            ),
            table=>'info',
            nav=>array(
                '添加'=>'?c=info&a=add',
            )
        
            
            
            
        
        );
    private static function checkLogin(){
        index_C::checkLogin();
    }
    static function ini(){
        //初始化
        
//         if($_GET[infotypeId])$arr=array(getOne("select * from infotype where id='$_GET[infotypeId]'")[name]=>$_GET[infotypeId]);
       
//         self::$setting[nav]=array('添加'=>'?c=info&a=add&infotypeId='.$_GET[infotypeId],);
//         self::$setting[url][afterAdd]='?c=info&a=lists&infotypeId='.$_POST[infotypeId];
//         self::$setting[url][afterEdit]='?c=info&a=lists&infotypeId='.getOne("select infotypeId from info where id='{$_POST[id]}'")[infotypeId];
//         self::$setting[add]=self::$setting[edit];
//         self::$setting[add][s1]=array(name=>'分类',code=>'infotypeId',type=>'select',arr=>$arr);

        self::$setting[add]=self::$setting[edit];
        $get=getAll("select * from infotype");
        if($get)foreach ($get as $g){
            $arr[$g[name]]=$g[id];
        }
        self::$setting[edit][s1]=self::$setting[add][s1]=array(name=>'分组',code=>'infotypeId',type=>'select',arr=>$arr);
        
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
