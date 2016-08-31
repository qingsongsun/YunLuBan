<?php 
header("content-type:text/html;charset=utf-8");
require 'smarty.inc.php';
global  $_smarty;

$title="家具商场-云鲁班，装修由我";

$css="<link rel='stylesheet'  type='text/css' href='../../public/css/web_style.css'>";

$script="<script src='../../public/js/jquery-1.11.3.min.js' type='text/javascript'></script>
            <script src='../../public/js/scrolltop-nav.js' type='text/javascript'></script>
            <script src='../../public/js/sc-select-play.js' type='text/javascript'></script>
           <script src='../../public/js/selector.js' type='text/javascript'></script>
                <script src='../../public/js/method.js' type='text/javascript'></script>
           ";
            

    //导航-1
    $dh1=getAll("select id,name from category where parentId=0 order by id limit 4");
    if ($dh1)foreach ($dh1 as $val1){
        $dh2=getAll("select id,name from category where parentId=$val1[id] order by id limit 9");
        $xfl="";
        if ($dh2)foreach ($dh2 as $val2){
            $xfl.="<a href='common_shop.php?bigid=$val1[id]&smallid=$val2[id]'>$val2[name]</a>
                       <p>·</p>";
        }
        
        $dh.=" <li><span><a href='common_shop.php?bigid=$val1[id]'>$val1[name]</a></span>
                   <span>$xfl</span></li>";
    }
    //导航-2
    $dh3=getAll("select id,name from category where parentId=0 order by id limit 4,5");
    if ($dh3)foreach ($dh3 as $val1){
        $dh2=getAll("select id,name from category where parentId=$val1[id] order by id limit 9");
        $xfl="";
        if ($dh2)foreach ($dh2 as $val2){
            $xfl.="<a href='common_shop.php?bigid=$val1[id]&smallid=$val2[id]'>$val2[name]&nbsp;</a>";
        }
    
        $dh.=" <li><span><a href='common_shop.php?bigid=$val1[id]'>$val1[name]</a></span>
        <span class='sulli2'>$xfl</span></li>";
    }
    //导航-3
    $dh.="<li><span><a href='javascript:void(0);'>线下体验馆</a></span>";
    $dh4=getAll("select id,name from store limit 3");
    if ($dh4)foreach ($dh4 as $val3){
        $dh.="<span><a href='../../?c=store&a=show&id=$val3[id]'>$val3[name]</a><p>·</p>";
    }
    $dh.="</span></li>";
    
    
    $content="<div id='body' class='web-supermaket'></div>
                    <div id='supermaket'>
                    <div class='supermaket'>
                    <span class='content'>
                    <p><a href='common_shop.php'>所有分类</a></p>
                    <ul>
                    $dh
                    </ul>
                    </span>
                    <span class='scontent'>
                    <div class='search'>
<dl class='select search-play'>
		<dt class='keyword' >关键词</dt>
		<dd style='display: none;'>
			<ul>
				<li>关键词</li>
				<li>商品名称</li>
				<li>商品分类</li>
				<li>商品品牌</li>
			</ul>
		</dd>
	</dl>
