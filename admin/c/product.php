<?php
class product_C{
    static $setting=array(
            filter=>array(
                //array('name'=>'用户名','code'=>'name','type'=>'str')
            ),
            lists=>array(
                array(name=>'图',code=>'photo',type=>'photo'),
                array(name=>'小分类',code=>'classId',type=>'select'),
                array(name=>'产品名',code=>'name',type=>'str'),
                array(name=>'价格',code=>'price',type=>'str'),
                array(name=>'短描述',code=>'shortDesc',type=>'str'),
            ),
            edit=>array(//str:单行 text:编辑器 pwd:密码 photo:图片 file:文件 date:日期 select:选择
                's1'=>array(name=>'小分类',code=>'classId',type=>'select'),
                's2'=>array(name=>'品牌',code=>'brandId',type=>'select'),
                array(name=>'产品名',code=>'name',type=>'str'),
                array(name=>'销售价格',code=>'price',type=>'str'),
                array(name=>'市场价',code=>'marketPrice',type=>'str'),
                array(name=>'短描述',code=>'shortDesc',type=>'str'),
                array(name=>'长描述',code=>'longDesc',type=>'text'),
                array(name=>'产品参数',code=>'par',type=>'text'),
                array(name=>'售后服务',code=>'service',type=>'text'),
                array(name=>'主图',code=>'photo',type=>'photo'),
            ),
            add=>array(//str:单行 text:编辑器 pwd:密码 photo:图片 file:文件 date:日期 select:选择
                
            ),
            page=>array(
                everyPage=>5,
            ),
            action=>array(
                array(name=>'相册',url=>'?c=product_images&a=lists&productId={id}'),
                array(name=>'编',url=>'?c=product&a=edit&id={id}'),
                array(name=>'删',url=>'?c=product&a=delete&id={id}',comfirm=>true),
            ),
            url=>array(
                doEdit=>'?c=product&a=doEdit',
                doAdd=>'?c=product&a=doAdd',
                afterEdit=>'?c=product&a=lists',
                afterDelete=>'?c=product&a=lists',
            ),
            table=>'product',
            nav=>array(
                '添加'=>'?c=product&a=add',
            )
        
            
            
            
        
        );
    private static function checkLogin(){
        index_C::checkLogin();
    }
    
    static function ini(){
        //初始化
        self::$setting[add]=self::$setting[edit];
        $get=getAll("select * from class");
        if ($get)foreach ($get as $g){
            $arr[$g[name]]=$g[id];
        }
        self::$setting[edit][s1]=self::$setting[add][s1]=array(name=>'小分类',code=>'classId',type=>'select',arr=>$arr);
        
        $get1=getAll("select * from brand");
        if ($get1)foreach ($get1 as $g1){
            $arr1[$g1[name]]=$g1[id];
        }
        self::$setting[edit][s2]=self::$setting[add][s2]=array(name=>'品牌',code=>'brandId',type=>'select',arr=>$arr1);
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
