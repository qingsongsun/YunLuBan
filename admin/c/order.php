<?php
class order_C{
    static $setting=array(
            filter=>array(
                //array('name'=>'用户名','code'=>'name','type'=>'str')
            ),
            lists=>array(
                    array(name=>'订单',code=>'order_num',type=>'str'),
//                     array(name=>'运费',code=>'freight',type=>'str'),
                    array(name=>'金额',code=>'money',type=>'str'),
                    array(name=>'用户',code=>'memberId',type=>'select'),
                    array(name=>'状态',code=>'status',type=>'select',arr=>array('未付款'=>0,'已支付'=>1,'已收货'=>2,'已完成'=>3,'已过期'=>4)),
                    array(name=>'日期',code=>'date',type=>'str')
            ),
            edit=>array(//str:单行 text:编辑器 pwd:密码 photo:图片 file:文件 date:日期 select:选择
                    array(name=>'订单',code=>'order_num',type=>'str'),
                    array(name=>'日期',code=>'date',type=>'date'),
                    array(name=>'运费',code=>'freight',type=>'str'),
                    array(name=>'金额',code=>'money',type=>'str'),
                's2'=>array(name=>'收货地址',code=>'addid',type=>'select'),
                array(name=>'状态',code=>'status',type=>'select',arr=>array('未付款'=>0,'已支付'=>1,'已收货'=>2,'已完成'=>3,'已过期'=>4)),
                array(name=>'备注',code=>'remarks',type=>'text')
            ),
            add=>array(//str:单行 text:编辑器 pwd:密码 photo:图片 file:文件 date:日期 select:选择
                
            ),
            page=>array(
                everyPage=>5,
            ),
            action=>array(
                array(name=>'<订单商品>',url=>'?c=order_list&a=lists&order_num={order_num}'),
                
                array(name=>'编',url=>'?c=order&a=edit&id={id}'),
                array(name=>'删',url=>'?c=order&a=delete&id={id}',comfirm=>true),
            ),
            url=>array(
                doEdit=>'?c=order&a=doEdit',
                doAdd=>'?c=order&a=doAdd',
                afterEdit=>'?c=order&a=lists',
                afterDelete=>'?c=order&a=lists',
            ),
            table=>'orders',
//         nav=>array(
//                 '添加'=>'?c=order&a=add',
//             )
        
        );
    private static function checkLogin(){
        index_C::checkLogin();
    }
    static function ini(){
        //初始化
        
//         self::$setting[add]=self::$setting[edit];
//         $get=getAll("select * from member");
//         if($get)foreach ($get as $g){
//             $arr[$g[name]]=$g[id];
//         }
//         self::$setting[edit][s1]=self::$setting[add][s1]=array(name=>'用户',code=>'memberId',type=>'select',arr=>$arr);
        
        self::$setting[add]=self::$setting[edit];
        $ad=getAll("select * from address");
        if ($ad)foreach ($ad as $add){
            $arr[$add[address]]=$add[id];
        }
        self::$setting[edit][s2]=self::$setting[add][s2]=array(name=>'收货地址',code=>'addid',type=>'select',arr=>$arr);
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
