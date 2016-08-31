<?php
class message_C{
    static $setting=array(
            filter=>array(
                //array('name'=>'用户名','code'=>'name','type'=>'str')
            ),
            lists=>array(
                array(name=>'留言',code=>'mess',type=>'str'),
                array(name=>'用户',code=>'memberId',type=>'select'),
                array(name=>'时间',code=>'date',type=>'date'),
            ),
            edit=>array(//str:单行 text:编辑器 pwd:密码 photo:图片 file:文件 date:日期 select:选择
                array(name=>'留言',code=>'mess',type=>'str'),
                's1'=>array(name=>'用户',code=>'memberId',type=>'select'),
                array(name=>'时间',code=>'date',type=>'date'),
            ),
            page=>array(
                everyPage=>10,
            ),
            action=>array(
                array(name=>'编',url=>'?c=message&a=edit&id={id}'),
                array(name=>'删',url=>'?c=message&a=delete&id={id}',comfirm=>true),
            ),
            url=>array(
                doEdit=>'?c=message&a=doEdit',
                afterEdit=>'?c=message&a=lists',
                afterDelete=>'?c=message&a=lists',
            ),
            table=>'message',
        nav=>array(
            '添加'=>'?c=message&a=add',
        )
        );
    
    private static function checkLogin(){
        index_C::checkLogin();
    }
    
    
    static function ini(){
        //初始化

        self::$setting[add]=self::$setting[edit];
        $get=getAll("select * from member");
        if($get)foreach ($get as $g){
            $arr[$g[name]]=$g[id];
        }
        self::$setting[edit][s1]=self::$setting[add][s1]=array(name=>'用户',code=>'memberId',type=>'select',arr=>$arr);
        
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
