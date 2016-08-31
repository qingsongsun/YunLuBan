<?php
class product_images_C{
    static $setting=array(
            filter=>array(
                //array('name'=>'用户名','code'=>'name','type'=>'str')
            ),
            lists=>array(
                array(name=>'图片',code=>'src',type=>'photo'),
                array(name=>'颜色',code=>'name',type=>'str'),
                array(name=>'产品',code=>'productId',type=>'select'),
            ),
            edit=>array(//str:单行 text:编辑器 pwd:密码 photo:图片 file:文件 date:日期 select:选择
               's1'=>array(name=>'产品',code=>'productId',type=>'select'),
                array(name=>'颜色',code=>'name',type=>'str'),
                array(name=>'销售价格',code=>'price',type=>'str'),
                array(name=>'市场价',code=>'marketPrice',type=>'str'),
                array(name=>'库存',code=>'stock',type=>'str'),
                array(name=>'图片',code=>'src',type=>'photo'),
            ),
            add=>array(//str:单行 text:编辑器 pwd:密码 photo:图片 file:文件 date:日期 select:选择
               's1'=>array(name=>'产品',code=>'productId',type=>'select'),
                array(name=>'颜色',code=>'name',type=>'str'),
                array(name=>'销售价格',code=>'price',type=>'str'),
                array(name=>'市场价',code=>'marketPrice',type=>'str'),
                array(name=>'库存',code=>'stock',type=>'str'),
                array(name=>'图片',code=>'src',type=>'photo'),
            ),
            page=>array(
                everyPage=>10,
            ),
            action=>array(
                array(name=>'编',url=>'?c=product_images&a=edit&id={id}'),
                array(name=>'删',url=>'?c=product_images&a=delete&id={id}',comfirm=>true),
            ),
            url=>array(
                doEdit=>'?c=product_images&a=doEdit',
                doAdd=>'?c=product_images&a=doAdd',
                afterEdit=>'?c=product_images&a=lists',
                afterDelete=>'?c=product_images&a=lists',
            ),
            table=>'product_images',
            nav=>array(
                '添加'=>'?c=product_images&a=add&productId=',
            )
        
            
            
            
        
        );
    private static function checkLogin(){
        index_C::checkLogin();
    }
    
    static function ini(){
        //初始化
        $get1=getAll("select * from product");
        if ($get1)foreach ($get1 as $g1){
            $arr1[$g1[name]]=$g1[id];
        }
        self::$setting[edit][s1]=self::$setting[add][s1]=array(name=>'品牌',code=>'productId',type=>'select',arr=>$arr1);
        
        if($_GET[productId])$arr=array($_GET[productId]=>$_GET[productId]);
        self::$setting[add][s1]=array(name=>'产品id',code=>'productId',type=>'select',arr=>$arr);
        self::$setting[nav]=array('添加'=>'?c=product_images&a=add&productId='.$_GET[productId],);
        self::$setting[url][afterAdd]='?c=product_images&a=lists&productId='.$_POST[productId];
        self::$setting[url][afterEdit]='?c=product_images&a=lists&productId='.getOne("select productId from product_images where id='{$_POST[id]}'")[productId];
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
