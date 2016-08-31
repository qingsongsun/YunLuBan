<?php
/**
 * 
 */
   
class admin_C {
    //登录
    static function doLogin(){
        $userName=$_POST['username'];
        $passWord=$_POST['password'];

        if($_POST['code'] == $_SESSION['img_number']){
            $login=getOne("select * from member where username=? and password=?",array($userName,  md5($passWord)));
            if($login){
                $_SESSION['memberId']=$login[id];
                //echo "session=".$_SESSION['memberId'];
                 header("Location: v/smarty/common_index.php");
                 exit();
            }
        } 
            header("Location: v/smarty/common_main.php?a=login&mess=1");
            exit();
    }
    
    //注册
    static function doReg(){
        $userName=$_POST['username'];
        $passWord=$_POST['password'];
        $repassWord=$_POST['repassword'];
        //手机验证码
        $tel=$_POST['tel'];
        
        if ($passWord==$repassWord){
            if($_POST['code'] == $_SESSION['img_number']){
                $login=getOne("select * from member where username=?",array($userName));
                if(!$login){
                    insert('member', array(username=>$userName,password=>md5($passWord)));
                    $_SESSION['memberId']=getOne("select * from member where username=? and password=?",array($userName,  md5($passWord)))['id'];
                    header("Location: v/smarty/common_index.php");
                    exit();
                }
            }
        }
        
        header("Location: v/smarty/common_main.php?a=reg&mess=1");
        exit();
    }
    
    //退出
    static function logout(){
        $_SESSION['memberId']=null;
        header("Location: v/smarty/common_main.php?a=login");
        exit();
    }
    
    //检查登录
    static function checkLogin(){
        if(!$_SESSION['memberId']){
        header("Location: v/smarty/common_main.php?a=login&mess=2");
        exit();
        }
    }
    
    
    
    //1.我的装修
    
    //1.1立即预约/装修订单
    static function work_order(){
        self::checkLogin();
        header("Location: v/smarty/common_order.php");
        exit();
    }
    
    //1.2预算清单
    static function work_price(){
        self::checkLogin();
        header("Location: v/smarty/common_project.php?a=price");
        exit();
    }
    
    //1.3修改项目
    static function work_modify(){
        self::checkLogin();
        header("Location: v/smarty/common_project.php?a=modify");
        exit();
    }
    
    //1.4项目团队
    static function work_team(){
        self::checkLogin();
        header("Location: v/smarty/common_project.php?a=team");
        exit();
    }
    
    //1.5效果图
    static function work_resultPic(){
        self::checkLogin();
        header("Location: v/smarty/common_project.php?a=resultPic");
        exit();
    }
    
    //1.6施工图
    static function work_buildPic(){
        self::checkLogin();
        header("Location: v/smarty/common_project.php?a=buildPic");
        exit();
    }
    
    //1.7隐蔽工程图片
    static function work_hidePic(){
        self::checkLogin();
        header("Location: v/smarty/common_project.php?a=hidePic");
        exit();
    }
    
    //1.8装修现场
    static function work_scenePic(){
        self::checkLogin();
        header("Location: v/smarty/common_project.php?a=scenePic");
        exit();
    }
    
    
    
    //2.我的收藏
    
    //2.1案例
    static function collect_case(){
        self::checkLogin();
        header("Location: v/smarty/common_collect.php?a=case");
        exit();
    }
    
    //2.2设计师
    static function collect_designer(){
        self::checkLogin();
        header("Location: v/smarty/common_collect.php?a=designer");
        exit();
    }
    
    
    
    //3.家居商城
    
    //3.1我的购物车
    static function mall_shoppingCar(){
        self::checkLogin(); 
        header("Location: v/smarty/common_mall.php?a=shoppingCar");
        exit();
    }
    
    //确认订单
    static function firmOrder(){
        self::checkLogin();
        $temp="&pdt=".$_GET['pdt'];
        header("Location: v/smarty/common_mall.php?a=firmOrder$temp");
        exit();
    }
    
    //完成付款
    static function pay(){
        self::checkLogin();
        header("Location: v/smarty/common_mall.php?a=pay");
        exit();
    }
    
    //3.2商品订单
    static function mall_order(){
        self::checkLogin();
        header("Location: v/smarty/common_mall.php?a=order");
        exit();
    }
    
    //3.3收货地址
    static function mall_address(){
        self::checkLogin();
        header("Location: v/smarty/common_mall.php?a=address");
        exit();
    }
    
    
    
    //4.个人设置
    
    //4.1我的资料
    static function set_data(){
        self::checkLogin();
        header("Location: v/smarty/common_set.php?a=data");
        exit();
    }
    
    //4.2我的头像
    static function set_head(){
        self::checkLogin();
        header("Location: v/smarty/common_set.php?a=head");
        exit();
    }
    
    //4.3修改密码
    static function set_password(){
        self::checkLogin();
        header("Location: v/smarty/common_set.php?a=password");
        exit();
    }
        
}