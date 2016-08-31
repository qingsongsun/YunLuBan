<?php
header("content-type:text/html;charset=utf-8");
// echo var_dump($_GET);
require 'smarty.inc.php';
global $_smarty;
session_start();
$id=$_SESSION['memberId'];
if ($id){
    $user=getOne("select name,icon from member where id=$id");
}

$title = "首页";

$css = "<link rel='stylesheet'  type='text/css' href='../../public/css/style.css'>
         <link rel='stylesheet'  type='text/css' href='../../public/css/web_style.css'>";

$script = "<script type='text/javascript' src='../../public/js/jquery.js'></script>
            <script type='text/javascript' src='../../public/js/lrtk.js'></script>
            <script src='../../public/js/jquery-1.11.3.min.js' type='text/javascript'></script>
            <script src='../../public/js/scrolltop-nav.js' type='text/javascript'></script>
            <script src='../../public/js/header.js' type='text/javascript'></script>
            ";

// 首页套餐展示
$setmeal = getAll("SELECT info.*,setmeal.pic FROM info,setmeal WHERE info.id=setmeal.infoId AND setmeal.`name` ='客厅'");
// $datu=getAll("SELECT setmeal.pic FROM info,setmeal WHERE info.id=setmeal.infoId AND setmeal.`name`='大图'");
if ($setmeal)
    foreach ($setmeal as $val) {
        $t .= "<li >
        <span  onMouseOver='bagcheck(this)' onMouseOut='bagcheckout(this)'>
        <img src='../../$val[pic]' class='lbrz-minplay'/>
        <img src='../../$val[pic]' class='lbrz-maxplay' style='display:none;'/>
        <div class='bagcheck_txt'><p>$val[name]</p></div>
        <a href='../../?c=lbrz&id=$val[id]' class='bagcheck_txt2'>$val[value1]元/㎡</a>
        </span>
        </li>";
    }
    
    // 直播间
$direct = getAll("select mb.name,ps.*,pid.src from member mb,projects ps,projects_images_design pid where ps.id=pid.projectsId and mb.id=ps.memberId and ps.status in('施工中','施工完成') and pid.name='客厅' order by ps.id desc limit 3");
if ($direct)
    foreach ($direct as $val) {
        $zb .= "<li>
            <img src='../../$val[src]'>
            <span><p>$val[name]</p><p>$val[resident] | " . getOne("select name from info where infotypeId=2 and value1=$val[layout]")[name] . " | $val[size]㎡</p></span><span><a href='../../?c=live&a=live&pid=$val[id]'>$val[status]</a></span>
            </li>";
    }
    
    // 留言板
$mess = getAll("select mb.icon,mb.name,mess.* from member mb,message mess where mb.id=mess.memberId order by id desc limit 4");
if ($mess)
    foreach ($mess as $val) {
        $reviews .= "<li>
            <span class='reviews_img'><img src='../../$val[icon]'/></span>
            <span class='reviews_name'>$val[name]</span>
            <span class='reviews_txt'>$val[mess]</span>
            <span class='reviews_time'>$val[date]</span>
            </li>";
    }
    
    // 体验馆
$res = getAll("select * from store order by id limit 3");
if ($res)
    foreach ($res as $val) {
        $store.=" <a href='../../?c=store&a=show&id=$val[id]'>
                        <li>
                        <img src='../../$val[pic]'/>
                        <p>$val[city]・$val[name]</p>
                        <p>地址 : $val[address]</p>
                        <p>咨询电话 : $val[mebile]</p>
                        </li>
                        </a>";
    }
    
    // 家居商城
$fl = getAll("select id,name from category where parentId=0 order by id limit 9");
if ($fl)
    foreach ($fl as $val1) {
        $dfl .= "<li><a href='common_shop.php?bigid=$val1[id]' >$val1[name]</a></li>"; // 商品大分类
                                                                           
        // 查询各大分类下分类id
        $fl2 = getAll("select cl.id from category cy,class cl where cy.parentId=$val1[id] and cy.id=cl.categoryId");
        $xxfl = "";
        if ($fl2)foreach ($fl2 as $val2){
            $xxfl .= "$val2[id],";
        }
        $xxfl = substr($xxfl, 0, - 1);
                                         
        //商品信息
        $sp = getAll("select pt.*,bd.logo from product pt,brand bd where pt.classId in($xxfl) and pt.brandId=bd.id limit 6");
        // global $tp;
        $tp="";
        if ($sp)foreach ($sp as $val2) {
                $tp .= "<li>        
                        <a href='../../?c=supermarket&a=showOne&id=$val2[id]'><img src='../../$val2[photo]'/></a>
                        <div class='sp-xinxi-play' >
                        <div class='sp-logo'><img src='../../$val2[logo]'></div>
                        <div class='sp-text'><a href='#'>$val2[name]</a></div>
                        <div class='sp-jgm'>特惠价:</div>
                        <div class='sp-jg'><p>¥</p><p>$val2[price]</p><p>/㎡</p></div>
                        </div>
                        </li>";
            }

        
        $spzs .= "<i>	
            <span class='commodity_title'><p>$val1[name]</p><a href='common_shop.php?bigid=$val1[id]'>更多信息></a></span>
            <ul >
            $tp
            </ul>
            </i>";
    }
    
    // 设计师排行榜
