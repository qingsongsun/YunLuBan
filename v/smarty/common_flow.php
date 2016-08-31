<?php 
header("content-type:text/html;charset=utf-8");
    //echo var_dump($_GET);
    require 'smarty.inc.php';
    global  $_smarty;

    
    $title="398套餐";

    $css="<link rel='Bookmark' href='http://wushang.co/favicon.ico'>
            <link rel='stylesheet'  type='text/css' href='../../public/css/web_style.css'>
            <link rel='stylesheet'  type='text/css' href='../../public/css/style-lc.css'>";

    $script="<script src='../../public/js/jquery-1.11.3.min.js' type='text/javascript'></script>
              <script src='../../public/js/scrolltop-nav.js' type='text/javascript'></script>
              <script type='text/javascript'>
                $(function(){
                    $('.bximgjq a').mouseover(function(){
                        var a = $(this).index();
                        var b = '../../public/image/0zx0'+a+'.jpg'
                        $('.bximg').attr('src',b);
                    });
                });
              </script>";

    $content="<div id='lc-top'>
            	<div class='lc-bt'>[一站式]极致无忧的服务体验</div>
            	<div class='lc-ico'>
            		<i><img src='../../public/image/01.png'></i>
            		<i><img src='../../public/image/02.png'></i>
            		<i><img src='../../public/image/03.png'></i>
            		<i><img src='../../public/image/04.png'></i>
            		<i><img src='../../public/image/05.png'></i>
            		<i><img src='../../public/image/06.png'></i>
            		<i><img src='../../public/image/07.png'></i>
            	</div>
            	<div class='lc-an'><a href='../../?c=admin&a=work_order_info'>立即预约</a></div>
                </div>
                
                <div id='lc-tcjs'>
                	<div class='lc-tcjs'>
                	<div class='tcjs mr20'>
                		<span class='tcjs-mc'><i>398</i><p>基础装修套餐<br/>元/㎡</p></span>
                		<span class='tcjs-nr'>这里是套餐介绍内容</span>
                		<span class='tcjs-an'><a href='#'>查看详情</a></span></div>
                	<div class='tcjs'>
                		<span class='tcjs-mc'><i>1088</i><p>拎包入住套餐<br/>元/㎡</p></span>
                		<span class='tcjs-nr'>这里是套餐介绍内容</span>
                		<span class='tcjs-an'><a href='#'>查看详情</a></span></div>
                	</div>
                </div>
                
                <!--=========================================buxian=================================================-->
                <div id='buxian' >
                <p class='title' >装修标准流程</p>
                <p class='title2' >从毛坯房到精装，为您一站式装修服务</p>
                <div class='content'>
                <span class='bximgjq'>
                <a href='javascript:void(0)' onMouseMove='bximg('0zx00')'>1. 电插、灯位不限</a>
                <a href='javascript:void(0)' onMouseMove='bximg('0zx01')'>2. 地面铺贴面积不限</a>
                <a href='javascript:void(0)' onMouseMove='bximg('0zx02')'>3. 给排水位置不限</a>
                <a href='javascript:void(0)' onMouseMove='bximg('0zx03')'>4. 洗手间、厨房墙面贴砖面积不限</a>
                <a href='javascript:void(0)' onMouseMove='bximg('0zx04')'>5. 墙面、天花批灰、ICI面积不限</a>
                <a href='javascript:void(0)' onMouseMove='bximg('0zx05')'>6. 门洞修补不限</a>
                <a href='javascript:void(0)' onMouseMove='bximg('0zx06')'>7. 洗手间、厨房铝扣板天花不限</a>
                <a href='javascript:void(0)' onMouseMove='bximg('0zx07')'>8. 地面水泥沙找平4CM内不限</a>
                </span>
                <img src='../../public/image/0zx00.jpg' class='bximg'>
                </div>
                </div>
                
                <!--=========================================fuwu=================================================-->
                <div id='fuwu'>
                <p class='title' >品质服务</p>
                <p class='title2' >以服务赢得口碑，以品质赢得客户</p>
                <div class='content'>
                <span>
                <div>
                <i class='i1'></i>
                <p>时刻查询<br/>
                                      装修进度</p>
                </div>
                <div>
                <i class='i2'></i>
                <p>24小时及时<br/>
                                     响应服务</p>
                </div>
                <div>
                <i class='i3'></i>
                <p>专人监管<br/>
                                     施工过程</p>
                </div>
                <div>
                <i class='i4'></i>
                <p>专业监理<br/>
                                      严格验收</p>
                </div>
                </span>
                <p>云鲁班提供微信监控服务，项目经理每天或每隔一两天，都会以图片形式向客户报告工程进度及材料进场情况。
                <br/>通过微信业主可以实现对各施工场地的远程监控，及时发现工地问题并以最快的速度与相关人员协调解决。</p>
                </div>
                </div>
                
                <!--=========================================baoz=================================================-->
                <div id='baoz'>
                <p class='title4' >装修保障<span>我们的承诺，一键式无忧装修，给我一份信任，还你一个极致的家。</span></p>
                <div class='content'><img src='../../public/image/398-5da.jpg'></div>
                </div>
                
                <!--=========================================beizhu=================================================-->
                <div id='beizhu'>
                <div class='content'>
                <p>备注</p>
                <p>〇  建筑面积不足70㎡的按70㎡计算；</p>
                <p>〇  本套餐的计算面积为购房凭证上所书建筑面积为据(赠送面积除外)，无产权面积证明的按75%得房率推算核价所需建筑面积(即套内面积除以0.75)；</p>
                <p>〇  398套餐90平方以下卫生间默认'1'套，90平方以上(含90平方)卫生间默认为'2'套，如需增加系统每套增加收2800元；</p>
                <p>〇  单做398套餐，公司相应增加管理费3000元。</p>
                <p>* 最终解释权归云鲁班所有。</p>
                </div>
                </div>";
    

    $_smarty->assign('title',$title);
    $_smarty->assign('css',$css);
    $_smarty->assign('script',$script);
    
    $_smarty->assign('content',$content);
    $_smarty->assign('header',$header);
    
    $_smarty->display("stencil.tpl");
?>