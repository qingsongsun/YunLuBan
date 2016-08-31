<?php 
header("content-type:text/html;charset=utf-8");
    //echo var_dump($_GET);
    require 'smarty.inc.php';
    global  $_smarty;
    global  $left;
    
    $title=null;
    $content=null;

    $css="<link rel='stylesheet'  type='text/css' href='../../public/css/web_style.css'>
            <link rel='stylesheet'  type='text/css' href='../../public/css/i_style.css'>
            <link rel='stylesheet' href='../../public/css/jquery.cxcalendar.css'>";

    $script="<script src='../../public/js/jquery-1.11.3.min.js' type='text/javascript'></script>
                    <script src='../../public/js/sc-select-play.js' type='text/javascript'></script>
                    <script src='../../public/js/scrolltop-nav.js' type='text/javascript'></script>
                    <script src='../../public/js/i.js' type='text/javascript'></script>
                    <script src='../../public/js/selector.js' type='text/javascript'></script>
                    <script src='../../public/js/method.js' type='text/javascript'></script>
                    <script src='../../public/js/pct.js' type='text/javascript'></script>
                    <script src='../../public/js/cxcalendar/jquery.cxcalendar.js'></script>
                    <script src='../../public/js/cxcalendar/jquery.cxcalendar.languages.js'></script>
                    <script src='../../public/js/cxcalendar/jquery.cxcalendar.js'></script>
                    <script src='../../public/js/click.js' type='text/javascript'></script>
                    <script src='../../public/js/upload.js' type='text/javascript'></script>
        ";
    
    session_start();
    $id=$_SESSION['memberId'];
    $res=getOne("select * from member where id=$id");
    
    if (!empty($_GET['a'])){
        $action=$_GET['a'];
        if ($action=='data'){
            $title="我的资料-会员中心";
            

            $sex="<li><p>性别</p><a href='javascript:void(0)'>男</a><a href='javascript:void(0)' class='i-bgico-on'>女</a></li>";
            if ($res['sex']=='男'){
                $sex="<li><p>性别</p><a href='javascript:void(0)' class='i-bgico-on'>男</a><a href='javascript:void(0)'>女</a></li>";
            }

            $realname="<li><p>真实姓名</p><input type='text' placeholder='请填写您的真实姓名' class='name'></li>";
            if ($res['name']){
                $realname="<li><p>真实姓名</p><input type='text' value='$res[name]' class='name' readonly='readonly'></li>";
            }
            
            $content="<div class='i-web'>
                    $left
                    <div id='body' class='izl' rel='on'></div>
                    <div class='i-right'>
                    <div class='i-bt'>我的资料</div>
                    <div class='i-nr'>  
     <ul class='i-bg'>
	<li><p>用户名</p><i class='phone'>$res[username]</i></li>
	$realname
	$sex
	<li><p>出生日期</p><input type='text' id='date_a' class='date' readonly='readonly' value='1988-1-31'></li>	
</ul>
<a class='i-tj i-zl-a subimt tjzl' href='javascript:void(0)'>修改</a>
</div>
</div>
</div>
                    ";
        }elseif ($action=='head'){
            $title="我的头像-会员中心";
            $content="<div class='i-web'>
                    $left
                    <div id='body' class='itx' ></div>
                    <div class='i-right'>
                    <div class='i-bt'>我的头像</div>
                    <div class='i-touxiang'>
                    <span class='i-tx-left'>当前头像</span>
                    <div class='clearfix file i-tx-right'>
                    
                    <div class='con'>
                    
                    <div class='item'>
                    <div class='thumb i-tx-img'><a target='_blank'><img id='preview'  src='../../$res[icon]' alt=''></a></div>
                    </div>
                    <form action='upload.php' method='post' enctype='multipart/form-data'>
                    <div class='i-tx-ico'>
                    <a href='javascript:void(0)' class='i-tx-xg'>浏览<input id='aaa'  onchange='javascript:setImagePreview();'  type='file' name='icon'></a>
                    <input  class='i-tx-bc' value='保存'  type='submit'>
                    </div>
                   </form>
                  
                    </div>
                   </div>
                    </div>
                    </div></div>";
            
        }
        elseif ($action=='password'){
            $title="修改密码-会员中心";
            $content="<div class='i-web'>
                    $left
                    <div id='body' class='password'></div>
                    <div class='i-right'>
                    <div class='i-bt'>修改密码</div>
                    <div class='i-nr'>
                   <ul class='i-bg'>
	               <li class='password'><p>当前密码</p><input type='password' placeholder=''></li>
	               <li class='newpassword'><p>新密码</p><input type='password' placeholder=''></li>
	               <li class='affirmpassword'><p>确认密码</p><input type='password' placeholder=''></li>
                    </ul>
                    <a href='javascript:void(0)'   class='i-tj i-zl-a resetpwd'>修改</a>
                    </div>
                    </div>
                    </div>";
        }
    }
    

    $_smarty->assign('title',$title);
    $_smarty->assign('css',$css);
    $_smarty->assign('script',$script);
    
    $_smarty->assign('content',$content);
    $_smarty->assign('header',$header);
    
    $_smarty->display("stencil.tpl");
?>
