<?php 
header("content-type:text/html;charset=utf-8");
    //echo var_dump($_GET);
    require 'smarty.inc.php';
//     require 'tool/page.php';
    global  $_smarty;

    $title="精英设计师-云鲁班，装修由我";

    $css="<link rel='Bookmark' href='http://wushang.co/favicon.ico'>
<link rel='stylesheet'  type='text/css' href='../../public/css/web_style.css'>
<link rel='stylesheet'  type='text/css' href='../../public/css/style-designer.css'>";

    $script="<script src='../../public/js/jquery-1.11.3.min.js' type='text/javascript'></script>
            <script src='../../public/js/scrolltop-nav.js' type='text/javascript'></script>
            <script type='text/javascript'>
            $(function(){
            		$('#cityjqon').click(function(){
            	$('#cityjq').slideToggle('slow');
            });
            
            	$('.select_list ul > li').click(function(){
                    $(this).addClass('txtcolor').siblings().removeClass('txtcolor');
            });
            });
            </script>";

    
    
    //设计师导航
    $city=$_GET['city'];
    if (!$city)$city='不限';
    
    $style=$_GET['style'];
    if (!$style)$style='不限';
    
    $extra=$_GET['extra'];
    if (!$extra)$extra='不限';
    

    //城市选项
    $xx1="<li><a href='common_designer.php?city=不限&style=$style&extra=$extra' style=' color:#e2e2e2'>不限</a></li>";
    $cs=getAll("select location from designer group by location limit 5");
    if ($cs)foreach ($cs as $val){
        $xx1.="<li><a href='common_designer.php?city=$val[location]&style=$style&extra=$extra'>$val[location]</a></li>";
    }
    

    //风格选项
    function a_array_unique($array){                                                                  //去除数组重复数据
        $out = array();
        foreach ($array as $key=>$value) {
            if (!in_array($value, $out)){
                $out[$key] = $value;
            }
        }
        return $out;
    }
    
    $xx2="<li><a href='common_designer.php?city=$city&style=不限&extra=$extra' style=' color:#e2e2e2'>不限</a></li>";
    $fg=getAll("select style from designer group by style");
    $arr=array();
    if ($fg)foreach ($fg as $val){
        if(strstr($val[style],'、')){                                                           //判断风格是否包含'、'字符
            $arr=array_merge($arr,explode('、',$val[style]));                                   //打散字符串为数组，合并
        }else {
            $arr=array_merge($arr,array($val[style]));
        }
    }
    //风格显示    
    $arr=array_slice(a_array_unique($arr),0,5);                                                   //去除数组重复元素截取五个元素
    foreach ($arr as $val){
        $xx2.=" <li><a href='common_designer.php?city=$city&style=$val&extra=$extra'>$val</a></li>";
    }

    
    
    //资料分页展示
    if ($city!='不限'){
        $ci="location='$city'";
    }else {
        $ci=1;
    }
    
    if ($style!='不限'){
        $st="style like '%$style%'";
    }else {
        $st=1;
    }
    
    $term=" and 1";
    $zhxx="不限";
    if ($extra==1){
        $term="order by likes desc";
        $zhxx="人气";
    }elseif ($extra==2){
        $term="order by years desc";
        $zhxx="资质";
    }elseif ($extra==3){
        $term="order by cost asc";
        $zhxx="价格由低到高";
    }elseif ($extra==4){
        $term="order by cost desc";
        $zhxx="价格由高到低";
    }elseif ($extra==5){    
        $term="and pro='院校学生'";
        $zhxx="院校学生";
    }
    
    $sql="select * from designer where $ci and $st $term";
    $pageSize=6;
    $arr=page($sql, $_GET[page], $pageSize);
    $res=$arr[0];
    $countPage=$arr[1];
    $page=$arr[2];
    
    if ($res)foreach ($res as $val1){
        $al="";
        $case=getAll("select projectsId,src from projects_images_design pid,projects ps where pid.projectsId=ps.id and pid.name='客厅' and pid.designerId=$val1[id] and ps.status in('施工中','施工完成') order by likes desc limit 3");
        if ($case)foreach ($case as $val2){
            $al.="<a href='../../?c=case&a=showOne&psId=$val2[projectsId]'><img src='../../$val2[src]'></a>";
        }
        $sjs.="<li>
            <span class='left'>
            <img src='../../$val1[icon]'>
            <p>$val1[name]</p>
            <img src='../../public/image/ico/dianzan02.png'>
            <p>$val1[likes]</p>
            <p>职业身份 : $val1[pro]</p>
            <p>执业 : $val1[years]年</p>
            <p>擅长风格 : $val1[style]</p>
            <a href='../../?c=designer&a=showOne&id=$val1[id]'>详细</a></span>
            <span class='right'>
            $al
            </span>
            </li>";
    }
    
    //分页
    $fy="<a href='common_designer.php?city=$city&style=$style&extra=$extra&page=1' >首页</a>
            <a href='common_designer.php?city=$city&style=$style&extra=$extra&page=".($page-1)."'>上一页</a>";
    for($i=1;$i<=$countPage;$i++){
        $fy.="<a href='common_designer.php?city=$city&style=$style&extra=$extra&page=$i'>$i</a>";
    }
    $fy.="<a href='common_designer.php?city=$city&style=$style&extra=$extra&page=".($page+1)."'>下一页</a>
            <a href='common_designer.php?city=$city&style=$style&extra=$extra&page=$countPage' >尾页</a>";
    
    
    $content="
                <div class='select-jq' style='display: none'>
                <i class='select-jq-01'>$city</i>
                <i class='select-jq-02'>$style</i>
                <i class='select-jq-03'>$zhxx</i>
                </div>
        
                <div id='body' class='web-designer'></div>
                <div id='advert'>
                <div class='content'><img src='../../public/image/lbrz.jpg'/></div>
                </div>
                
                <!--=========================================select_bar=================================================-->
                <div class='select_bar'>
                <div class='content'>
                
                <span>
                <div>所在城市</div>
                <div class='select_list' '>
                <ul class='selectbarplay1'>
                $xx1
                </ul>
                </div>
                </span>
                
                <span>
                <div>擅长风格</div>
                <div class='select_list' '>
                <ul class='selectbarplay2'>
               $xx2
                </ul>
                </div>
                </span>
                
                <span>
                <div>综合排序</div>
                <div class='select_list' >
                <ul class='selectbarplay3'>
                <li><a href='common_designer.php?city=$city&style=$style&extra=不限'  style=' color:#e2e2e2'>不限</a></li>
                <li><a href='common_designer.php?city=$city&style=$style&extra=1'>人气</a></li>
                <li><a href='common_designer.php?city=$city&style=$style&extra=2'>资质</a></li>
                <li><a href='common_designer.php?city=$city&style=$style&extra=3'>价格由低到高</a></li>
                <li><a href='common_designer.php?city=$city&style=$style&extra=4'>价格由高到低</a></li>
                <li><a href='common_designer.php?city=$city&style=$style&extra=5'>院校学生</a></li>
                </ul>
                </div>
                </span>
                
                </div>
                </div>
                
                <!--=========================================footer=================================================-->
                <div id='tabulation'>
                <ul>
                $sjs
                </ul>
                </div>
                <!--=========================================listanniu=================================================-->
                <div class='listanniu'  style=' background-color: #ffffff;'>
                <div>
                $fy
                </div>
                </div>";
    

    $_smarty->assign('title',$title);
    $_smarty->assign('css',$css);
    $_smarty->assign('script',$script);
    
    $_smarty->assign('content',$content);
    $_smarty->assign('header',$header);
    
    $_smarty->display("stencil.tpl");
?>