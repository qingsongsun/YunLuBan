<?php 
header("content-type:text/html;charset=utf-8");
    //echo var_dump($_GET);
    require 'smarty.inc.php';
    global  $_smarty;
    

    $title="398套餐";
    
    $css="<link rel='stylesheet'  type='text/css' href='../../public/css/web_style.css'>
            <link rel='stylesheet'  type='text/css' href='../../public/css/style-398.css'>";
    
    $script="<script src='../../public/js/jquery-1.11.3.min.js' type='text/javascript'></script>
            <script src='../../public/js/scrolltop-nav.js' type='text/javascript'></script>
            <script type='text/javascript'>
                $(function(){
                    $('#cityjqon').click(function(){
                    	$('#cityjq').slideToggle('slow');
                    });
                
                    $('.bximgjq a').mouseover(function(){
                        var a = $(this).index();
                        var b = '../../public/image/0zx0'+a+'.jpg'
                        $('.bximg').attr('src',b);
                     });
                });
            </script>";
    
    $content="<!--=========================================web-398=================================================-->
            <div id='body' class='web-398'></div>
            <div id='web-398' data-background='img/forest.jpg' >
            <span><p>398</p><p>元/㎡</p></span>
            <span>超值基础装修套餐</span>
            <span>优质辅材 + 标准化施工</span>
            <a href='../../?c=admin&a=work_order'>我要预约</a>
            </div>
        
            <!--=========================================service=================================================-->
            <div id='service'>
            <ul>
            <li><img src='../../public/image/398xt01.png'><br/>免费验房</li>
            <li><img src='../../public/image/398xt02.png'><br/>免费设计报价</li>
            <li><img src='../../public/image/398xt03.png'><br/>材料检测系统</li>
            <li><img src='../../public/image/398xt04.png'><br/>集中采购系统</li>
            <li><img src='../../public/image/398xt05.png'><br/>质量严控系统</li>
            <li><img src='../../public/image/398xt06.png'><br/>客户服务系统</li>
            <li class='dh' onMouseOver='dh2('398xt08')' onMouseOut='dh3('398xt07')'><a href='../../?a=provide_boc' style='color:#f4981c'><img src='../../public/image/398xt07.png' ><br/>装修贷款</a></li>
            </ul>
            </div>
            <script type='text/javascript'>
            function dh2(a){
            	var a ='../../public/image/'+a+'.png';
            	$('.dh img').attr('src',a);
            	}
            	
            function dh3(a){
            	var a ='../../public/image/'+a+'.png';
            	$('.dh img').attr('src',a);
            	}
            </script>
            
            <!--=========================================free=================================================-->
            <div id='free'>
            <span>9大费用全免</span>
            <span><P>咨询费</P><P>|</P> <P>免费验房</P><P>|</P><P>免费量房</P><P>|</P><P>设计费</P><P>|</P><P>制图费</P><P>|</P><P>管理费</P><P>|</P><P>成品保护费</P><P>|</P><P>保洁费</P><P>|</p><P>垃圾清理费</P></span>
            </div>
            
            <!--=========================================list_398=================================================-->
            <div id='list_398' >
            <p class='title' >398套餐内容</p>
            <p class='title2' >优质辅材结合标准化施工流程，让你的家装打好基础，不再有试错模式。</p>
            <div class='content'>
            <ul>
            <li class='lion' >大厅 / 餐厅</li>
            <li >主卧 / 次卧</li>
            <li >厨房</li>
            <li  >卫浴</li>
            <li>过道</li>
            <li >入户花园 / 阳台</li>
            <li  >强弱电</li>
            <li >其他</li>
            </ul>
            
            </div>
            <script type='text/javascript'>
            $(function(){
            	
            	$('#list_398 .content ul > li').mouseover(function(){
                    $(this).addClass('lion').siblings().removeClass('lion');
                    var a = $(this).index();
                    $('#list_398 .scontent span').eq(a).addClass('block').siblings().removeClass('block');
            });
            });
            </script>
            <div class='scontent'>
            
            <span class='scontent_list block'>
            <ul><li>材料说明</li><li>数量</li><li>详细说明</li></ul>
            <ul><li>大理石门槛铺设</li><li>按施工图</li><li>大理石门槛的人工铺设费。</li></ul>
            <ul><li>地面铺抛光砖/抛釉砖</li><li>按施工图</li><li>国标32.5R水泥,淡水沙及人工，填缝剂勾缝(不含砖及地面保护材料,若水泥浆层厚度超过6厘米,每加厚1厘米,加7元/㎡,防滑砖、抛光砖规格在30*30～80*80以内,超大小、斜铺、镶边镶点均另计)。</li></ul>
            <ul><li>墙身贴平墙式脚线</li><li>按施工图</li><li>国标32.5R水泥,淡水沙及人工(含凿墙,不含脚线)。</li></ul>
            <ul><li>墙面煽灰+刷ICI</li><li>根据现场</li><li>专用胶水拌复粉批三～四遍,精细打磨,2*2胶条镶边,及人工(选色加10元/㎡);'多乐士'墙面漆(2底+2面)。</li></ul>
            <ul><li>顶面煽灰+刷ICI</li><li>根据现场</li><li>专用胶水拌复粉批三～四遍,精细打磨,2*2胶条镶边,及人工(选色加10元/㎡);'多乐士'墙面漆(2底+2面)。</li></ul>
            </span>
            
            <span class='scontent_list' >
            <ul><li>材料说明</li><li>数量</li><li>详细说明</li></ul>
            <ul><li>大理石门槛铺设</li><li>按施工图</li><li>大理石门槛的人工铺设费。</li></ul>
            <ul><li>地面找平<br/>(适用于铺设复合地板)</li><li>按施工图</li><li>国标32.5R水泥,淡水沙及人工(若水泥浆层厚度超过6厘米,每加厚1厘米,加7元/㎡)。</li></ul>
            <ul><li>墙面煽灰+刷ICI</li><li>根据现场</li><li>专用胶水拌复粉批三～四遍,精细打磨,2*2胶条镶边,及人工(选色加10元/㎡);'多乐士'墙面漆(2底+2面)。</li></ul>
            <ul><li>顶面煽灰+刷ICI</li><li>根据现场</li><li>专用胶水拌复粉批三～四遍,精细打磨,2*2胶条镶边,及人工(选色加10元/㎡);'多乐士'墙面漆(2底+2面)。</li></ul>
            <ul><li>窗台铺抛光砖/大理石</li><li>按施工图</li><li>国标32.5R水泥及人工,填缝剂勾缝(不含抛光砖/大理石及圆角处理)。</li></ul>
            <ul><li>修补门洞</li><li>根据现场</li><li>红砖/轻质砖砌墙，国标32.5R水泥及淡水沙(安装门加150元/套)。</li></ul>
            </span>
            
            <span class='scontent_list' >
            <ul><li>材料说明</li><li>数量</li><li>详细说明</li></ul>
            <ul><li>大理石门槛铺设</li><li>按施工图</li><li>大理石门槛的人工铺设费。</li></ul>
            <ul><li>地面铺防滑砖不拼花</li><li>按施工图</li><li>国标32.5R水泥,淡水沙及人工，填缝剂勾缝(不含砖及地面保护材料,若水泥浆层厚度超过6厘米,每加厚1厘米,加7元/㎡,防滑砖、抛光砖规格在30*30～80*80以内,超大小、斜铺、镶边镶点均另计)。</li></ul>
            <ul><li>墙身防水、防潮处理</li><li>根据现场</li><li>'防渗宝'专业防水、防渗涂料。</li></ul>
            <ul><li>墙面贴瓷片不拼花</li><li>根据现场</li><li>国标32.5R水泥,淡水沙及人工,填缝剂勾缝(不含瓷片)。</li></ul>
            <ul><li>冷热给水管安装</li><li>按施工图</li><li>2~2.5分联塑PPR管、含配件,人工安装费。</li></ul>
            <ul><li>排水管安装</li><li>按施工图</li><li>'联塑'PVC配件、含配件,人工安装费。</li></ul>
            <ul><li>水龙头及五金安装</li><li>按施工图</li><li>生料带等辅助材料及人工(不含水龙头、卫浴五金及玻璃制品安装)。</li></ul>
            <ul><li>修补门洞</li><li>根据现场</li><li>红砖/轻质砖砌墙，国标32.5R水泥及淡水沙(安装门加180元/套)。</li></ul>
            </span>
            
            <span class='scontent_list' >
            <ul><li>材料说明</li><li>数量</li><li>详细说明</li></ul>
            <ul><li>大理石门槛铺设</li><li>按施工图</li><li>大理石门槛的人工铺设费。</li></ul>
            <ul><li>沉箱底二次排水处理</li><li>根据现场</li><li>国标32.5R水泥沙浆铺斜坡快速排水及人工。</li></ul>
            <ul><li>沉箱处理</li><li>按施工图</li><li>国标32.5R水泥,淡水沙及人工(含凿墙,不含脚线)。</li></ul>
            <ul><li>防水、防潮处理</li><li>根据现场</li><li>'防渗宝'专业防水、防渗涂料(全部墙面及地面)。</li></ul>
            <ul><li>地面铺设防滑砖</li><li>按施工图</li><li>国标32.5R水泥,淡水沙及人工,填缝剂勾缝(不含砖及地面保护材料,若水泥浆层厚度超过6厘米,每加厚1厘米,加7元/㎡,防滑砖、抛光砖规格在30*30,超大小、斜铺、镶边镶点均另计)。</li></ul>
            <ul><li>墙身铺贴瓷片不拼花</li><li>根据现场</li><li>国标32.5R水泥,淡水沙及人工,填缝剂勾缝(不含瓷片)。</li></ul>
            <ul><li>冷热给水管安装</li><li>按施工图</li><li>2~2.5分联塑PPR管、含配件,人工安装费。</li></ul>
            <ul><li>水龙头及五金安装</li><li>按施工图</li><li>生料带等辅助材料及人工(不含水龙头、卫浴五金及玻璃制品安装）。</li></ul>
            <ul><li>马桶/蹲厕安装</li><li>按施工图</li><li>膨胀螺丝，国标32.5R水泥,中性玻璃胶，不含厕具</li></ul>
            <ul><li>地漏安装</li><li>按施工图</li><li>仅人工(不含不锈钢地漏)。</li></ul>
            <ul><li>淋浴房挡水条</li><li>按施工图</li><li>国标32.5R水泥,淡水沙及人工(不含挡水线)。</li></ul>
            <ul><li>修补门洞</li><li>根据现场</li><li>红砖/轻质砖砌墙，国标32.5R水泥及淡水沙(安装门加180元/套)。</li></ul>
            </span>
            
            
            <span class='scontent_list'>
            <ul><li>材料说明</li><li>数量</li><li>详细说明</li></ul>
            <ul><li>地面铺抛光砖/抛釉砖</li><li>按施工图</li><li>国标32.5R水泥,淡水沙及人工，填缝剂勾缝(不含砖及地面保护材料,若水泥浆层厚度超过6厘米,每加厚1厘米,加7元/㎡,防滑砖、抛光砖规格在30*30～80*80以内,超大小、斜铺、镶边镶点均另计)。</li></ul>
            <ul><li>波打线铺设</li><li>按施工图</li><li>国标32.5R水泥,淡水沙及人工(含凿墙,不含脚线)。</li></ul>
            <ul><li>墙面煽灰+刷ICI</li><li>根据现场</li><li>专用胶水拌复粉批三～四遍,精细打磨,2*2胶条镶边,及人工(选色加10元/㎡);'多乐士'墙面漆(2底+2面)。</li></ul>
            <ul><li>顶面煽灰+刷ICI</li><li>根据现场</li><li>专用胶水拌复粉批三～四遍,精细打磨,2*2胶条镶边,及人工(选色加10元/㎡);'多乐士'墙面漆(2底+2面)。</li></ul>
            </span>
            
            <span class='scontent_list' >
            <ul><li>材料说明</li><li>数量</li><li>详细说明</li></ul>
            <ul><li>地面铺防滑砖不拼花</li><li>根据现场</li><li>国标32.5R水泥,淡水沙及人工，填缝剂勾缝(不含砖及地面保护材料,若水泥浆层厚度超过6厘米,每加厚1厘米,加7元/㎡,防滑砖、抛光砖规格在30*30～80*80以内,超大小、斜铺、镶边镶点均另计)。</li></ul>
            <ul><li>地面防水处理</li><li>根据现场</li><li>'防渗宝'专业防水、防渗涂料。</li></ul>
            <ul><li>顶面煽灰+刷ICI</li><li>根据现场</li><li>国标32.5R水泥,淡水沙及人工(含凿墙,不含脚线)。</li></ul>
            <ul><li>冷给水管安装</li><li>按施工图</li><li>2~2.5分联塑PPR管、含配件,人工安装费。</li></ul>
            <ul><li>排水管安装</li><li>按施工图</li><li>'联塑'PVC配件、含配件，人工安装费。</li></ul>
            <ul><li>水龙头及五金安装</li><li>按施工图</li><li>生料带等辅助材料及人工(不含水龙头、卫浴五金及玻璃制品安装）。</li></ul>
            <ul><li>地漏安装</li><li>按施工图</li><li>仅人工(不含不锈钢地漏)。</li></ul>
            </span>
            
            <span class='scontent_list'>
            <ul><li>材料说明</li><li>数量</li><li>详细说明</li></ul>
            <ul><li>灯开关布线</li><li>按施工图</li><li>'铁城'牌1.5㎡多芯铜线,套'联塑'PVC管,过梁、柱套黄腊管,中间不续线,回路灯计2位,筒灯、射灯、灯管连线2盏计1位。</li></ul>
            <ul><li>插座布线</li><li>按施工图</li><li>'铁城'牌2.5㎡多芯铜线,套'联塑'PVC管，过梁、柱用黄腊管,中间不续线(大厅地面铜插座计2位)。</li></ul>
            <ul><li>空调布线</li><li>按施工图</li><li>'铁城'牌4㎡多芯铜线,套'联塑'PVC管，过梁柱用黄腊管,中间不续线。</li></ul>
            <ul><li>开关、插座面板</li><li>按施工图</li><li>雅点面板。</li></ul>
            <ul><li>面板及灯具安装</li><li>按施工图</li><li>'3M'电胶布、平头镙丝等辅助材料及人工(不包面板和灯,及不含安装水晶灯)。</li></ul>
            <ul><li>强电配电箱安装</li><li>按施工图</li><li>佛山展业十位以内配电箱(增大另计),含空气开关、漏电开关,其它材料价格另计(原强电箱保留)。</li></ul>
            <ul><li>电视布线</li><li>按施工图</li><li>双屏蔽电视线,套'联塑'PVC管(含客厅、主人房两项，增加另计)。</li></ul>
            <ul><li>电话布线</li><li>按施工图</li><li>'讯宝'牌4芯电话线,套'联塑'PVC管(含客厅，增加另计)。</li></ul>
            <ul><li>电脑网络布线</li><li>按施工图</li><li>超五类网线,套'联塑'PVC管(含客厅、主人房、书房，增加另计)。</li></ul>
            <ul><li>弱电箱安装</li><li>按施工图</li><li>佛山展业专用弱电箱,含电视分配器、安装费。</li></ul>
            <ul><li>墙身管线开槽</li><li>按施工图</li><li>墙身开介线槽暗装水管、电线管，仅人工。</li></ul>
            </span>
            
            <span class='scontent_list'>
            <ul><li>材料说明</li><li>数量</li><li>详细说明</li></ul>
            <ul><li>线槽批荡、补贴外墙砖</li><li>根据现场</li><li>国标32.5R水泥、淡水沙及人工(不含外墙砖)。</li></ul>
            <ul><li>工程所用材料运输费<br/>(报价内的项目)</li><li>根据现场</li><li>所有装修材料采购运输到小区外的定点材料堆放点,人工搬运材料到一楼电梯后采用电梯上楼(水泥、沙打包运输),(管理处不允许上电梯必须别计),不含业主自购材料。</li></ul>
            <ul><li>成品保护费<br/>(按建筑面积计算)</li><li>根据现场</li><li>新铺装地面保护及窗台大理石保护(专用保护膜)、阳台铝合金门U型下槛保护、线管保护、卫浴成品保护(新装台盆、马桶等)、可视门铃、煤气表、新装热水器等。</li></ul>
            <ul><li>工程施工阶段垃圾清<br/>理、运输、清洁</li><li>根据现场</li><li>施工范围内的所有垃圾必须打包搬运到小区定点堆放处,及完工后的清场。</li></ul>
            <ul><li>管理费用</li><li>按项目</li><li>单选此套餐另加工程管理费3000元;选用本平台'主材风格包'可免去此部分费用。</li></ul>
            <ul><li>设计费</li><li>按设计</li><li>(此项目免费)。</li></ul>
            </span>
            </div>
            </div>
        
            <!--=========================================fucai=================================================-->
            <div id='fucai'>
            <p class='title' >8大优质辅材</p>
            <p class='title2' >优质的辅料才是决定我们装修的质量</p>
            <div class='content'>
            <span><img src='../../public/image/398-8df01.jpg'><p><b>1</b>多乐士ICI</p></span>
            <span><img src='../../public/image/398-8df02.jpg'><p><b>2</b>铁城电线</p></span>
            <span><img src='../../public/image/398-8df03.jpg'><p><b>3</b>电插面板</p></span>
            <span><img src='../../public/image/398-8df04.jpg'><p><b>4</b>联塑水管</p></span>
            <span><img src='../../public/image/398-8df05.jpg'><p><b>5</b>超五类网线</p></span>
            <span><img src='../../public/image/398-8df06.jpg'><p><b>6</b>水泥</p></span>
            <span><img src='../../public/image/398-8df07.jpg'><p><b>7</b>淡水河沙</p></span>
            <span><img src='../../public/image/398-8df08.jpg'><p><b>8</b>伟伯防水材料</p></span>
            </div>
            </div>
            
            <!--=========================================shigong=================================================-->
            <div id='shigong'>
            <p class='title' >7项标准化施工</p>
            <p class='title2' >标准化的施工工艺，严格的检验标准，保障施工按质量完成</p>
            <div class='content'>
            <a href='javascript:void(0)' class='left' ></a>
            <span class='ct'>
            <ul>
            <li><img src='../../public/image/398-8x01.jpg'><p>1.给排水</p></li>
            <li><img src='../../public/image/398-8x02.jpg'><p>2.电工</p></li>
            <li><img src='../../public/image/398-8x03.jpg'><p>3.泥水工</p></li>
            <li><img src='../../public/image/398-8x04.jpg'><p>4.防水工程</p></li>
            <li><img src='../../public/image/398-8x05.jpg'><p>5.油漆工</p></li>
            <li><img src='../../public/image/398-8x06.jpg'><p>6.卫浴五金安装</p></li>
            <li><img src='../../public/image/398-8x08.jpg'><p>7.辅材上楼运输</p></li>
            </ul>
            </span>
            <a href='javascript:void(0)' class='right'></a>
            </div>
            </div>
            <script type='text/javascript'>
             $('.right').click(function(){
                $('.ct').animate({scrollLeft:'+=319px'},200);
              });
               $('.left').click(function(){
                $('.ct').animate({scrollLeft:'-=319px'},200);
              });
            </script>
        
            <!--=========================================buxian=================================================-->
            <div id='buxian'>
            <p class='title' >0增项7不限<span>施工合同签署后, 绝不额外收取任何费用</span></p>
            <p class='title2' >施工合同签署后，绝不额外收取任何费用</p>
            <div class='content'>
            <span class='bximgjq'>
            <a href='javascript:void(0)' onMouseMove='bximg('0zx00')'>1. 电插、灯位不限</a>
            <a href='javascript:void(0)' onMouseMove='bximg('0zx01')'>2. 地面铺贴面积不限</a>
            <a href='javascript:void(0)' onMouseMove='bximg('0zx02')'>3. 给排水位置不限</a>
            <a href='javascript:void(0)' onMouseMove='bximg('0zx03')'>4. 洗手间、厨房墙面贴砖面积不限</a>
            <a href='javascript:void(0)' onMouseMove='bximg('0zx04')'>5. 墙面、天花批灰、ICI面积不限</a>
            <a href='javascript:void(0)' onMouseMove='bximg('0zx05')'>6. 门洞修补不限</a>
            <a href='javascript:void(0)' onMouseMove='bximg('0zx07')'>7. 地面水泥沙找平4CM内不限</a>
            </span>
            <img src='../../public/image/0zx00.jpg' class='bximg'>
            </div>
            </div>
            
            <!--=========================================ziji=================================================-->
            <div id='ziji'>
            <p class='title' >自有工人<span>自己人更放心</span></p>
            <p class='title2' >独家承诺我们的工程绝不分包与外包，随时接受您的监管</p>
            <div class='content'>
            <img src='../../public/image/398zjr.jpg'>
            <ul>
            <li>云鲁班</li>
            <li>属于企业的正式员工</li>
            <li>择优录用</li>
            <li>定期培训</li>
            <li>持证上岗</li>
            <li>有健全的劳动保险</li>
            <li>业务考核</li>
            <li>有员工福利</li>
            </ul>
            <ul>
            <li>传统分包</li>
            <li>不属于企业员工</li>
            <li>人员不固定</li>
            <li>跟着工队干</li>
            <li>随时走人，不干就不干</li>
            <li>没有健全的劳动保障</li>
            <li>分包干活中间有利润</li>
            <li>-</li>
            </ul>
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