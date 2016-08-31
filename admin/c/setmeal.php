<?php
class setmeal_C{
    static $setting=array(
            filter=>array(
                //array('name'=>'用户名','code'=>'name','type'=>'str')
            ),
            lists=>array(
                    array(name=>'套餐',code=>'infoId',type=>'select'),
                    array(name=>'显示',code=>'pic',type=>'photo'),
                    array(name=>'图片',code=>'name',type=>'str'),
            ),
            edit=>array(//str:单行 text:编辑器 pwd:密码 photo:图片 file:文件 date:日期 select:选择
                's1'=>array(name=>'套餐',code=>'infoId',type=>'select'),
                    array(name=>'图片',code=>'name',type=>'str'),
                    array(name=>'显示',code=>'pic',type=>'photo'),
            ),
            add=>array(//str:单行 text:编辑器 pwd:密码 photo:图片 file:文件 date:日期 select:选择
                
            ),
            page=>array(
                everyPage=>10,
            ),
            action=>array(
                array(name=>'编',url=>'?c=setmeal&a=edit&id={id}'),
                array(name=>'删',url=>'?c=setmeal&a=delete&id={id}',comfirm=>true),
            ),
            url=>array(
                doEdit=>'?c=setmeal&a=doEdit',
                doAdd=>'?c=setmeal&a=doAdd',
                afterEdit=>'?c=setmeal&a=lists',
                afterDelete=>'?c=setmeal&a=lists',
            ),
            table=>'setmeal',
            nav=>array(
                '添加'=>'?c=setmeal&a=add',
            )
        
            
            
            
        
        );
    private static function checkLogin(){
        index_C::checkLogin();
    }
    static function ini(){
        //初始化
        
        self::$setting[add]=self::$setting[edit];
        $get=getAll("select * from info where infotypeId=4");
        if($get)foreach ($get as $g){
            $arr[$g[name]]=$g[id];
        }
        self::$setting[edit][s1]=self::$setting[add][s1]=array(name=>'套餐',code=>'infoId',type=>'select',arr=>$arr);
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
