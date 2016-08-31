<?php 
header("content-type:text/html;charset=utf-8");
    require 'smarty.inc.php';
    global  $_smarty;
    
    //详细信息
    $id=$_GET['id'];
    if (!$id){
        exit();
    }

    //按项目id排序（降序）
    $sql="select pid.projectsId,pid.src,ps.address,ps.size,info.`name` from projects ps,projects_images_design pid,info where ps.id=pid.projectsId and ps.package=info.value1 and ps.`status` in('施工中','施工完成') and pid.`name`='客厅' and pid.designerId=$id  order by ps.id desc";
    $pageSize=8;
    $arr=page($sql, $_GET[page], $pageSize);
    $res=$arr[0];
    $countPage=$arr[1];
    $page=$arr[2];

    if ($res)foreach ($res as $val){
        $al.="<li>
                <img src='../../$val[src]'>
                <p>$val[address]  |  $val[size]㎡</p>
                <p>$val[name]风格</p>
                <a href='../../?c=case&a=showOne&psId=$val[projectsId]'>详细 ></a>
                </li>";
    }

    //分页页码
    $fy="<a href='common_designer_showOne.php?id=$id&page=1' >首页</a>
    <a href='common_designer_showOne.php?id=$id&page=".($page-1)."'>上一页</a>";
    for($i=1;$i<=$countPage;$i++){
        $fy.="<a href='common_designer_showOne.php?id=$id&page=$i'>$i</a>";
    }
    $fy.="<a href='common_designer_showOne.php?id=$id&page=".($page+1)."'>下一页</a>
    <a href='common_designer_showOne.php?id=$id&page=$countPage' >尾页</a>";


    $sjs=getOne("select dg.`name`,dg.icon,dg.likes,dg.pro,dg.years,dg.location,dg.service,dg.style,dg.cost from designer dg where id=$id");

    $title="$sjs[name]";

    $css="<link rel='Bookmark' href='http://wushang.co/favicon.ico'>
            <link rel='stylesheet'  type='text/css' href='../../public/css/web_style.css'>
            <link rel='stylesheet'  type='text/css' href='../../public/css/style-designer-list.css'>";

    $script="<script src='../../public/js/jquery-1.11.3.min.js' type='text/javascript'></script>
            <script src='../../public/js/scrolltop-nav.js' type='text/javascript'></script>
            <script src='../../public/js/click.js' type='text/javascript'></script>";


    $sc = "<a href='javascript:void(0);' class='scjq sjssc'  value='$id' id='sjsscid$id' >收藏</a>";
    $dz = "<a href='javascript:void(0)' class='dzjq sjsdz' value='$id'   id='sjsdzid$id'>$sjs[likes]</a>";
    session_start();
    $memberId=$_SESSION['memberId'];
    if ($memberId) {
        $sjssc = getOne("select dg_Ids,like_dg from member where id=$memberId");
        $ids = $id . ",";
        if (strpos($sjssc[dg_Ids], $ids) !== false) {
            $sc = "<a href='javascript:void(0);' class='scjq sjssc scon' value='$id' id='sjsscid$id' >已收藏</a>";
        }

        if (strpos($sjssc[like_dg], $ids) !== false) {
            $dz = "<a href='javascript:void(0)' class='dzjq sjsdz dzon' value='$id' id='sjsdzid$id' >$sjs[likes]</a>";
        }
    }

    $content="<div id='body' class='web-designer'></div>
           <section id='information'>
            <article class='content'>
            <span class='left'>
            <div>
            <img src='../../$sjs[icon]' class='dsimg'>
            <p class='dsname'>$sjs[name]</p>
            $dz
            <p title=' $sjs[pro]'>职业 : $sjs[pro]</p>
            <p>执业 : $sjs[years]年</p>
            <p>所在地 : $sjs[location]</p>
            <p title=' $sjs[service]'> 服务区域 : $sjs[service]</p>
            <p title='$sjs[style]'>擅长风格 : $sjs[style]</p>
            <p title='$sjs[cost]/㎡'>设计收费标准 : $sjs[cost]/㎡</p>
            $sc
            <a href='javascript:void(0);'>预约</a>
            </div>
            </span>
            <span class='right'><img src='../../public/image/jy-xqbj.jpg'></span>
            
            </article>
            </section>
            
            <!--=========================================case=================================================-->
            
            <section id='case'>
            <article class='content'>
            <ul>
            $al
            </ul>
            </article>
            </section>
            
            <!--=========================================listanniu=================================================-->
            <section class='listanniu' >
            <div style='display:none !important;'>
            <a href='javascript:void(0);' >首页</a>
            <a href='javascript:void(0);'>上一页</a>
            <a href='javascript:void(0);' class='listanniuon'><li>1</li></a>
            <a href='javascript:void(0);'><li>2</li></a>
            <a href='javascript:void(0);'><li>3</li></a>
            <a href='javascript:void(0);'><li>4</li></a>
            <a href='javascript:void(0);'><li>5</li></a>
            <a href='javascript:void(0);'>下一页</a>
            <a href='javascript:void(0);'>尾页</a>
            </div>
            </section>";
    

    $_smarty->assign('title',$title);
    $_smarty->assign('css',$css);
    $_smarty->assign('script',$script);
    
    $_smarty->assign('content',$content);
    $_smarty->assign('header',$header);
    
    $_smarty->display("stencil.tpl");
?>