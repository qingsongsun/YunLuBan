<?php 
header("content-type:text/html;charset=utf-8");
    //echo var_dump($_GET);
    require 'smarty.inc.php';
    global  $_smarty;
    
    //
    $pid=$_GET['pid'];
    if ($pid){
    $live=getOne("select ps.package,ps.city,ps.resident,ps.layout,ps.size,mb.name,mb.icon,pil.* from member mb,projects ps,projects_images_live pil where mb.id=ps.memberId and ps.id=pil.projectsId and pil.projectsId=$pid and pil.sessionName='前期'");
    $layout=getOne("select name from info where infotypeId=2 and value1=$live[layout]");
    if ($live){$bt="<img src='../../$live[icon]'><p>$live[name]先生</p><p>$live[resident] </p><p>|</p><p>$layout[name]</p><p>|</p><p>$live[size]㎡</p><p>|</p><p>开工时间 $live[date]</p>";
    $package=getOne("select name from info where value1=$live[package]");
    
    $zbxq=getAll("select ps.resident,ps.layout,ps.size,mb.name,mb.icon,pil.* from member mb,projects ps,projects_images_live pil where mb.id=ps.memberId and ps.id=pil.projectsId and pil.projectsId='".$pid."'");
    if ($zbxq)foreach ($zbxq as $val){
        $zb.="<li>
        <div class='lm-list-xx'>
        <a href='javascript:void(0)'  class='no' >1</a><p class='notxt'>施工阶段：$val[sessionName]工作</p>
        <p>施工项目：$val[items]</p>
        <p>日期：$val[date]</p>
        <p>施工监理：$val[sup]</p>
        <p>施工人员：$val[workers]</p>
        </div>
        <div class='lm-list-img'>
        <div class='no abc8058' >
        <img src='../../public/image/ico/noico.png'></div><p class='notxt'>现在照片</p>
        <a href='javascript:void(0)' class='liveimg mr25' ><img src='../../$val[src1]'0></a>
        <a href='javascript:void(0)' class='liveimg mr25' ><img src='../../$val[src2]'0></a>
        <a href='javascript:void(0)' class='liveimg' ><img src='../../$val[src3]'0></a>
        </div>
        </li>";
    }
    

    $title="[案例]$live[name]-直播间";

    $css="<link rel='Bookmark' href='http://wushang.co/favicon.ico'>
        <link rel='stylesheet'  type='text/css' href='../../public/css/style-lives.css'>
        <link rel='stylesheet'  type='text/css' href='../../public/css/web_style.css'>";

    $script="<script type='text/javascript' src='../../public/js/jquery.js'></script>
        <script src='../../public/js/jquery-1.11.3.min.js' type='text/javascript'></script>
        <script src='../../public/js/scrolltop-nav.js' type='text/javascript'></script>
        <script type='text/javascript'>
        $(function(){
        	
        	$('.lm-list-img > a').click(function(){
           var a = $(this).find('img').attr('src');
           var b = $('.imgjq').css('height');
           var l = parseInt('-' + $('.imgjq').css('width'))/2+'px';
           var t = parseInt('-' + $('.imgjq').css('height'))/2+'px';
           $('.imgjq').css('display','block');
           $('.imgjq img').attr('src',a);
           $('.imgjq').css('margin-top',t);
           $('.imgjq').css('margin-left',l);
           });
            $('.imgjq a').click(function(){
         	 $('.imgjq').css('display','none');  
        }); 
        });
        	
        </script>";

    $content="<span >
        <div class='lm-div'>
        <ul>
        <li><a href='common_case.php'>案例馆</a></li>
        <li>></li>
        <li><a href='common_case.php?city=$live[city]'>$live[city]地区</a></li>
        <li>></li>
        <li><a href='common_case.php?city=$live[city]&style=整体案例'>整体案例</a></li>
        <li>></li>
        <li><a href='common_case.php?city=$live[city]&style=整体案例&package=$package[name]'>$package[name]风格</a></li>
        </ul>
        </div>
        </span>
        <span>
        <div class='lm-xx'>
        $bt
        </div>
        </span>
        <span >
        
        <div class='lm-list'>
        <div class='imgjq-bg'>
        <div class='imgjq'>
        <img src='../../public/image/0zx03.jpg'><br />
        <a href='javascript:void(0)'>关闭</a>
        </div>
        </div>
        <ul>
        $zb
        </ul>
        </div>
        </span>";
        

    $_smarty->assign('title',$title);
    $_smarty->assign('css',$css);
    $_smarty->assign('script',$script);
    
    $_smarty->assign('content',$content);
    $_smarty->assign('header',$header);
    
    $_smarty->display("stencil.tpl");
    
    }
    
    }else {
        header("Location: common_index.php");
        exit();
    }
?>



