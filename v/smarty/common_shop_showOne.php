<?php 
header("content-type:text/html;charset=utf-8");
    require_once 'smarty.inc.php';
    global  $_smarty;

    $title="家具商场-云鲁班，装修由我";

    $css="<link rel='Bookmark' href='http://wushang.co/favicon.ico'>
                <link rel='stylesheet'  type='text/css' href='../../public/css/web_style.css'>
                <link rel='stylesheet'  type='text/css' href='../../public/css/style-supermaket-product.css'>";

    $script="<script src='../../public/js/jquery-1.11.3.min.js' type='text/javascript'></script>
                <script src='../../public/js/sc-select-play.js' type='text/javascript'></script>
                <script src='../../public/js/scrolltop-nav.js' type='text/javascript'></script>
                <script src='../../public/js/product.js' type='text/javascript'></script>
                <script src='../../public/js/click.js' type='text/javascript'></script>
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
    $dh.="<li><span><a href='../../?c=store'>线下体验馆</a></span>";
    $dh4=getAll("select id,name from store limit 3");
    if ($dh4)foreach ($dh4 as $val3){
        $dh.="<span><a href='../../?c=store&a=show&id=$val3[id]'>$val3[name]</a><p>·</p>";
    }
    $dh.="</span></li>";
    
    
    $id=$_GET['id'];
    if (!$id){
        header("Location: common_shop.php");
        exit();
    }
    $xfl=getOne("select cy.id,cy.`name`,cy.parentId,pt.`name` as ptname,cl.name as clname from category cy,product pt,class cl where cl.categoryId=cy.id and pt.classId=cl.id and pt.id=$id");
    $dfl=getOne("select id,name from category where id=$xfl[parentId]");
    
    $spxq=getOne("select bd.`name` as bdname,pt.* from product pt,brand bd where pt.brandId=bd.id and pt.id=$id");
    $sptp=getAll("select * from product_images where productId=$id");
    if ($sptp)foreach ($sptp as $val3){
        $tp.="<li><img src='../../$val3[src]' rel='$val3[src]'></li>";
        $color.="<a href='javascript:void(0)'>$val3[name] <i class='sp-j1'>$val3[price]</i><i class='sp-j2'>$val3[marketPrice]</i><i class='sp-kc'>$val3[stock]</i></a>";
    }
    
    $content="
                    <div id='body' class='web-supermaket'></div>
                    <div id='supermaket'>
                    <div class='supermaket'>
                    <!--=========================================slittlee=================================================-->
                    <span class='slittle'>
                    <div class='route'>
                    <a href='common_shop.php'>家居商城</a>
                    <p>></p>
                    <a href='common_shop.php?bigid=$dfl[id]'>$dfl[name]</a>
                    <p>></p>
                    <a href='common_shop.php?bigid=$dfl[id]&smallid=$xfl[id]'>$xfl[name]</a>
                    <p>></p>
                    <a href='javascript:void(0)'>$xfl[clname]</a></div>
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
                    </span>
                    
                    <!--=========================================content=================================================-->
                    <!--=========================================supermaket-Column name=================================================-->
                    
                    <span class='content'>
                    <p><a href='common_shop.php'>所有分类</a></p>
                    <ul>
                    $dh
                    </ul>
                    </span>
                    
                    <!--=========================================scontent=================================================-->
                    <span class='scontent'>
                    <!--=========================================introduces)=================================================-->
                    <div class='introduces'>
                    <div class='left'>
                    <img src='../../$spxq[photo]' id='introducesimg' rel='$spxq[photo]'> 
                    <ul class='sp-img'>
                    <li class='lion'><img src='../../$spxq[photo]' ></li>
                    $tp
                    </ul>
                    </div>
                    <div class='right'>
                    <ul>
                    <li class='sp-biaoti' rel='$id'>[<i id='ppm'>$spxq[bdname]</i>] <i id='spm'>$spxq[name]</ii></li>
                    <li class='sp-fubiao'>$spxq[shortDesc]</li>
                    <li class='sp-jiage'><p>商城单价：</p><p class='ggjg1' >¥$spxq[price]</p><p>市场单价：</p><p class='ggjg2'>¥$spxq[marketPrice]</p></li>
                    <li class='sp-yangse'>
                    <p>样式</p>
                    <span>
                    <a href='javascript:void(0)'  class='introducesa'>标准<i class='sp-j1'>$spxq[price]</i><i class='sp-j2'>$spxq[marketPrice]</i><i class='sp-kc'>$spxq[stock]</i><i class='sp-kc'>$val3[stock]</i></a>
                    $color
                    </span>
                    
                    
                    </li>
                    
                    
                    <li class='sp-peisong'><p>配送</p>
                    	
                    	<dl class='select'>
                    		<dt class='psdzstart'>广东 中山</dt>
             
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
                    	
                    	<p>至</p>
                    	<dl class='select'>
                    		<dt class='psdzend'>广东 中山</dt>
                    		
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
                    <li class='sp-shuliang'><p>数量</p><a href='javascript:void(0)' id='btnleft'>-</a><input id='shuliang' value='1'><a href='javascript:void(0)' id='btnright'>+</a><p class='sp-kcplay'>[库存$spxq[stock]件]</p></li>
                    <li class='sp-submit'><a href='javascript:void(0)'  id='ljgmplay' class='goumai_play' rel='gm'>立即购买</a><a href='javascript:void(0)' id='gwcplay' class='goumai_play' rel='gwc'>加入购物车</a></li>
                    </ul>
                    </div>
                    </div>
                    
                    <!--=========================================footer=================================================-->
                    <div class='explain'>
                    <div class='content'>
                    <a href='javascript:void(0)' class='aon2'>商品详请</a>
                    <a href='javascript:void(0)' > 规格参数</a>
                    <a href='javascript:void(0)'>服务保障</a>
                    </div>
                    <span class='scontent'>
                    <i class='ion' >$spxq[longDesc]</i>
                    <i>$spxq[par]</i>
                    <i>$spxq[service]</i>
                    	
                    
                    </span>
                    
                    </div>
                    </span>
                    </div>
                    </div>";
    

    $_smarty->assign('title',$title);
    $_smarty->assign('css',$css);
    $_smarty->assign('script',$script);
    
    $_smarty->assign('content',$content);
    $_smarty->assign('header',$header);
    
    $_smarty->display("stencil.tpl");
?>