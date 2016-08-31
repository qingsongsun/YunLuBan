<?php
    //require_once 'smarty/Smarty.class.php';
    //创建一个实际路径
    define('ROOT_PATH',dirname(__FILE__ ));
    //引入smarty
    require_once ROOT_PATH.'\smarty\Smarty.class.php';
    //创建一个Smarty对象
    $_smarty=new Smarty();
    //模版目录
    $_smarty->template_dir=ROOT_PATH.'/templates/';
    //编译目录
    $_smarty->compile_dir=ROOT_PATH.'/templates_c/';
    //变量目录
    $_smarty->config_dir=ROOT_PATH.'/configs/';
    //缓存目录
    $_smarty->cache_dir=ROOT_PATH.'/cache/';
    //是否开启缓存
    $_smarty->caching=false;
    //左定界符
    $_smarty->left_delimiter='{';
    //右定界符
    $_smarty->right_delimiter='}';
    
    require 'frame.php';
    
    
    $status=null;
    session_start();
    if(empty($_SESSION['memberId'])){
        $status= "<a class='one'  href='../../?a=login'>登录</a>
                        <a class='two' href='../../?a=reg'>注册</a>";
    }else {
        $member=getOne("select * from member where id='{$_SESSION[memberId]}'");
        $status= "<i class='i-viptxt'><p >会员:$member[username]</p></i>
                        <i class='i-viptxt'><p class='color zintegral'>可用积分:$member[score]</p></i>
                        <a  href='../../?c=admin&a=work_order'  class='one' >个人中心</a>
                        <a  href='../../?c=admin&a=logout'  class='two'  >退出</a>";
    }
    
    $header="<header >
            <div id='logocanv' >
            </div>
            <div id='logonav' >
            <div id='logo' >
            <img src='../../public/image/logo.jpg'/>
            </div>
            <div id='login' >
            <div id='login-play'>
            <p style='color:#b3b2b2;'>欢迎来到云鲁班，一站装修</p>
            $status
            </div>
            </div>
            <nav>
            <ul class='dhjq'>
            <li ><a href='../../'>首页</a></li>
            <li ><a href='../../?a=setMeal'>398套餐</a></li>
            <li ><a href='../../?c=lbrz'>拎包入住</a></li>
            <li ><a href='../../?c=supermarket'>家居商城</a></li>
            <li ><a href='../../?c=designer'>精英设计师</a></li>
            <li ><a href='../../?c=case'>案例馆</a></li>
            </ul>
            </nav>
            </div>
            </header>";
    
    $left="<div class='i-left'>
            <ul><li><a href='javascript:void(0)' class='i-a1'>会员中心</a></li>
            <li class='i-li'>
            <p  class='i-a2'>我的装修</p>
            <a href='../../?c=admin&a=work_order' >·装修订单</a>
            <a href='../../?c=admin&a=work_price'>·预算清单</a>
            <a href='../../?c=admin&a=work_modify'>·修改项目</a>
            <a href='../../?c=admin&a=work_team'>·项目团队</a>
            <a href='../../?c=admin&a=work_resultPic'>·效果图</a>
            <a href='../../?c=admin&a=work_buildPic'>·施工图</a>
            <a href='../../?c=admin&a=work_hidePic'>·隐蔽工程图片</a>
            <a href='../../?c=admin&a=work_scenePic'>·装修现场</a></li>
            <li class='i-li'>
            <p  class='i-a2'>我的收藏</p>
            <a href='../../?c=admin&a=collect_case'>·案例</a>
            <a href='../../?c=admin&a=collect_designer'>·设计师</a></li>
            <li class='i-li'>
            <p  class='i-a2'>家居商城</p>
            <a href='../../?c=admin&a=mall_shoppingCar'>·我的购物车</a>
            <a href='../../?c=admin&a=mall_order'>·商品订单</a>
            <a href='../../?c=admin&a=mall_address'>·收货地址</a></li>
            <li class='i-li'>
            <p  class='i-a2'>个人设置</p>
            <a href='../../?c=admin&a=set_data'>·我的资料</a>
            <a href='../../?c=admin&a=set_head'>·我的头像</a>
            <a href='../../?c=admin&a=set_password'>·修改密码</a></li></ul></div>";
    
    $merId="777290058135251";
    
     function page($sql,$page,$pageSize){
        $data_total=getCount($sql);
        $countPage=ceil($data_total/$pageSize);
        if(!$page)$page=1;
        if ($page<=1){
            $page=1;
        }elseif ($page>$countPage){
            $page=$countPage;
        }
        $start=($page-1)*$pageSize;
        $sql.=" limit $start,$pageSize";
        return array(getAll($sql),$countPage,$page);
    }

?>