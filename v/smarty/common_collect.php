<?php 
header("content-type:text/html;charset=utf-8");
    //echo var_dump($_GET);
    require 'smarty.inc.php';
    global  $_smarty;
    global  $left;
    
    session_start();
    $id=$_SESSION['memberId'];
    $sc=getOne("select dg_Ids,Pid_Ids from member where id='$id'");
    
    
    $title=null;
    $content=null;

    $css="<link rel='stylesheet'  type='text/css' href='../../public/css/web_style.css'>
            <link rel='stylesheet'  type='text/css' href='../../public/css/i_style.css'>";

    $script="<script src='../../public/js/jquery-1.11.3.min.js' type='text/javascript'></script>
            <script src='../../public/js/sc-select-play.js' type='text/javascript'></script>
            <script src='../../public/js/scrolltop-nav.js' type='text/javascript'></script>
            <script src='../../public/js/i.js' type='text/javascript'></script>
            <script src='../../public/js/click.js' type='text/javascript'></script>
            <script type='text/javascript'>
            $(function(){
            
            $('#cityjqon').click(function(){
            	$('#cityjq').slideToggle('slow');
            });
            
            });
            
            </script>";
    
    if (!empty($_GET['a'])){
        $action=$_GET['a'];
        if ($action=='case'){
            $title="案例收藏-会员中心";
            
            //展示已收藏案例
            $Pid_Ids=substr($sc['Pid_Ids'], 0, -1);
//             if($Pid_Ids)$xmid=getAll("select projectsId from projects_images_design pid where id in($Pid_Ids) group by projectsId;");
            $xmid=explode(",",$Pid_Ids);      // 分割字符串
             if ($xmid)foreach ($xmid as $val){
                
                $res=getOne("select ps.id,pid.src,pid.name as pname,ps.city,mb.name,ps.size,info.name as fg from projects ps,projects_images_design pid,member mb,info where pid.projectsId=ps.id and pid.id='$val' and ps.memberId=mb.id and info.value1=ps.package");
                if ($res){
                    $scal.="<li>
                        			<span class='i-scli-img'><img src='../../$res[src]'><a href='javascript:void(0)' class='scal' value='$val'>删除</a></span>
                        			<i>$res[city]|$res[name]先生</i>
                        			<p>展示部分:$res[pname]</p>
                        			<p>户型面积:$res[size]㎡</p>
                        			<p>装修风格:$res[fg]</p>
                        			<span class='i-scli-an'><a href='../../?c=case&a=showOne&psId=$res[id]'>查看案例</a></span>
                        		 </li>";
                }
             }
            
            $content="<div class='i-web'>
                    $left
                    <div class='i-right'>
                    <div class='i-bt'>案例收藏</div>
                    <div class='i-nr i-sc '><a href='javascript:void(0)' class='i-xgtxz-aon'>全部案例</a></div>
                    <div class='i-nr i-scli'>
                    	<ul>
                             $scal
                    	</ul>
                    </div>
                    
                    </div>
                    </div>
                    <div class='imgjq'>
                    <img src='../../public/image/0zx03.jpg'><br />
                    <a href='javascript:void(0)'>关闭</a>
                    </div>";
        }elseif ($action=='designer'){
            $title="设计师收藏-会员中心";
            
            //展示已收藏设计师
            $dg_Ids=$sc[dg_Ids];
            $sjs=explode(",",$dg_Ids);
            if ($sjs)foreach ($sjs as $val){
                $res=getOne("select icon,name,years,style,likes from designer where id='$val'");
                if ($res){
                    $scsjs.="<li>
                        		<span class='i-scli-img'><img src='../../$res[icon]'><a href='javascript:void(0)' class='scsjs' value='$val'>删除</a></span>
                        			<i>$res[name]</i>
                        			<p>执业:$res[years]年</p>
                        			<p>擅长风格:$res[style]</p>
                        			<span class='i-scli-an'><a href='../../?c=designer&a=showOne&id=$val'>详细</a><img src='../../public/image/dianzan.png'><p>$res[likes]</p></span>
                        		 </li>";
                }
            }
            
            $content="<div class='i-web'>
                    $left
                    <div class='i-right'>
                    <div class='i-bt'>设计师收藏</div>
                    <div class='i-nr i-sc '><a href='javascript:void(0)' class='i-xgtxz-aon'>全部设计师</a></div>
                    <div class='i-nr i-scli'>
                    	<ul>
                            $scsjs
                    	</ul>
                    </div>
                    
                    </div>
                    </div>
                    <div class='imgjq'>
                    <img src='../../public/image/0zx03.jpg'><br />
                    <a href='javascript:void(0)'>关闭</a>
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
