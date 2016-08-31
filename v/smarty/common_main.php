<?php 
header("content-type:text/html;charset=utf-8");
    //echo var_dump($_GET);
    require 'smarty.inc.php';
    global  $_smarty;
    
    error_reporting(E_ALL ^ E_NOTICE);
    $mess="";
    if(!empty($_GET['mess'])&$_GET['mess']==1){
        $mess='操作失败';
    }elseif (!empty($_GET['mess'])&$_GET['mess']==2){
        $mess='请先登录';
    }
            
    $css="<link rel='stylesheet'  type='text/css' href='../../public/css/style.css'>
            <link rel='stylesheet'  type='text/css' href='../../public/css/web_style.css'>";
    
    $script="<script type='text/javascript' src='../../public/js/jquery.js'></script>
            <script src='../../public/js/jquery-1.11.3.min.js' type='text/javascript'></script>
            <script src='../../public/js/scrolltop-nav.js' type='text/javascript'></script>
        
            <script type='text/javascript'>
            
                $(function(){
                    $('#cityjqon').click(function(){
                	$('#cityjq').slideToggle('slow');
                });
                
                $('#refresh').click(function(){
                    var a = '../../public/proving/image.php';
                    $(this).attr('src',a);
                });
                });
        
            </script>";
    
    
    $title=null;
    $content=null;
    if (!empty($_GET['a'])){
        $action=$_GET['a'];
        if ($action=="login"){
            $title="登录";
            $content="<section id='loginhtml'>
                      <article><a href='../../?a=login' style='color:#abc808;'>登录</a><a href='../../?a=reg'>注册</a></article>
                      <article></article>
                      <form action='../../?c=admin&a=doLogin' method='post'>
                      <ul>
                      <li><p>手机号码</p><input type='text' name='username'></li>
                      <li><p>密码</p><input type='password' name='password'></li>
                      <li><p>验证码</p><input type='text' name='code'>
                      <img  src='../../public/proving/image.php' id = 'refresh' class='yzmcss' />
                      </li>
                      <li><input type='submit' value='立即登录'></li>$mess
                    </form>
                      <li><a href='../../?a=findpass'>忘记密码</a></li>
                      </ul>
                  </section>";
        }elseif ($action=="reg"){
            $title="注册";
            $content="<section id='regiser'>
                    <article><a href='../../?a=login'>登录</a><a href='../../?a=reg' style='color:#abc808;'>注册</a></article>
                    <article></article>
                    <form action='../../?c=admin&a=doReg' method='post'>
                    <ul>
                    <li><p>手机号码</p><input type='text' name='username'></li>
                    <li><p>密码</p><input type='password' name='password'></li>
                    <li><p>确认密码</p><input type='password' name='repassword'></li>
                    <li><p>验证码</p><input type='text' name='code'>
                    <img  src='../../public/proving/image.php' id = 'refresh' class='yzmcss' />
                    </li>
                    <li><p>手机验证</p><input type='text' name='tel'><a href='javascript:void(0)'>接受验证信息</a></li>
                    <li><input type='submit' value='注册'></li>$mess
                    </form>
                    </ul>
                  </section>";
        }elseif ($action=="findpass"){
            $title="找回密码";
            $content="<section id='loginhtml'>
                    <article><a href='javascript:void(0)'>找回密码</a></article>
                    <article></article>
                    <ul class='findpass'>
                    <li><p>手机号码</p><input type='tel'></li>
                    <li><p>验证码</p><input type='text'><a href='javascript:void(0)'>接受验证信息</a></li>
                    <li><input type='submit' value='确认'></li>
                    </ul>
                  </section>";
        }
    }
    
    
    $_smarty->assign('title',$title);
    $_smarty->assign('css',$css);
    $_smarty->assign('script',$script);
    
    $_smarty->assign('content',$content);
    $_smarty->assign('header',$header);
    
    $_smarty->display("stencil.tpl");
?>