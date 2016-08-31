<?php 
header("content-type:text/html;charset=utf-8");
    //echo var_dump($_GET);
    require 'smarty.inc.php';
    global  $_smarty;

    $title="";

    $css="<link rel='Bookmark' href='http://wushang.co/favicon.ico'>
        <link rel='stylesheet'  type='text/css' href='../../public/css/web_style.css'>
        <link rel='stylesheet'  type='text/css' href='../../public/css/style-supermaket-store.css'>";

    $script="";

    $content="没有页面！！！";
    

    $_smarty->assign('title',$title);
    $_smarty->assign('css',$css);
    $_smarty->assign('script',$script);
    
    $_smarty->assign('content',$content);
    $_smarty->assign('header',$header);
    
    $_smarty->display("stencil.tpl");
?>