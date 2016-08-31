<?php 
header("content-type:text/html;charset=utf-8");
    //echo var_dump($_GET);
    require 'smarty.inc.php';
    global  $_smarty;
    global  $left;
    session_start();
    $memberId=$_SESSION['memberId'];



    $title="装修订单-会员中心";
    
    $css="<link rel='stylesheet'  type='text/css' href='../../public/css/web_style.css'>
          <link rel='stylesheet'  type='text/css' href='../../public/css/i_style.css'>";
    
    $script=null;
    $content=null;



    $action="info";
    //查询用户是否存在已预约未完成状态订单
    $order=getOne("select ps.id,ps.status,ps.amount,ps.sex,mb.username,mb.name,ps.newold,ps.resident,ps.address,ps.layout,ps.type,ps.size,ps.package,ps.deposit,ps.order_num,date_add(ps.date, interval 3 day) as enddate from projects ps,member mb where memberId=$memberId and ps.memberId=mb.id and ps.status not in('施工完成','完成') order by ps.date desc limit 1");

    if ($order) {
        $status = $order['status'];
        if ($status == '未付款') {
            $date = date('y-m-d h:i:s', time());
            if ($order['enddate'] <= $date) {
                query("delete from projects where id=$order[id]");
            }else {
                $action = "pay";
            }
        } else {
            $action = "status";
        }
    }
