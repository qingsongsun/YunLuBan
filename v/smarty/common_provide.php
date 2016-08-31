<?php 
header("content-type:text/html;charset=utf-8");
    //echo var_dump($_GET);
    require 'smarty.inc.php';
    global  $_smarty;
    
    
    $title=null;
    $content=null;
    
    $css="<link rel='stylesheet'  type='text/css' href='../../public/css/web_style.css'>
            <link rel='stylesheet'  type='text/css' href='../../public/css/style-398.css'>";
    
    $script="<script src='../../public/js/jquery-1.11.3.min.js' type='text/javascript'></script>
            <script src='../../public/js/jquery-1.11.3.min.js' type='text/javascript'></script>
            <script src='../../public/js/scrolltop-nav.js' type='text/javascript'></script>
            
            <script type='text/javascript'>
            $(function(){
            $('#cityjqon').click(function(){
            	$('#cityjq').slideToggle('slow');
            });
            });
            </script>";
    
    if (!empty($_GET['a'])){
        $action=$_GET['a'];
        //echo $action;
        if ($action=="boc"){
            $title="中国银行-装修贷款";
            $content="<div id='daikuan'>
                    <div class='content'  style=' height:2400px' >
                    <span><img src='../../public/image/dk.jpg' class='topimg'></span>
                    <p class='title'>装修贷款</p>
                    <p class='title2'>请选择银行</p>
                    <span><a href='../../?a=provide_boc' style='color:#abc808' onMouseOver='switch6('80','60')'>中国银行</a><a href='../../?a=provide_ccb' onMouseOver='switch6('120','200')'>中国建设银行</a>
                    <div class='sliders' style='width:80px; margin-top:55px; margin-left:60px;' ></div>
                    <script type='text/javascript'>
                    	function switch6(a,b){
                    	var a =  a + 'px';
                    	var b =  b + 'px';
                     	$('#daikuan .content .sliders').css('width',a);
                        $('#daikuan .content .sliders').animate({'margin-left':b},150);
                    };
           
                    </script>
                    </span>
    
                    <div>
                    <span><img src='../../public/image/zgyh.png'></span>
                    <span class='dl0'>贷款方式</span>
                    <span>
                    <b class='dl1'>A 大额分期</b>
                    <b class='dl2'>客户所需资料：</b>
                    <ul class='dl3'>
                    <li>1.申请人身份证（已结婚需要双方，临时身份证需要三个月内）</li>
                    <li>2.户口本（如已结婚不在同一户口本提供需要双方）</li>
                    <li>3.结婚证（未婚需提供未婚证）</li>
                    <li>4.房产证、土地证（没有，可以备案表，90平方以上，免抵押）</li>
                    <li>5.银行流水（近三个月，需要银行盖章）</li>
                    <li>6.中行账号或者借记卡（自动还款用）</li>
                    <li>7.如有经营企业提供营业执照与银行流水（如需要的话要提供公司章程或股东证明）</li>
                    <li>8.收入证明（如没有，可以带上公章）</li>
                    <li>9.如已有轿车请提供行车证</li>
                    <li>10.如有其他金融资产请提供，包括：基金、股票。</li>
                    <li>12.大额分期费率：一年6%（含保险、手续费、利率） ，二年11%（履约险），三年15%</li>
                    <li>13.大概一个月才批下来</li>
                    </ul>
                    </span>
                    <span>
                    <b class='dl1'>B 爱家分期</b>
                    <b class='dl2'>授信政策：</b>
                    <ul class='dl3'>
                    <li>1.按照最高购房首付款的50%授信。存量房贷客户也可以按照最高原贷款金额或抵押物市场价值*70%（商业用房不超过60%）—贷款余额授信（需抵押）。</li>
                    <li>2.如客户在我行有多笔未结清房贷，可按以上标准累计计算，最高金额不超过50万元。</li>
                    <li>3.已在我行办理信用类分期授信业务的客户，可按本方案授信政策可给予金额减去原有我行信用类分期（大额分期、家装分期、易达钱）的授信余额授信。</li>
                    <li>4.最快一个星期可以放款，爱家分期必须在中行贷。</li>
                    </ul>
                    <b class='dl2'>期限、手续费率：</b>
                    <ul class='t1'>
                    <li><b>期限</b><b>12期</b><b>24期</b><b>36期</b><b>48期</b><b>60期</b></li>
                    <li><p>标准费率</p><p>6%</p><p>10%</p><p>15%</p><p>17%</p><p>20%</p></li>
                    <li><p>优惠费率（二押）</p><p>4%</p><p>8%</p><p>12%</p><p>15%</p><p>18%</p></li>
                    <li><p>** 信用类爱家分期手续费一次性收取，通过二押担保方式办理可手续费可分期，另申请期限不可超过房贷剩余期限。</p></li>
                    </ul>
                    <b class='dl2'>客户所需资料：</b>
                    <ul class='dl3'>
                    <li>1.新增：身份证明（夫妻)、婚姻证明、户口本</li>
                    <li style='border-bottom:1px solid #dededf;'>2.存量：身份证明（夫妻)、婚姻证明、户口本、收入证明、银行流水</li>
                    </ul>
                    </span>
                    <span style='margin-top:600px;'>
                    <b class='dl1' style=' margin-bottom:0px !important;'>产品比较</b>
                    <ul class='t2'>
                    <li><b>产品类型</b><b>产品特点</b><b>支付方式</b><b>额度</b><b>期限</b><b>房贷目标客户</b><b>客户提供资料</b></li>
                    <li><p>大额分期</p><p>根据客户家庭资产负债、还款能力、职业等要素授信。</p><p>受托支付</p><p>最高50万元</p><p>最长3年</p><p>行内存量房贷客户</p><p>申请表、分期借款协议，收入、工作、身份、婚姻证明、房产证明、房产查册、评估结果、用途证明。</p></li>
                    <li><p>爱家分期</p><p>客户房贷首付的50%；房贷金额或抵押物价值*70%与余额的差授信。</p><p>30万以内自主支付；30万以上受托支付。</p><p>最高50万元</p><p>最长5年</p><p>新增、存量房贷客户</p><p>申请表、承诺函、收入证明（存量房
                    贷客户提交），用途证明（授信30万
                    以上）。</p></li>
                    </ul>
                    </span>
                    </div>
                    </div>
                    </div>";
        }elseif ($action=="ccb"){
        $title="建设银行-装修贷款";
        $content="<div id='daikuan'>
                        <div class='content' style=' height:2130px'>
                        <span><img src='../../public/image/dk.jpg' class='topimg'></span>
                        <p class='title'>装修贷款</p>
                        <p class='title2'>请选择银行</p>
                        <span><a href='../../?a=provide_boc' onMouseOver='switch6('80','60')'>中国银行</a><a href='../../?a=provide_ccb' onMouseOver='switch6('120','200')'  style='color:#abc808'>中国建设银行</a>
                        <div class='sliders' style='width:120px; margin-top:55px; margin-left:200px;' ></div>
                        <script type='text/javascript'>
                        	function switch6(a,b){
                        	var a =  a + 'px';
                        	var b =  b + 'px';
                         	$('#daikuan .content .sliders').css('width',a);
                            $('#daikuan .content .sliders').animate({'margin-left':b},150);
                        };
                        </script></span>
                        <div>
                        <span><img src='../../public/image/jsyh.png'></span>
    
                        <span class='dl0'>贷款方式</span>
                        <span>
                        <b class='dl1'>业务介绍</b>
                        <ul class='dl3'>
                        <li>中国建设银行为有装修需求的客户推出装修分期业务，零首付，零利息，低手续费，最高可享50万额度。缓解您家庭装修费用资金压力，满足您家庭装修各项消费需求，如购买装修材料、家电、家具、家居生活用品等，助您轻松实现家的精彩设想。</li>
                        </ul>
                        </span>
                        <span>
                        <b class='dl1'>业务亮点</b>
                        <ul class='dl3'>
                        <li>1.额度保障：免抵押，免担保，额度最高50万。</li>
                        <li>2.还款灵活：可自由选择还款期限，最长48期分月还款，提前结清不需扣取剩余手续费。</li>
                        <li>3.用途广泛：贷款资金可用于家庭装修款，购买装修材料、家电、家具、家居生活用品等。</li>
                        </ul>
                        <b class='dl2'>手续费收费标准</b>
                        <ul class='t3'>
                        <li><b>期数</b><b>基准费率</b><b>分期10万元对应的手续费</b><b>分期10万元对应每月的还款金额</b></li>
                        <li><p>-</p><p style='color:#000'>分期收取</p><p  style='color:#000'>分期收取</p><p  style='color:#000'>分期本金、分期手续费</p></li>
                        <li><p>6期</p><p>0.34%</p><p>340元/月</p><p>17006元/月</p></li>
                        <li><p>12期</p><p>0.34%</p><p>340元/月</p><p>8673元/月</p></li>
                        <li><p>18期</p><p>0.34%</p><p>340元/月</p><p>5895元/月</p></li>
                        <li><p>24期</p><p>0.34%</p><p>340元/月</p><p>4506元/月</p></li>
                        <li><p>36期</p><p>0.34%</p><p>340元/月</p><p>3117元/月</p></li>
                        <li><p>48期</p><p>0.34%</p><p>340元/月</p><p>2423元/月</p></li>
                        <li><p>**手续费如有调整将通过官网发布</p></li>
                        </ul>
                        </span>
                        <span style='margin-top:520px;'>
                        <b class='dl1'>办理流程</b>
                        <ul class='dl3'>
                        <li>1.提交申请</li>
                        <li>2.银行审批及放款</li>
                        <li>3.刷卡交易</li>
                        <li style='color:#898989'>支用贷款资金于家庭装修款，购买装修材料、家电、家具、家居生活用品等。</li>
                        </ul>
                        </span>
                        <span >
                        <b class='dl1'>办理一览表</b>
                        <ul class='dl3'>
                        <li>1.申请人身份证</li>
                        <li>2.待装修房屋的房屋证明</li>
                        <li style='color:#898989'>资料（四选一）：房产证、备案登记表、购房发票或房贷合同。</li>
                        <li>3.财力证明</li>
                        <li style='color:#898989'>包括：银行流水（含工资、存款、理财产品等），社保卡、公职金流水，营业执照及税单，其他房产或商铺房产证件，其他可核实财力证明等。</li>
                        <li style='color:#898989'>注：如房产在配偶、父母、子女名下，需提供其身份证件、结婚证或户口本。</li>
                        </ul>
                        </span>
    
                        </div>
                        </div>
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