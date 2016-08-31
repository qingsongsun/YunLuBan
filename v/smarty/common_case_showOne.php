<?php 
header("content-type:text/html;charset=utf-8");
    //echo var_dump($_GET);
    require 'smarty.inc.php';
    global  $_smarty;

    $title="案例馆-云鲁班，装修由我";

    $css="<link rel='Bookmark' href='http://wushang.co/favicon.ico'>
            <link rel='stylesheet'  type='text/css' href='../../public/css/web_style.css'>
            <link rel='stylesheet'  type='text/css' href='../../public/css/style-case-list.css'>";

    $script="<script src='../../public/js/jquery-1.11.3.min.js' type='text/javascript'></script>
                <script src='../../public/js/scrolltop-nav.js' type='text/javascript'></script>
                 <script src='../../public/js/case-list.js' type='text/javascript'></script>
               ";
    
    
    $id=$_GET['id'];
    if (!id)exit();
    
    $style=$_GET['style'];
    if (!$style)$style='整体案例';  
    
    $sql="select ps.id as psId,ps.city,ps.layout,ps.package,ps.memberId,ps.size,(ps.deposit/10000) as cost,ps.text,dg.icon,dg.id,dg.`name` from projects ps,projects_images_design pid,designer dg where ps.id=pid.projectsId and pid.designerId=dg.id and ps.id=$id group by ps.id";
    $res=getOne($sql);
    
    //$hx=getOne("select name from info where value1=$res[layout] and infotypeId=2");       //户型
    $fg=getOne("select name from info where value1=$res[package] and infotypeId=4");    //风格
    $yh=getOne("select name from member where id=$res[memberId]");                             //用户
    
    //图片
    $xgt=getAll("select pid.`name`,pid.src from projects_images_design pid where pid.projectsId=$res[psId]");
    if($xgt)foreach ($xgt as $val){
        $name.="<li><a href='javascript:void(0);' >$val[name]</a></li>";
        $tp.="<li><img src='../../$val[src]' ></li>";
    }
   
    
    $content="<!--=========================================Route&designer=================================================-->
                <div id='body' class='web-case'></div>
                <div id='route_designer'>
                <div class='content'>
                <span class='left'>
                <ul>
                <li><a href='common_case.php'>案例馆</a></li>
                <li>></li>
                <li><a href='common_case.php?city=$res[city]'>$res[city]地区</a></li>
                <li>></li>
                <li><a href='common_case.php?city=$res[city]&style=$style'>$style</a></li>
                <li>></li>
                <li><a href='common_case.php?city=$res[city]&style=$style&package=$fg[name]'>$fg[name]风格</a></li>
                </ul></span>
                <span class='right'>
                <img src='../../$res[icon]'/>
                <p>$res[name]</p>
                <a href='../../?c=designer&a=showOne&id=$res[id]'>查看设计师</a>
                </span>
                </div>
                </div>
                
                <!--=========================================case_preview=================================================-->
                
                <div id='preview'>
                <p class='title'>$fg[name]风格理念</p>
                <p class='title2' style='padding-bottom:5px !important;'>$res[city] $yh[name]  |  户型面积 : $res[size]平方米  |  装修风格 : $fg[name]  |  总费用 : ".round($res[cost],2)."万</p>
                <p class='title3'>$res[text]
                </p>
                <br>
                <div class='content'>
                <div>
                <ul class='preview-ul'>
                <li><img src='../../image/lb/xgttno.jpg' ></li>
                $tp
                <li><img src='../../image/lb/xgttno.jpg' ></li>
                </ul>
                </div>
                <span class='pm left1'></span>
                <span class='pm right1'></span>
                </div>
                <div class='scontent'>
                <ul class='preview-txt'>
                $name
                </ul>
                </div>
                </div>
               ";
    
    
    $_smarty->assign('title',$title);
    $_smarty->assign('css',$css);
    $_smarty->assign('script',$script);
    
    $_smarty->assign('content',$content);
    $_smarty->assign('header',$header);
    
    $_smarty->display("stencil.tpl");
    
    unset($_smarty);
?>


