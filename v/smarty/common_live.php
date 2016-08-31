<?php 
header("content-type:text/html;charset=utf-8");
    //echo var_dump($_GET);
    require 'smarty.inc.php';
//     require 'tool/page.php';
    global  $_smarty;

    $title="直播间";

    $css="<link rel='Bookmark' href='http://wushang.co/favicon.ico'>
            <link rel='stylesheet'  type='text/css' href='../../public/css/style-lives.css'>
            <link rel='stylesheet'  type='text/css' href='../../public/css/web_style.css'>";

    $script="<script type='text/javascript' src='../../public/js/jquery.js'></script>
            <script type='text/javascript' src='../../public/js/lrtk.js'></script>
            <script src='../../public/js/jquery-1.11.3.min.js' type='text/javascript'></script>
            <script src='../../public/js/scrolltop-nav.js' type='text/javascript'></script>
            <script type='text/javascript'>
            $(function(){
            		$('#cityjqon').click(function(){
            	$('#cityjq').slideToggle('slow');
            });
            
            	$('.select_list ul > li').click(function(){
                    $(this).addClass('txtcolor').siblings().removeClass('txtcolor');
            });
                $('.scontent ul').each(function(){
                	var a = $(this).height();
                	var b = parseInt(a)+80;
                	$('#lives .scontent').css('height',b);
                });
               
            });
            </script>";
    
    //直播展示
    $city=$_GET[city];
    if (!$city)$city='不限';
    
    $layout=$_GET[layout];
    if (!$layout)$layout='不限';
    
    $package=$_GET[package];
    if (!$package)$package='不限';
    
    //城市选项 全展示
    $xx1="<li><a href='common_live.php?common_live.php?city=不限&layout=$layout&package=$package' style=' color:#e2e2e2'>不限</a></li>";
    
    $cs=getAll("select city from projects where status in('施工中','施工完成') group by city");
    if ($cs)foreach ($cs as $val){
        $xx1.="<li><a href='common_live.php?city=$val[city]&layout=$layout&package=$package'>$val[city]</a></li>";
    }
    
    //户型选项 初始全展示 以城市选项作条件查询
    $xx2="<li><a href='common_live.php?city=$city&layout=不限&package=$package' style=' color:#e2e2e2'>不限</a></li>";
    
    if ($city=='不限'){
        $hx=getAll("select layout from projects where status in('施工中','施工完成') group by layout");
        if ($hx)foreach ($hx as $val){
            $hx=getOne("select * from info where value1=$val[layout] and infotypeId=2");
            $xx2.="<li><a href='common_live.php?city=$city&layout=$hx[value1]&package=$package'>$hx[name]</a></li>";
        }
    }else {
        $hx=getAll("select layout from projects where city='".$city."' and status in('施工中','施工完成') group by layout");
         if ($hx)foreach ($hx as $val){
             $hx=getOne("select * from info where value1=$val[layout] and infotypeId=2");
             $xx2.="<li><a href='common_live.php?city=$city&layout=$hx[value1]&package=$package'>$hx[name]</a></li>";
        }
     }
     
     //风格选项  全展示
     $xx3="<li><a href='common_live.php?city=$city&layout=$layout&package=不限' style=' color:#e2e2e2'>不限</a></li>";
     $fg=getAll("select * from info where infotypeId=4 limit 1,10");
     if ($fg)foreach ($fg as $val){
         $xx3.="<li><a href='common_live.php?city=$city&layout=$layout&package=$val[value1]'>$val[name]</a></li>";
     }
         
     
         if ($city!='不限'){
             $ci="ps.city='$city'";
         }else {
             $ci=1;
         }
         
         if ($layout!='不限'){
             $la="ps.layout='$layout'";
         }else {
             $la=1;
         }
         
         if ($package!='不限'){
             $pa="ps.package=$package";
         }else {
             $pa=1;
         }
         
         
         //分页
         $sql="select mb.name,ps.*,pid.src from member mb,projects ps,projects_images_design pid where ps.id=pid.projectsId and mb.id=ps.memberId and ps.status in('施工中','施工完成') and pid.name='客厅' and $ci and $la and $pa order by ps.id desc";
         $pageSize=12;
         $arr=page($sql, $_GET[page], $pageSize);
         $direct=$arr[0];
         $countPage=$arr[1];
         $page=$arr[2];
         
         //分页页码
         $fy="<a href='common_live.php?city=$city&layout=$layout&package=$package&page=1' >首页</a>
         <a href='common_live.php?city=$city&layout=$layout&package=$package&page=".($page-1)."'>上一页</a>";
         for($i=1;$i<=$countPage;$i++){
             $fy.="<a href='common_live.php?city=$city&layout=$layout&package=$package&page=$i'>$i</a>";
         }
         $fy.="<a href='common_live.php?city=$city&layout=$layout&package=$package&page=".($page+1)."'>下一页</a>
         <a href='common_live.php?city=$city&layout=$layout&package=$package&page=$countPage' >尾页</a>";
         
         
         //内容展示
         if ($direct)foreach ($direct as $val){
             $zbzs.="<li>
             <img src='../../$val[src] ' style= 'width:345px ; height:300px ; '>
             <span><p>$val[name]</p><p>$val[resident] | ".getOne("select name from info where infotypeId=2 and value1=$val[layout]")[name]." | $val[size]㎡</p></span><span><a href='../../?c=live&a=live&pid=$val[id]'>$val[status]</a></span>
             </li>";
         }
  
         
    $content="<div id='lives' >
            <p class='title' style='color:rgb(255,255,255) !important;'>直播间</p>
            <p class='title2' style='color:rgb(255,255,255) !important;' >毫无保留的工程现场直击，让你时刻心里有底，装修专家就是你！</p>
            <!--=========================================select_bar=================================================-->
            <div class='select_bar'>
            <div  class='bcontent'>
            <span>
            <div>所在城市</div>
            <div class='select_list' id='s1'>
            <ul id='select_ul1'>
            $xx1
            </ul>
            </div>
            </span>
            <span>
            <div>户型</div>
            <div class='select_list' id='s2'>
            <ul id='select_ul2'>
            $xx2
            </ul>
            </div>
            </span>
            <span>
            <div>风格</div>
            <div class='select_list' id='s3'>
            <ul id='select_ul3'>
            $xx3
            </ul>
            </div>
            </span>
            </div>
            </div>
            <div class='scontent' >
            <ul>
            $zbzs
            </ul>
            </div>
            </div>
            </div>
               <!--=========================================listanniu=================================================-->
            <div class='listanniu'  style=' background-color: #ffffff;'>
            <div>
            $fy
            </div>
            </div> 
    ";
    

    $_smarty->assign('title',$title);
    $_smarty->assign('css',$css);
    $_smarty->assign('script',$script);
    
    $_smarty->assign('content',$content);
    $_smarty->assign('header',$header);
    
    $_smarty->display("stencil.tpl");
?>