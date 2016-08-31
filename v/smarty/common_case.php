<?php 
header("content-type:text/html;charset=utf-8");
    //echo var_dump($_GET);
    require 'smarty.inc.php';
    global  $_smarty;

    $title="案例馆-云鲁班，装修由我";

    $css="<link rel='Bookmark' href='http://wushang.co/favicon.ico'>
            <link rel='stylesheet'  type='text/css' href='../../public/css/web_style.css'>
            <link rel='stylesheet'  type='text/css' href='../../public/css/style-case.css'>";

    $script="<script src='../../public/js/jquery-1.11.3.min.js' type='text/javascript'></script>
                <script src='../../public/js/index.js' type='text/javascript'></script>
                <script src='../../public/js/scrolltop-nav.js' type='text/javascript'></script>
                <script src='../../public/js/click.js' type='text/javascript'></script>
                <script type='text/javascript'>
                    
                    function caseon(Obj){
                    	var a = Obj.getElementsByTagName('a')[1];
                    	var b = Obj.getElementsByTagName('a')[2];
                    	var c = Obj.getElementsByTagName('a')[3];
                    	    a.style.display ='block'
                    		b.style.display ='block'
                    		c.style.display ='block'
                    	};
                
                    function caseout(Obj){
                    	var a = Obj.getElementsByTagName('a')[1];
                    	var b = Obj.getElementsByTagName('a')[2];
                    	var c = Obj.getElementsByTagName('a')[3];
                    	    a.style.display ='none'
                    		b.style.display ='none'
                    		c.style.display ='none'
                    	};
                    	
                    function xgtt2(a){
                    	var a =  a + 'px';
                    $('#case_preview .content div ul').animate({'margin-left':a},300)
                    };
                </script>";
    
    
    $city=$_GET['city'];
    if (!$city)$city='不限';
    
    $style=$_GET['style'];
    if (!$style)$style='不限';
    
    $package=$_GET['package'];
    if (!$package)$package='不限';
    
    //选择城市
    $cs=getAll("select city from projects where status in('施工中','施工完成') group by city limit 5");
    $xx1="<li><a href='common_case.php?city=不限&style=$style&package=$package' style=' color:#e2e2e2'>不限</a></li>";
    if ($cs)foreach ($cs as $val1){
        $xx1.="<li><a href='common_case.php?city=$val1[city]&style=$style&package=$package'>$val1[city]</a></li>";
    }
    
    //选择风格
    $fg=getAll("select info.`name` from projects ps,info where ps.package=info.value1 and ps.status in('施工中','施工完成') group by info.`name` limit 5");
    $xx2="<li><a href='common_case.php?city=$city&style=$style&package=不限' style=' color:#e2e2e2'>不限</a></li>";
    if ($fg)foreach ($fg as $val2){
        $xx2.="<li><a href='common_case.php?city=$city&style=$style&package=$val2[name]'>$val2[name]</a></li>";
    }
    
    //内容展示
    if ($city=='不限')$ci=1;else $ci="ps.city='$city'";
    
    if ($style=='整体案例'||$style=='不限')$st=1;else $st="pid.`name`='$style'";
    
    if ($package=='不限'){
        $type=1;
    }else {
        $pa=getOne("select ps.package from projects ps,info where ps.package=info.value1 and info.`name`='$package'");
        $type="ps.package='$pa[package]'";
    }

    $sql="select ps.id,pid.id as pidId,pid.src,pid.likes from projects ps,projects_images_design pid where ps.id=pid.projectsId and $ci and $st and $type group by pid.id";
    $pageSize=20;
    $arr=page($sql,$_GET[page],$pageSize);
    $res=$arr[0];
    $countPage=$arr[1];
    $page=$arr[2];

        session_start();
        $memberId=$_SESSION['memberId'];
    if ($res)foreach ($res as $val){
        
        $al=getOne("select Pid_Ids,like_pid from member where id='$memberId'");
        $ids=$val[pidId].",";
        if (strpos($al[Pid_Ids],$ids) !==false){
            $sc="<a href='javascript:void(0);' class='scjq alsc scon' value='$val[pidId]'  id='alscid$val[pidId]'>已收藏</a>";
        }else{
            $sc="<a href='javascript:void(0);' class='scjq alsc' value='$val[pidId]' id='alscid$val[pidId]'>收藏</a>";
        }
        
        if (strpos($al[like_pid],$ids) !==false){
            $dz="<a href='javascript:void(0);' class='dzjq aldz dzon' value='$val[pidId]' id='aldzid$val[pidId]'>$val[likes]</a>";
        }else{
            $dz="<a href='javascript:void(0);' class='dzjq aldz' value='$val[pidId]' id='aldzid$val[pidId]' >$val[likes]</a>";
        }
        
        $alzs.="<li  onMouseOver='caseon(this)' onMouseOut='caseout(this)' >
                <a href='common_case_showOne.php?id=$val[id]'><img src='../../$val[src]'></a>
                $sc
                $dz
                <a href='javascript:void(0);'>免费设计</a>
                </li>";
    }

    $fy="<a href='common_case.php?city=$city&style=$style&package=$package&page=1' >首页</a>
         <a href='common_case.php?city=$city&style=$style&package=$package&page=".($page-1)."'>上一页</a>";
    for($i=1;$i<=$countPage;$i++){
        $fy.="<a href='common_case.php?city=$city&style=$style&package=$package&page=$i'>$i</a>";
    }
    $fy.="<a href='common_case.php?city=$city&style=$style&package=$package&page=".($page+1)."'>下一页</a>
         <a href='common_case.php?city=$city&style=$style&package=$package&page=$countPage' >尾页</a>";


    $content="
                <div class='select-jq' style='display: none'>
                <i class='select-jq-01'>$city</i>
                <i class='select-jq-02'>$style</i>
                <i class='select-jq-03'>$package</i>
                </div>
    
                <div id='body' class='web-case'></div>
                <section id='advert'>
                <article class='content'><img src='../../public/image/lbrz.jpg'/></article>
                </section>
                
                <!--=========================================select_bar=================================================-->
                <section class='select_bar'>
                <article class='content'>
                <span>
                <div>选择城市</div>
                <div class='select_list'>
                <ul class='selectbarplay1'>
                $xx1
                </ul>
                </div>
                </span>
                <span>
                <div>选择户型</div>
                <div class='select_list'>
                <ul class='selectbarplay2' >
                <li><a href='common_case.php?city=$city&style=不限&package=$package' style=' color:#e2e2e2'>不限</a></li>
                <li><a href='common_case.php?city=$city&style=整体案例&package=$package'>整体案例</a></li>
                <li><a href='common_case.php?city=$city&style=客厅&package=$package'>客厅</a></li>
                <li><a href='common_case.php?city=$city&style=餐厅&package=$package'>餐厅</a></li>
                <li><a href='common_case.php?city=$city&style=厨房&package=$package'>厨房</a></li>
                <li><a href='common_case.php?city=$city&style=卧室&package=$package'>卧室</a></li>
                <li><a href='common_case.php?city=$city&style=卫生间&package=$package'>卫生间</a></li>
                <li><a href='common_case.php?city=$city&style=阳台&package=$package'>阳台</a></li>
                </ul>
                </div>
                </span>
                <span>
                <div>选择风格</div>
                <div class='select_list' >
                <ul class='selectbarplay3'>
                $xx2
                </ul>
                </div>
                </span>
                </article>
                
                </section>
                
                <!--=========================================listanniu=================================================-->
                <section id='case'>
                <article class='content'>
                <ul>
                <!--案例图-->
                $alzs
                </ul>
                </article>
                </section>
                
                
                <!--=========================================listanniu=================================================-->
                <section class='listanniu'>
                <div>
                $fy
                </div>
                </section>";
    

    $_smarty->assign('title',$title);
    $_smarty->assign('css',$css);
    $_smarty->assign('script',$script);
    
    $_smarty->assign('content',$content);
    $_smarty->assign('header',$header);
    
    $_smarty->display("stencil.tpl");
?>