<input  name='b' placeholder='请输入产品名、关键词' type='text'  class='txt'> 
<input class='subimt' type='image' src='../../public/image/ico/fdj.jpg' width='41' height='30'  >
</div>
                    ";
    
    // 体验馆
    $res = getAll("select * from store order by id limit 3");
    if ($res)
        foreach ($res as $val) {
            $store.=" <li>
            <a href='../../?c=store&a=show&id=$val[id]'><img src='../../$val[pic]'></a>
            <a href=''../../?c=store&a=show&id=$val[id]'>$val[city]・$val[name]</a>
            <p>地址 : $val[address]</p>
            <p>咨询电话 : $val[mebile]</p>
            </li>";
    }
    
    
    $bigid=$_GET['bigid'];
    if (!$bigid){
        $fl1=1;
    }else {
        $fl1="cy.parentId=$bigid";
    }
    
    $smallid=$_GET['smallid'];
    if (!$smallid){
        $fl2=1;
    }else {
        $fl2="cy.id=$smallid";
    }
    
    
    if ($fl1==1&$fl2==1){
        $css.="<link rel='stylesheet'  type='text/css' href='../../public/css/style-supermaket.css'>";
        
       //品牌特惠
        $zsdClass=getOne("select id,name from category where id=1");
            $nr="<span><p>$zsdClass[name]</p>";
                $zsxClass=getAll("select cl.id,cy.id as cyid,cy.name from category cy,class cl where cy.parentId=$zsdClass[id] and cy.id=cl.categoryId order by id limit 6");
                $xxfl = "";
                if ($zsxClass)foreach ($zsxClass as $val4){
                    $nr.="<a href='common_shop.php?bigid=$zsdClass[id]&smallid=$val4[cyid]'>$val4[name]</a>";
                    $xxfl .= "$val4[id],";
               }
               $xxfl = substr($xxfl, 0, - 1);
            $nr.="</span>";
                
            $zsxPic=getAll("select pt.id,pt.photo from product pt where pt.classId in($xxfl) limit 6");
            $nr.="<ul>";
            if ($zsxPic)foreach ($zsxPic as $val5){
                 $nr.="<li><a href='../../?c=supermarket&a=showOne&id=$val5[id]'><img src='../../$val5[photo]'/></a></li>";
            }
             $nr.="</ul>";
             
             
         //云鲁班套餐
         $ylbtc=getOne("select id,name from category where id=7");
         $tc="<span><p>$ylbtc[name]</p>";
         $tcfl=getAll("select cl.id,cy.id as cyid,cy.name from category cy,class cl where cy.parentId=$ylbtc[id] and cy.id=cl.categoryId order by id limit 6");
         $xxfl="";
         if ($tcfl)foreach ($tcfl as $val6){
             $tc.="<a href='common_shop.php?bigid=$ylbtc[id]&smallid=$val6[cyid]'>$val6[name]</a>";
             $xxfl .= "$val6[id],";
         }
         $xxfl = substr($xxfl, 0, - 1);
         $tc.="</span>";
         
         $tctp=getAll("select pt.id,pt.photo,pt.name,pt.price,pt.shortDesc from product pt where pt.classId in($xxfl) limit 4");
         $tc.="<ul>";
         if ($tctp)foreach ($tctp as $val7){
             $tc.="<li>
                       <a href='../../?c=supermarket&a=showOne&id=$val7[id]'><img src='../../$val7[photo]'></a>
                       <a href='../../?c=supermarket&a=showOne&id=$val7[id]'>$val7[name]</a>
                       <p>$val7[shortDesc]</p>
                       <p>¥ $val7[price]</p>
                       </li>";
         }
         $tc.="</ul>";
         
        
         //新到商品、组合优惠
         $list3=getAll("select id,name from category where parentId=0 order by id limit 2,2");
         if ($list3)foreach ($list3 as $val){
             //$sp="";
             $spfl=""; $spxq="";
             $spm=getAll("select cl.id,cy.id as cyid,cy.name from category cy,class cl where cy.parentId=$val[id] and cy.id=cl.categoryId order by id limit 6");
             $xxfl="";
             if ($spm)foreach ($spm as $val0){
                 $spfl.="<a href='common_shop.php?bigid=$val[id]&smallid=$val0[cyid]'>$val0[name]</a>";
                 $xxfl.= "$val0[id],";
             }
             $xxfl = substr($xxfl, 0, - 1);
             
             $sptp=getAll("select pt.id,pt.photo,pt.name,pt.price from product pt where pt.classId in($xxfl) limit 5");
             if ($sptp)foreach ($sptp as $val8){
                 $spxq.="<li>
                               <a href='../../?c=supermarket&a=showOne&id=$val8[id]'><img src='../../$val8[photo]'></a>
                               <a href=''>$val8[name]</a>
                               <p>¥ $val8[price]</p>
                               </li>";
             }
             
             $sp.="<div class='list_03'><span><p>$val[name]</p>$spfl</span><ul>$spxq</ul></div>";
         }
        
        $content.="<div id='top'><img src='../../public/image/sc01.jpg'></div>
                            <div class='list_01'>
                            $nr
                            </div>
                            <div class='list_02'>
                            $tc
                            </div>
                            $sp
                            <div id='store'>
                            <span><p>线下体验馆</p><a href='javascript:void(0);'>查看其它地区门店 ></a></span>
                            <ul>
                            $store
                            </ul>
                            </div>
                            </span>
                            </div>
                            </div>";
        
    }else {
        $css.="<link rel='Bookmark' href='http://wushang.co/favicon.ico'>
                    <link rel='stylesheet'  type='text/css' href='../../public/css/style-supermaket-list.css'>";
        
        $head=getOne("select id,name,description,icon from category cy where id=$bigid");
        $hd="<div class='name'>
        <div class='left'>
        <p>$head[name]</p>
        <p>$head[description]</p>
        </div>
        <div class='right'><img src='../../$head[icon]'></div>
        </div>";
        $hfl=getAll("select id,name from category where parentId=$bigid");
        $xfl="";
        if ($hfl)foreach ($hfl as $val9){
            $xfl.="<a href='common_shop.php?bigid=$head[id]&smallid=$val9[id]'>$val9[name]</a>";
        }
        
        $syfl=getAll("select id,name from class where categoryId='".$_GET['smallid']."'");
        if ($syfl)foreach ($syfl as $val){
            $select.="<li>$val[name]</li>";
        }
        
        $sql="select pt.id,pt.photo,pt.name,pt.price,pt.marketPrice from product pt,category cy,class cl where cl.categoryId=cy.id and pt.classId=cl.id and $fl1 and $fl2";
        $pageSize=16;
        $arr=page($sql, $_GET[page], $pageSize);
        $spxx=$arr[0]; $countPage=$arr[1]; $page=$arr[2];
        
        if ($spxx)foreach ($spxx as $val10){
            $sp.="<li>
            <a href='../../?c=supermarket&a=showOne&id=$val10[id]'><img src='../../$val10[photo]'></a>
            <a href='../../?c=supermarket&a=showOne&id=$val10[id]'>$val10[name]</a>
            <p>¥$val10[price]</p>
            <p>¥$val10[marketPrice]</p>
            </li>";
        }
        
        //分页
        $fy="<a href='common_shop.php?bigid=$bigid&smallid=$smallid&page=1' >首页</a>
        <a href='common_shop.php?bigid=$bigid&smallid=$smallid&page=".($page-1)."'>上一页</a>";
        for($i=1;$i<=$countPage;$i++){
            $fy.="<a href='common_shop.php?bigid=$bigid&smallid=$smallid&page=$i'>$i</a>";
        }
        $fy.="<a href='common_shop.php?bigid=$bigid&smallid=$smallid&page=".($page+1)."'>下一页</a>
        <a href='common_shop.php?bigid=$bigid&smallid=$smallid&page=$countPage' >尾页</a>";
        
        
        $content.=" $hd
                            <div class='option'>
                            <span>
                            $xfl
                            </span>
                            <ul>
                           <li>综合排序</li>
<li class='zh-play1 classify'>
	<dl class='select'>
		<dt>所有分类</dt>
		<dd style='display: none;'>
			<ul>
			 $select
				
			</ul>
		</dd>
	</dl>
</li>
<li class='zh-play1 sales'>
	<dl class='select'>
		<dt>按销量</dt>
		<dd style='display: none;'>
			<ul>
				<li>销量由低到高</li>
				<li>销量由高到低</li>
			</ul>
		</dd>
	</dl>
</li>
<li class='zh-play1 price'>
	<dl class='select'>
		<dt>按价格</dt>
		<dd style='display: none;'>
			<ul>
				<li>价格由低到高</li>
				<li>价格由高到低</li>
			</ul>
		</dd>
	</dl>
</li>
<li><input placeholder='￥' type='text' class='low' ><p>-</p><input placeholder='￥' type='text' class='tall' ></li>
<li>
<div></div>
<p>1/3</p>
                       <div></div>
</li>
<li class='zh-play2 peisong'><p>配送至</p>
<dl class='select'>
		<dt>广东 中山</dt>
		<dd style='display: none;'>
			<ul>
				<li>广东 中山</li>
				<li>广东 中山</li>
				<li>广东 中山</li>
				<li>广东 中山</li>
				<li>广东 中山</li>
			</ul>
                            </dd>
                            </dl>
                            </li>
                            </ul>
                            </div>
                            <div id='ware'>
                            <ul>
                            $sp
                            </ul>
                            $fy
                            </div>
                            <div id='store'>
                            <span><p>线下体验馆</p><a href='javascript:void(0);'  value='../../?c=store'>查看其它地区门店 ></a></span>
                            <ul>
                            $store
                            </ul>
                            </div>
                            </span>
                            </div>
                            </div>";
        
    }
   
    $_smarty->assign('title',$title);
    $_smarty->assign('css',$css);
    $_smarty->assign('script',$script);
    
    $_smarty->assign('content',$content);
    $_smarty->assign('header',$header);
    
    $_smarty->display("stencil.tpl");
?>