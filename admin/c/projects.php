<?php
class projects_C{
    static $setting=array(
            filter=>array(
                //array('name'=>'用户名','code'=>'name','type'=>'str')
            ),
            lists=>array(
                array(name=>'姓名',code=>'memberId',type=>'select'),
                array(name=>'性别',code=>'sex',type=>'select',arr=>array('男'=>'男','女'=>'女')),
                array(name=>'小区名',code=>'resident',type=>'str'),
                array(name=>'地址',code=>'address',type=>'str'),
                array(name=>'状态',code=>'status',type=>'selelct',arr=>array('施工完成（案例展示）'=>'施工完成','施工中（案例展示）'=>'施工中','施工'=>'施工','完成'=>'完成','已付款'=>'已付款')),
            ),
            edit=>array(//str:单行 text:编辑器 pwd:密码 photo:图片 file:文件 date:日期 select:选择
                'xm'=>array(name=>'姓名',code=>'memberId',type=>'select'),
//                 array(name=>'性别',code=>'sex',type=>'select',arr=>array('男'=>'男','女'=>'女')),
                array(name=>'小区名',code=>'resident',type=>'str'),
                array(name=>'建筑面积',code=>'size',type=>'str'),
                's1'=>array(name=>'房屋情况',code=>'newold',type=>'select'),
                array(name=>'具体地址',code=>'address',type=>'str'),
                's2'=>array(name=>'户型',code=>'layout',type=>'select'),
                's3'=>array(name=>'房屋类型',code=>'type',type=>'select'),
                's5'=>array(name=>'套餐',code=>'package',type=>'select'),
                array(name=>'金额',code=>'amount',type=>'str'),
                array(name=>'已交金额',code=>'deposit',type=>'str'),
                array(name=>'状态',code=>'status',type=>'selelct',arr=>array('施工完成（案例展示）'=>'施工完成','施工中（案例展示）'=>'施工中','施工'=>'施工','完成'=>'完成','已付款'=>'已付款'))
            ),
            add=>array(//str:单行 text:编辑器 pwd:密码 photo:图片 file:文件 date:日期 select:选择
                
            ),
            page=>array(
                everyPage=>10,
            ),
            action=>array(
                array(name=>'<项目修改>',url=>'?c=projects_change&a=lists&projectsId={id}'),
                array(name=>'<团队>',url=>'?c=projects_team&a=lists&projectsId={id}'),
                array(name=>'<效果图>',url=>'?c=projects_images_design&a=lists&projectsId={id}'),
                array(name=>'<施工图>',url=>'?c=projects_images_constr&a=lists&projectsId={id}'),
                array(name=>'<隐蔽工程图片>',url=>'?c=projects_images_hidden&a=lists&projectsId={id}'),
                array(name=>'<装修现场>',url=>'?c=projects_images_live&a=lists&projectsId={id}'),
                
                array(name=>'编',url=>'?c=projects&a=edit&id={id}'),
                array(name=>'删',url=>'?c=projects&a=delete&id={id}',comfirm=>true),
            ),
            url=>array(
                doEdit=>'?c=projects&a=doEdit',
                doAdd=>'?c=projects&a=doAdd',
                afterEdit=>'?c=projects&a=lists',
                afterDelete=>'?c=projects&a=lists',
            ),
            table=>'projects',
            nav=>array(
                '添加'=>'?c=projects&a=add',
            )
        
            
            
            
        
        );
    private static function checkLogin(){
        index_C::checkLogin();
    }
    
    static function ini(){
        //初始化
        self::$setting[edit][s1][arr]=  info_M::get(isnew);
        self::$setting[edit][s2][arr]=  info_M::get(layout);
        self::$setting[edit][s3][arr]=  info_M::get(htype);
//         self::$setting[edit][s4][arr]=  info_M::get(size);
        self::$setting[edit][s5][arr]=  info_M::get(package);
        self::$setting[add]=self::$setting[edit];
        
        $get=getAll("select * from member");
        if($get)foreach ($get as $g){
            $arr[$g[name]]=$g[id];
        }
        self::$setting[edit][xm]=self::$setting[add][s1]=array(name=>'姓名',code=>'memberId',type=>'select',arr=>$arr);
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
