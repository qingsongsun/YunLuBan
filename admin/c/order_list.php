<?php
class order_list_C{
    static $setting=array(
            filter=>array(
                //array('name'=>'用户名','code'=>'name','type'=>'str')
            ),
            lists=>array(
                array(name=>'商品',code=>'src',type=>'photo'),
                array(name=>'名称',code=>'name',type=>'str'),
//                 array(name=>'日期',code=>'date',type=>'str'),
                array(name=>'样式',code=>'type',type=>'str'),
                array(name=>'数量',code=>'number',type=>'str')

            ),
            edit=>array(//str:单行 text:编辑器 pwd:密码 photo:图片 file:文件 date:日期 select:选择
                array(name=>'订单号',code=>'order_num',type=>'str'),
                array(name=>'商品',code=>'src',type=>'photo'),
                array(name=>'名称',code=>'name',type=>'str'),
                array(name=>'样式',code=>'type',type=>'str'),
                array(name=>'数量',code=>'number',type=>'str'),
                array(name=>'单价',code=>'price',type=>'str')

            ),
            add=>array(//str:单行 text:编辑器 pwd:密码 photo:图片 file:文件 date:日期 select:选择
                
            ),
            page=>array(
                everyPage=>5,
            ),
            action=>array(
                array(name=>'编',url=>'?c=order_list&a=edit&id={id}'),
                array(name=>'删',url=>'?c=order_list&a=delete&id={id}',comfirm=>true),
            ),
            url=>array(
                doEdit=>'?c=order_list&a=doEdit',
                doAdd=>'?c=order_list&a=doAdd',
                afterEdit=>'?c=order_list&a=lists',
                afterDelete=>'?c=order_list&a=lists',
            ),
            table=>'order_list',
            
        
        );
    private static function checkLogin(){
        index_C::checkLogin();
    }
    
    static function ini(){
        //初始化
        $arr=array($_GET[order_num]=>$_GET[order_num]);
        self::$setting[nav]=array('添加'=>'?c=order_list&a=add&order_num='.$_GET[order_num],);
        self::$setting[url][afterAdd]='?c=order_list&a=lists&order_num='.$_POST[order_num];
        self::$setting[url][afterEdit]='?c=order_list&a=lists&order_num='.getOne("select order_num from order_list where id='{$_POST[order_num]}'")[order_num];
        self::$setting[url][afterDelete]='?c=order_list&a=lists&order_num='.getOne("select order_num from order_list where id='{$_GET[order_num]}'")[order_num];
        
        self::$setting[add]=self::$setting[edit];
//         self::$setting[add][s1]=array(name=>'项目id',code=>'projectsId',type=>'select',arr=>$arr);
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