//    }else{
//        $action="info";
//    }


        if ($action=='info'){
            $script="<script src='../../public/js/jquery-1.11.3.min.js' type='text/javascript'></script>
                    <script src='../../public/js/sc-select-play.js' type='text/javascript'></script>
                    <script src='../../public/js/scrolltop-nav.js' type='text/javascript'></script>
                    <script src='../../public/js/i.js' type='text/javascript'></script>
                    <script src='../../public/js/selector.js' type='text/javascript'></script>
                    <script src='../../public/js/method.js' type='text/javascript'></script>
                    <script src='../../public/js/pct.js' type='text/javascript'></script>
                    <script src='../../public/js/click.js' type='text/javascript'></script>
                ";
            
            //套餐
            $tc=getAll("select * from info where infotypeId=4 limit 6");
            if ($tc)foreach ($tc as $val){
                $xztc.="<a href='javascript:void(0)' value='$val[value1]'>$val[name]</a>";
            }
            
            //户型
            $hx=getAll("select name,value1 from info where infotypeId=2 limit 6");
            if($hx)foreach ($hx as $val){
                $xzhx.="<a href='javascript:void(0)' value='$val[value1]'>$val[name]</a>";
            }

            //房屋情况
            $qk=getAll("select name,value1 from info where infotypeId=1 limit 6");
            if ($qk)foreach ($qk as $val){
                $xzqk.="<a href='javascript:void(0)' value='$val[value1]'>$val[name]</a>";
            }
            
            //房屋类型
            $lx=getAll("select name,value1 from info where infotypeId=3 limit 6");
            if ($lx)foreach ($lx as $val){
                $xzlx.="<a href='javascript:void(0)' value='$val[value1]'>$val[name]</a>";
            }
            
            //真实姓名
            $name=getOne("select name from member where id=$memberId")['name'];
            if ($name){
                $txxm="<input type='text' value='$name' readonly='readonly'>";
            }else {
                $txxm="<input type='text' placeholder='请填写您的真实姓名'>";
            }
            
            $content="<div class='i-web'>
                    $left
                    <div id='body' class='zxdd'></div>
                    <div class='i-right'>
                    <div class='i-bt'>装修订单</div>
                    <div class='i-lc'><a class='ico-on'><span class='i-ico'>1</span>填写信息</a><a>-------</a><a><span class='i-ico'>2</span>在线支付订金</a><a>-------</a><a><span class='i-ico'>3</span>成功下单</a></div>
                    <div class='i-nr'>
                    <ul class='i-bg'>
                    	<li class='phone'><p>用户名</p><input  readonly='readonly' type='text' value='12345678912' ></li>
                    	<li class='name'><p>真实姓名</p>$txxm</li>
                    	<li class='sex'><p>性别</p><a href='javascript:void(0)' >男</a><a href='javascript:void(0)'>女</a><input id='i-bg-xb'  type='' name='' value='x' style='display: none;'></li>
                    	<li class='condition'><p>房屋情况</p>$xzqk</li>
                    	<li class='village'><p>小区名称</p><input type='text' placeholder='填写小区名称'></li>
                    	<li class='cityint'><p>省市县</p>
                    	<dl class='select tjdz-select'>
                    		<dt class='province' rel='0'>选择省份</dt>
                    		<dd style='display: none;'>
                    			<ul class='province-ul'>
                    			</ul>
                    		</dd>
                    	</dl>
                    	<dl class='select tjdz-select'>
                    		<dt class='city'>选择城市</dt>
                    		<dd style='display: none;'>
                    			<ul class='city-ul'>
                    			</ul>
                    		</dd>
                    	</dl>
                    	<dl class='select tjdz-select'>
                    		<dt class='township'>选择镇区</dt>
                    		<dd style='display: none;'>
                    			<ul class='township_ul'>
                    			</ul>
                    		</dd>
                    	</dl>
                    	</li>
                    	<li class='add'><p>详细地址</p><input type='text' placeholder='填写地址'></li>
                    	<li class='type'><p>户型</p>$xzhx</li>
                    	<li class='style'><p>房屋类型</p>$xzlx</li>
                    	<li class='areas'><p>建筑面积</p><input type='text' placeholder='填写建筑面积'></li>
                    	<li class='setmeal'><p>选择套餐</p>$xztc<input id='i-bg-tc' 	type='text' name='' value='' style='display: none;'></li>
                    </ul>
                    <div class='i-tj'><a href='javascript:void(0)'  class='submit zxdsubmit'>提交订单</a></div>
                    </div>
                    </div>
                    </div>";
            
        }elseif ($action=='pay'){
            $script="<script src='../../public/js/jquery-1.11.3.min.js' type='text/javascript'></script>
                    <script src='../../public/js/i.js' type='text/javascript'></script>
                    <script src='../../public/js/scrolltop-nav.js' type='text/javascript'></script>
                    <script type='text/javascript' src='../../public/js/endtime.js' ></script>
                    <script src='../../public/js/i.js' type='text/javascript'></script>
                    <script type='text/javascript'>
                    $(function(){
                    $('#cityjqon').click(function(){
                    	$('#cityjq').slideToggle('slow');
                    });
                    });
                    </script>";
            $content="<div class='i-web'>
                    $left
                    <div class='i-right'>
                    <div class='i-bt'>装修订单</div>
                    <div class='i-lc'><a ><span class='i-ico'>1</span>填写信息</a><a >-------</a><a class='ico-on'><span class='i-ico'>2</span>在线支付订金</a><a>-------</a><a><span class='i-ico'>3</span>成功下单</a></div>
                    <div class='i-nr' style='background-color: rgb(253,240,221) !important;'>
                    <div class='i-tx'>
                    <div class='i-tx-nr'>
                    	<img src='../../public/image/hyt.png'class='i-tx-nr-ico'>
                    	<p class='i-tx-nr-t1'>订单提交成功，您的订单将保留 <i class='end-time' endTime='$order[enddate]'></i>，请您尽快完成付款！</p>
                    	<p class='i-tx-nr-t2'>订单号：$order[order_num]</p>
                    	<p class='i-tx-nr-t3'>应付总额：<i>￥$order[amount]</i></p>
                    </div>
                    </div>
                    </div>
                    <div class='i-nr i-fk'>
                    	<a href='javascript:void(1)' class='i-fk-aon'>第三方平台支付</a>
                    	<a href='javascript:void(1)'>企业支付</a>
                    	<a href='javascript:void(1)'>储蓄卡支付</a>
                    	<a href='javascript:void(1)'>信用卡支付</a>
                    </div>
                    <div class='i-nr i-fk-jk'>
                    	<i class='i-fk-jk-xs'>接口1</i>
                    	<i>接口2</i>
                    	<i>接口3</i>
                    	<i>接口4</i>
                    </div>
                    <div class='i-nr i-fkon'><a href='../../?c=admin&a=work_order'><input type='submit' value='立即付款' /></a></div>
                    </div>
                    </div>";
        }elseif ($action=='status'){
            $script="<script src='../../public/js/jquery-1.11.3.min.js' type='text/javascript'></script>
                    <script src='../../public/js/scrolltop-nav.js' type='text/javascript'></script>
                    <script src='../../public/js/i.js' type='text/javascript'></script>
                    <script src='../../public/js/i.js' type='text/javascript'></script>
                    <script type='text/javascript'>
                    $(function(){
                    $('#cityjqon').click(function(){
                    	$('#cityjq').slideToggle('slow');
                    });
                    });
                    </script>";

            //房屋情况
            $newold=getOne("select name from info where infotypeId=1 and value1=$order[newold]")['name'];
            //户型
            $layout=getOne("select name from info where infotypeId=2 and value1=$order[layout]")['name'];
            //房屋类型
            $type=getOne("select name from info where infotypeId=3 and value1=$order[type]")['name'];
            //选择套餐
            $package=getOne("select name from info where infotypeId=4 and value1=$order[package]")['name'];

            $content="<div class='i-web'>
                    $left
                    <div class='i-right'>
                    <div class='i-bt'>装修订单</div>
                    <div class='i-lc'><a ><span class='i-ico'>1</span>填写信息</a><a >-------</a><a ><span class='i-ico'>2</span>在线支付订金</a><a>-------</a><a class='ico-on'><span class='i-ico'>3</span>成功下单</a></div>
                    <div class='i-nr' style='padding-bottom: 0px !important;'>
                    	<ul class='i-bg'>
                    	<li><p>用户名</p><i>$order[username]</i></li>
                    	<li><p>真实姓名</p><i>$order[name]</i></li>
                    	<li><p>性别</p><i>$order[sex]</i></li>
                    	<li><p>房屋情况</p><i>$newold</i></li>
                    	<li><p>小区名称</p><i>$order[resident]</i></li>
                    	<li><p>详细地址</p><i>$order[address]</i></li>
                    	<li><p>户型</p><i>$layout</i></li>
                    	<li><p>房屋类型</p><i>$type</i></li>
                    	<li><p>建筑面积</p><i>$order[size]平方米</i></li>
                    	<li><p>选择套餐</p><i>$package</i></li>
                    </ul>
                    </div>
                    <div class='i-nr i-yf'>已付订金：$order[deposit]元</div>
                    <div class='i-nr i-dd'><p>您的订单编号为</p><i>$order[order_num]</i></div>
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