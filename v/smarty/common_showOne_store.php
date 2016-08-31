<?php 
header("content-type:text/html;charset=utf-8");
    //echo var_dump($_GET);
    require 'smarty.inc.php';
    global  $_smarty;

    $title="体验馆";

    $css="<link rel='Bookmark' href='http://wushang.co/favicon.ico'>
        <link rel='stylesheet'  type='text/css' href='../../public/css/web_style.css'>
        <link rel='stylesheet'  type='text/css' href='../../public/css/style-supermaket-store.css'>";

    $script="
        <script src='../../public/js/jquery-1.11.3.min.js' type='text/javascript'></script>
        <script src='../../public/js/scrolltop-nav.js' type='text/javascript'></script>
        <script src='http://api.map.baidu.com/api?key=&v=1.1&services=true' type='text/javascript'></script> 
        <script type='text/javascript'>
         $(function(){
        $('#dtjq').click(function(){
         	$('.store_img').remove()
        });
         });
      </script>
      ";

    $id=$_GET['id'];
    if ($id){
        $res=getOne("select * from store where id=$id");
    $content="<div id='store'>
        <p class='title' >云鲁班线下体验馆</p>
        <p class='title2' >$res[title]</p>
        <div class='center'>
        <span>
        <P>$res[city] - $res[name]</P>
        <P>$res[text]</P>
        <p>地址：$res[address]</p>
        <p>服务电话：$res[mebile]</p>
        <p>营业时间：$res[time]</p>
        <a href='javascript:void(0)' id='dtjq'>查看地图 ></a>
        </span>
        <div class='store_right'>
        <div style='width:715px;height:448px;border:#ccc solid 1px;' id='dituContent' class='store_dt'></div>
        <img src='../../$res[pic]'  class='store_img'>
        </div>   
        </div>
        </div>
    <script src='../../public/js/map.js' type='text/javascript'></script>";
    }
    

    $_smarty->assign('title',$title);
    $_smarty->assign('css',$css);
    $_smarty->assign('script',$script);
    
    $_smarty->assign('content',$content);
    $_smarty->assign('header',$header);
    
    $_smarty->display("stencil.tpl");
?>