$sjs = getAll("select id,name,years,style,likes,icon from designer order by likes desc limit 4");
if ($sjs)
    foreach ($sjs as $val) {
       
        $sjsph .= "<li>
                <img src='../../$val[icon]' >
                <img src='../../public/image/hg1.png' width='22' height='22' class='hgimg'/>
                <p>$val[name]</p>
                <p>执业:$val[years]年 </p>
                <p>擅长风格:$val[style]</p>
                <img src='../../public/image/dianzan.png' width='14' height='14'/>
                <p>$val[likes]</p>
                <a href='../../?c=designer&a=showOne&id=$val[id]'>详细</a>
                </li>";
    }

$content = "<div id='body' class='web-index'></div>
            <div id='focus'>
            <div class='slide-main' id='touchMain'>
            	<div class='slide-box' id='slideContent'>
            		<div class='slide' id='bgstylec'>
            			<a stat='sslink-3' href='javascript:void(0)'  target='_blank' style=' background:url(../../public/image/lbt03.jpg) center;'></a>
            		</div>
            		<div class='slide' id='bgstylea'>
            			<a stat='sslink-1' href='javascript:void(0)'   target='_blank' style=' background:url(../../public/image/lbt04.jpg) center;'></a>
            		</div>
            		<div class='slide' id='bgstyleb'>
            			<a stat='sslink-2' href='javascript:void(0)'   target='_blank' style=' background:url(../../public/image/lbt05.jpg) center;'></a>
            		</div>
            <div class='slide' id='bgstyleb'>
            			<a stat='sslink-2' href='../../?a=provide_boc'   target='_blank' style=' background:url(../../public/image/lbt06.jpg) center;'></a>
            		</div>
            	<div class='item'>
            		<a class='cur' stat='item1001' href='javascript:;'></a><a href='javascript:;' stat='item1002'></a><a href='javascript:;' stat='item1003'></a><a href='javascript:;' stat='item1004'></a>
            	</div>
            </div>
            </div>
            </div>
            
            
            <!--=========================================fastlink=================================================-->
            <div id='fastlink' >
            <div>
            <ul>
            <a href='../../?c=supermarket'>
            <li class='fastlink_span2'>
            <img src='../../public/image/12.jpg'/>
            <strong>家居商城</strong>
            <p>所有产品通过平台认证，100%正品！由厂门到家门，打造低价格、高品质的直销平台。</p>
            </li>
            </a>
            <a href='../../?c=case'>
            <li class='fastlink_span'>
            <img src='../../public/image/13.jpg'/>
            <strong>最新案例</strong>
            <p>专业设计师分享成功设计案例，为您带来前沿的家居设计方案。</p>
            </li>
            </a>
            <a href='../../?a=flow'>
            <li class='fastlink_span2'>
            <img src='../../public/image/14.jpg'/>
            <strong>服务流程</strong>
            <p>轻松的“一键式”服务体验，满足你对家的所有需求！</p>
            </li>
            </a>
            </ul>
            </div>
            </div>
            <!--=========================================Home improvement packages(masterplan)=================================================-->
            <div id='hip'>
            <p class='title'>家装套餐</p>
            <p class='title2'>为您精心搭配出高性价比的优质产品组合，繁复家装只需一站！</p>
            <div id='masterplan'>
            <div class='content'>
            <ul>
            <li>
            <strong >
            <p class='masterplan_p1'>398</p>
            <p class='masterplan_p2'>元/㎡</p>
            </strong></li>
            <li>
            <strong>
            <p class='masterplan_p3'>基础装修套餐</p>
            </strong>
            </li>
            <li style='margin-top:10px;'>
            <p class='masterplan_p4'>内容:水电工程、泥水工程、墙面及顶面油漆、安装部分。</p></li>
            <li>
            <p class='masterplan_p4'>辅材:强弱电线材、给排水管、水泥、河沙、底漆、面漆和防水材料。</p>
            </li>
            <li><a href='../../?a=setMeal'>立即预约</a></li>
            </ul>
            </div>
            <div class='scontent'><a href='../../?a=setMeal'><img src='../../public/image/398tc.jpg'/></a></div>
            </div>
            
            <!--=========================================Home improvement packages(masterplan)=================================================-->
            <div id='bagcheck'>
            <div class='content' > <div id='bagcheckimage'><p id='bagcheckimage_p'>我家设计</p><p id='bagcheckimage_p2'>从毛坯到精装拎包入住</p></div></div>
            <div class='scontent'>
            <ul >
            $t
            </ul>
            </div>
            </div>
            
            </div>
            <!--=========================================live and user reviews=================================================-->
            <div id='lausr' >
            <p class='title' style='color:rgb(255,255,255) !important;'>家装现场</p>
            <p class='title2' style='color:rgb(255,255,255) !important;' >毫无保留的工程现场直击，让你时刻心里有底，装修专家就是你！</p>
            <div class='content'>
            <span class='lausr_title'>
            <ul class='lausr_title2'>
            <li class='lion' ><a href='javascript:void(0);' >直播间</a></li>
            <li ><a href='javascript:void(0);' >用户评论</a></li>
            </ul>
            <div  class='lausr_anniu'>
            <a href='../../?c=live'  class='block'>更多直播</a>
            <a href='javascript:viid(0);' class='message-play'>我要评论</a>
            </div>
            <div class='message'>
            <div class='m-head'>
            <img src='../../public/image/ico/ma.png'>
            <div class='m-txt'>
            <p>我要留言</p>
            <p>请填写您对我们云鲁班服务的意见与建议!!!!</p>
            </div>
            <a href='javascript:void(0);' class='m-off'><img src='../../public/image/ico/offon.png'></a>
            </div>
            <div class='m-text'>
            <textarea placeholder='填写您的留言信息' class='message_txt'></textarea>
            </div>
            <div class = 'm-name' style='display:none' value='$id'>$user[name]</div>
             <div class = 'm-tx' style='display:none'>$user[icon]</div>
            <div class='m-foot'>
            <div class='m-remind'></div>
            <div class='m-button'><input type='submit' class='m-button-login m-button-style' value='提交'></div>
            </div>
            </div>
            
            </span>
            </div>
            <span class='scontent'>
            <!--=========================================live and user reviews(live)=================================================-->
            <div id='lives' class='block' >
            <ul>
            $zb
            </ul>
            </div>
            <div id='reviews'>
            <ul>
            $reviews
            </ul>
            </div>
            </span>
            </div>
            <!--=========================================Home shopping mall=================================================-->
            <div id='homeshop' >
            <p class='title' >家居商城</p>
            <p class='title2'  >由厂门到家门，正品保证，打造低价格、高品质的家居购物平台。</p>
            <div class='content'>
            <span class='homeshop_title'>
            <ul class='homeshop_title2'>
            $dfl
            </ul>
            </span>
            </div>
            
            
            <span class='scontent'>
            <!--=========================================Home shopping mall(Commodity)=================================================-->
            <div id='commodity'>
            $spzs
            </div>
            <!--=========================================Home shopping mall(store)=================================================-->
            <div id='store' >
            <span class='store_title'><p>线下体验馆</p><!--<a href='../../?c=store'>查看其他区域门店></a>--></span>
            <ul>
            $store
            
            </ul>
            </div>
            </span>
            </div>
            <!--=========================================designer and news=================================================-->
            
            <div id='designerandnews' >
            <p class='title' >精英设计师热榜</p>
            <p class='title2'  >精英宏集，设计无限，云鲁班为您搜罗最赞设计师，为你创造理想空间。</p>
            <div class='content'>
            <span class='designerandnews_title'>
            <p>最赞设计师排行榜</p><a href='../../?c=designer'>查看更多设计师></a>
            </span>
            </div>
            <span class='scontent'>
            <!--=========================================designer and news(designer)=================================================-->
            <div id='designer'>
            <ul >
            $sjsph
            </ul>
            </div>
            <!--=========================================designer and news(news)=================================================-->
            <div id='news'>
            <span class='news_title'>
            <p>行业热点</p><a href='javascript:void(0);'>更多></a>
            </span>
            <ul class='news_title2'>
            <li><a href='javascript:void(0);'>2015年11月24日，聚集了众多国内相对成熟智能家居企业的中国国际智慧行业融合峰会在京召开。</a></li>
            <li><a href='javascript:void(0);'>2015年7月9日 首届中国互联网家装及智能家居高峰论坛</a></li>
            <li><a href='javascript:void(0);'>2015年6月2日 上海建博会今日盛大开幕！</a></li>
            <li><a href='javascript:void(0);'>2015年全国木制家具抽检不合格率超10%，而北京木家具抽检不合格率居全国之首。</a></li>
            <li><a href='javascript:void(0);'>2015年 中山家居市场新格局。</a></li>
            </ul>
            </div>
            </span>
            </div>
            
            <div id='pljq'></div>
            <ul id='pljqon' >
            <li>评论内容</li>
            <li><textarea>输入评论信息</textarea></li>
            <li><a href='javascript:void(0)'>游客,请登录!</a></li>
            <li><input type='submit' value='发表'></li>
            </ul>
            
            </body>
            </html>";

// echo $_SERVER['DOCUMENT_ROOT'].'/YLB/';

$_smarty->assign('title', $title);
$_smarty->assign('css', $css);
$_smarty->assign('script', $script);

$_smarty->assign('content', $content);
$_smarty->assign('header', $header);

$_smarty->display("stencil.tpl");
?>