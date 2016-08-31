<?php
class smallClass_C{
    static $setting=array(
            filter=>array(
                //array('name'=>'用户名','code'=>'name','type'=>'str')
            ),
            lists=>array(
                array(name=>'上级分类',code=>'categoryId',type=>'select'),
                array(name=>'分类名',code=>'name',type=>'str'),
            ),
            edit=>array(//str:单行 text:编辑器 pwd:密码 photo:图片 file:文件 date:日期 select:选择
                's1'=>array(name=>'上级分类',code=>'categoryId'),
                array(name=>'分类名',code=>'name',type=>'str'),
            ),
            add=>array(//str:单行 text:编辑器 pwd:密码 photo:图片 file:文件 date:日期 select:选择
                's1'=>array(name=>'上级分类',code=>'categoryId'),
                array(name=>'分类名',code=>'name',type=>'str'),
            ),
            page=>array(
                everyPage=>10,
            ),
            action=>array(
                array(name=>'编',url=>'?c=smallClass&a=edit&id={id}'),
                array(name=>'删',url=>'?c=smallClass&a=delete&id={id}',comfirm=>true),
                
            ),
            url=>array(
                doEdit=>'?c=smallClass&a=doEdit',
                doAdd=>'?c=smallClass&a=doAdd',
                afterEdit=>'?c=smallClass&a=lists',
                afterDelete=>'?c=smallClass&a=lists',
            ),
            table=>'class',
            nav=>array(
                '添加'=>'?c=smallClass&a=add',
            )
        
            
            
            
        
        );
    private static function checkLogin(){
        index_C::checkLogin();
    }
    
    static function ini(){
        //初始化
        //$arr=array('无'=>0);
        $get=getAll("select * from category where parentId!=0");
        if($get)foreach ($get as $g)
            $arr[$g[name]]=$g[id];
        self::$setting[edit][s1]=self::$setting[add][s1]=array(name=>'上级分类',code=>'categoryId',type=>'select',arr=>$arr);
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
