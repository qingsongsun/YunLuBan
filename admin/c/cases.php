<?php
class cases_C{
    static $setting=array(
            filter=>array(
                //array('name'=>'用户名','code'=>'name','type'=>'str')
            ),
            lists=>array(
                array(name=>'主图',code=>'photo',type=>'photo'),
                array(name=>'案例标题',code=>'title',type=>'str'),
                array(name=>'客户',code=>'customer',type=>'str'),
                array(name=>'面积',code=>'size',type=>'str'),
                array(name=>'风格',code=>'style',type=>'str'),
                array(name=>'总价',code=>'amount',type=>'str'),
            ),
            edit=>array(//str:单行 text:编辑器 pwd:密码 photo:图片 file:文件 date:日期 select:选择
                's1'=>array(name=>'设计师',code=>'designerId',type=>'select'),
                array(name=>'案例标题',code=>'title',type=>'str'),
                array(name=>'客户',code=>'customer',type=>'str'),
                array(name=>'面积',code=>'size',type=>'str'),
                array(name=>'风格',code=>'style',type=>'str'),
                array(name=>'总价',code=>'amount',type=>'str'),
                array(name=>'主图',code=>'photo',type=>'photo'),
            ),
            add=>array(//str:单行 text:编辑器 pwd:密码 photo:图片 file:文件 date:日期 select:选择
                
            ),
            page=>array(
                everyPage=>10,
            ),
            action=>array(
                array(name=>'编',url=>'?c=cases&a=edit&id={id}'),
                array(name=>'删',url=>'?c=cases&a=delete&id={id}',comfirm=>true),
            ),
            url=>array(
                doEdit=>'?c=cases&a=doEdit',
                doAdd=>'?c=cases&a=doAdd',
                afterEdit=>'?c=cases&a=lists',
                afterDelete=>'?c=cases&a=lists',
            ),
            table=>'cases',
            nav=>array(
                '添加'=>'?c=cases&a=add',
            )
        
            
            
            
        
        );
    private static function checkLogin(){
        index_C::checkLogin();
    }
    
    static function ini(){
        //初始化
        self::$setting[add]=self::$setting[edit];
        $get=getAll("select * from designer");
        if($get)foreach ($get as $g){
            $arr[$g[name]]=$g[id];
        }
        self::$setting[edit][s1]=self::$setting[add][s1]=array(name=>'设计师',code=>'designerId',type=>'select',arr=>$arr);
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
