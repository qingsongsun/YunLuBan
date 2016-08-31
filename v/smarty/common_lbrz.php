<?php 
header("content-type:text/html;charset=utf-8");
    //echo var_dump($_GET);
    require 'smarty.inc.php';
    global  $_smarty;

    $title="拎包入住";

    $css="<link rel='Bookmark' href='http://wushang.co/favicon.ico'>
            <link rel='stylesheet'  type='text/css' href='../../public/css/web_style.css'>
            <link rel='stylesheet'  type='text/css' href='../../public/css/style-lbrz.css'>";

    $script="<script src='../../public/js/jquery-1.11.3.min.js' type='text/javascript'></script>
            <script src='../../public/js/scrolltop-nav.js' type='text/javascript'></script>
            <script type='text/javascript' src='../../public/js/lbrz.js'></script>";

    
    //value默认为20
    $value=$_GET['value'];
    if (!$value)$value=20;
     //id默认10
    $id=$_GET['id'];
    if(!$id)$id=10;
    
    //所选套餐
    $tcm=getOne("select name from info where id=$id")[name];
    //所选小区
    $xqm=getOne("select * from info where id=$value")[name];
    
     //查询指定套餐内容
    $setmeal=getOne("select info.*,setmeal.pic from info,setmeal where info.id=setmeal.infoId and setmeal.`name`='客厅' and info.id=$id");
    $dh=getAll("select info.id,info.`name` from info,setmeal where info.id=setmeal.infoId group by info.name order by id asc");//查询所有套餐
    if ($dh)foreach ($dh as $val){
        $tc.="<li><a href='common_lbrz.php?c=lbrz&id=$val[id]&value=$value'>$val[name]</a></li>";
    }
    
    //id条件查询套餐所有图片
    $lbt=getAll("select setmeal.* from info,setmeal where info.id=setmeal.infoId and info.id=$id");
    if ($lbt)foreach ($lbt as $lb){
        $tp.="<li><img src='../../".$lb[pic]."' ></li>";
        $dz.="<li><a href='javascript:void(0);' >$lb[name]</a></li>";
    }
    
    //查询所有可选小区
    $areas=getAll("select * from info where infotypeId=7");
    if ($areas)foreach ($areas as $xq){
        $xzxq.="<li><a href='common_lbrz.php?value=$xq[id]&id=$id'>$xq[name]</a></li>";
    }
    
    //展示选定小区面积
    $area=getAll("select * from info where value2=$value");
    if ($area)foreach ($area as $mj){
        $xzmj.="<li><a href='javascript:void(0)'>$mj[name]</a></li>";
    }
    
    if ($id==10){
        $scontent="<div class='scontent'>
           
            <span class='scontent_list block' >
            <ul><li>材料说明</li><li>数量</li><li>详细说明</li></ul>
            <ul><li>地面找平<br/>(适用于铺设复合地板)</li><li>按施工图</li><li>国标32.5R水泥,淡水沙及人工(若水泥浆层厚度超过6厘米,每加厚1厘米,加7元/㎡)。</li></ul>
            <ul><li>大理石铺设/地面铺抛<br/>光砖/抛釉砖/防滑砖</li><li>按施工图</li><li>国标32.5R水泥,淡水沙及人工，填缝剂勾缝(不含砖及地面保护材料,若水泥浆层厚度超过6厘米,每加厚1厘米,加7元/㎡,防滑砖、抛光砖规格在30X30～80X80以内,超大小、斜铺、镶边镶点均另计)。</li></ul>
            <ul><li>墙身贴平墙式脚<br/>线/波打线铺设</li><li>按施工图</li><li>国标32.5R水泥,淡水沙及人工(含凿墙,不含脚线)。</li></ul>
            <ul><li>墙面/顶面煽灰+刷ICI</li><li>根据现场</li><li>专用胶水拌复粉批三～四遍,精细打磨,2X2胶条镶边,及人工(选色加10元/㎡);'多乐士'墙面漆(2底+2面)。</li></ul>
            <ul><li>墙面/墙身贴瓷片不拼花</li><li>根据现场</li><li>国标32.5R水泥,淡水沙及人工,填缝剂勾缝(不含瓷片)。</li></ul>
            <ul><li>修补门洞</li><li>根据现场</li><li>红砖/轻质砖砌墙,国标32.5R水泥及淡水沙(安装门加150元/套)。</li></ul>
            <ul><li>墙身管线开槽</li><li>按施工图</li><li>墙身开介线槽暗装水管、电线管,仅人工。</li></ul>
            <ul><li>线槽批荡、补贴外墙砖</li><li>根据现场</li><li>国标32.5R水泥、淡水沙及人工(不含外墙砖)。</li></ul>
            <ul><li>沉箱底二次排水处理</li><li>按施工图</li><li>国标32.5R水泥沙浆铺斜坡快速排水及人工。</li></ul>
            <ul><li>沉箱处理</li><li>按施工图</li><li>8厘钢筋、国标32.5R水泥及淡水沙倒制层板,红砖/轻质砖架空,水泥沙浆找平(5㎡以内,超出加220元/㎡)。</li></ul>
            <ul><li>防水、防潮处理</li><li>根据现场</li><li>'防渗宝'专业防水、防渗涂料(全部墙面及地面)。</li></ul>
            <ul><li>排水管/排污管安装</li><li>按施工图</li><li>'联塑'PVC配件、含配件,人工安装费。</li></ul>
            <ul><li>马桶/蹲厕安装</li><li>按施工图</li><li>膨胀螺丝,国标32.5R水泥,中性玻璃胶,不含厕具。</li></ul>
            <ul><li>淋浴房挡水条</li><li>按施工图</li><li>国标32.5R水泥,淡水沙及人工(不含挡水线)。</li></ul>
            <ul><li>冷给水管安装/排水管安装</li><li>按施工图</li><li>2~2.5分联塑PPR管、'联塑'PVC配件、含配件,人工安装费。</li></ul>
            <ul><li>水龙头/地漏及五金安装</li><li>按施工图</li><li>生料带等辅助材料及人工(不含水龙头、卫浴五金及玻璃制品安装)。</li></ul>
            <ul><li>灯开关布线</li><li>按施工图</li><li>'铁城'牌1.5㎡多芯铜线,套'联塑'PVC管,过梁、柱套黄腊管,中间不续线,回路灯计2位,筒灯、射灯、灯管连线2盏计1位。'铁城'牌芯铜线,套'联塑'PVC管,过梁、柱用黄腊管,中间不续线(大厅地面铜插座计2位)轻钢龙骨架,30X30铝扣板。</li></ul>
            <ul><li>开关、插座面板/灯具安装</li><li>按施工图</li><li>雅点面板/'3M'电胶布、平头镙丝等辅助材料及人工(不包灯及不含安装水晶灯)。</li></ul>
            <ul><li>强/弱电配电箱安装</li><li>按施工图</li><li>佛山展业十位以内配电箱(增大另计),含空气开关、漏电开关,其它材料价格另计(原强电箱保留);佛山展业专用弱电箱,含电视分配器、安装费。</li></ul>
            <ul><li>电视/电话/电脑网络布线</li><li>按施工图</li><li>双屏蔽电视线,套'联塑'PVC管(含客厅、主人房两项,增加另计);'讯宝'牌4芯电话线,套'联塑'PVC管(含客厅,增加另计);超五类网线,套'联塑'PVC管(含客厅、主人房、书房,增加另计)。</li></ul>
            <ul><li>工程所用材料运输费<br/>(报价内的项目)</li><li>根据现场</li><li>所有装修材料采购运输到小区外的定点材料堆放点,人工搬运材料到一楼电梯后采用电梯上楼(水泥、沙打包运输),(管理处不允许上电梯必须别计),不含业主自购材料。</li></ul>
            <ul><li>成品保护费<br/>(按建筑面积计算)</li><li>根据现场</li><li>新铺装地面保护及窗台大理石保护(专用保护膜)、阳台铝合金门U型下槛保护、线管保护、卫浴成品保护(新装台盆、马桶等)、可视门铃、煤气表、新装热水器等。</li></ul>
            <ul><li>垃圾清理、运输、清洁</li><li>根据现场</li><li>施工范围内的所有垃圾必须打包搬运到小区定点堆放处,及完工后的清场。</li></ul>
            
            </span>
            
            <span class='scontent_list' >
            <ul><li>项目名称</li><li>数量</li><li>详细说明</li></ul>
            <ul><li>整屋瓷砖</li><li>按施工图</li><li>1、惠邦陶瓷;
            2、客厅、餐厅地砖:800X800mm;
            3、浴室、厨房、阳台地砖:300X300mm;
            4、浴室墙身:300X600mm;
            5、厨房墙身:300X600mm;
            6、地脚线:110X800mm。</li></ul>
            <ul><li>房间复合地板</li><li>按施工图</li><li>1、龙祥凤禧;
            2、复合地板:800X120X12mm;
            3、包脚线。</li></ul>
            <ul><li>卫浴五金</li><li>以2套为基础</li><li>1、柏仑卫浴;
            2、铝材淋浴屏;
            3、浴室柜:型号1838,600mm长;
            4、二联淋浴花洒:型号D-1027;
            5、虹吸式连体马桶:690X370X725mm;
            6、五金杂件:地漏、角阀、软管。</li></ul>
            <ul><li>门类</li><li>按施工图</li><li>1、家昌木门:房间门(免漆实心复合门);2、大家旺:厨房趟门;3、大家旺:浴室门。</li></ul>
            <ul><li>灯类</li><li>按施工图</li><li>吸顶灯/勤能筒灯/勤能射灯。</li></ul>
            <ul><li>窗台石</li><li>按施工图</li><li>大理石(广西白)。</li></ul>
            <ul><li>门槛石</li><li>9条</li><li>大理石（红色/黑色）。</li></ul>
            <ul><li>铝扣板天花</li><li>按施工图</li><li>特维城邦；轻钢龙骨架,300X300mm铝扣板。</li></ul>
            <ul><li>洗菜盘</li><li>1个</li><li>/</li></ul>
            <ul><li>厨房水龙头</li><li>1个</li><li>/</li></ul>
            <ul><li>橱柜</li><li>按施工图</li><li>卡丹利;
            1、柜身:防潮板;2、门:防潮板;
            3、台面石:石英石。</li></ul>
            <ul><li>抽油烟机</li><li>1套</li><li>樱花/欧派(厂家直供)。</li></ul>
            <ul><li>炉灶</li><li>1套</li><li>樱花/欧派(厂家直供)。</li></ul>
            <ul><li>消毒碗柜</li><li>1套</li><li>樱花/欧派)厂家直供)。</li></ul>
            </span>
            
            <span class='scontent_list' i>
            <ul><li>项目名称</li><li>数量</li><li>详细说明</li></ul>
            <ul><li>窗帘盒</li><li>按施工图</li><li>1、9厘夹板造型;
            2、乳胶漆基础已含。</li></ul>
            <ul><li>石膏线</li><li>按施工图</li><li>面刷米白色乳胶漆。</li></ul>
            <ul><li>电视背景</li><li>按施工图</li><li>1、仿瓷批2次,打磨;2、日本湿胶粘贴;3、面贴墙纸(含国产墙纸)。</li></ul>
            <ul><li>床头背景</li><li>按施工图</li><li>1、仿瓷批2次,打磨;2、日本湿胶粘贴;3、面贴墙纸(含国产墙纸)。</li></ul>
            </span>
            
            <span class='scontent_list'>
            <ul><li>项目名称</li><li>数量</li><li>详细说明</li></ul>
            <ul><li>衣柜</li><li>15㎡</li><li>1、15厘、9厘夹板造型;2、柜背贴防潮膜;3、不锈钢挂衣杆;4、含铝合金趟门。</li></ul>
            </span>
            
            
            <span class='scontent_list'>
            <ul><li>电器名称</li><li>数量</li><li>备注</li></ul>
            <ul><li>空调(格力柜机)</li><li>1台</li><li>3匹。</li></ul>
            <ul><li>空调(格力挂机)</li><li>3台</li><li>1匹。</li></ul>
            <ul><li>热水器(欧咪嘉)</li><li>1台</li><li>燃气式。</li></ul>
            </span>
            
            <span class='scontent_list' >
            <ul><li>产品名称</li><li>数量</li><li>详细说明</li></ul>
            <ul><li>沙发</li><li>1套</li><li>1、新世界家私;
            2、三位加贵妃椅;
            3、布艺沙发。</li></ul>
            <ul><li>茶几</li><li>1张</li><li>1、新世界家私;2、1.2米长。</li></ul>
            <ul><li>地柜</li><li>1张</li><li>1、新世界家私;2、1.8米长。</li></ul>
            <ul><li>餐台+餐椅</li><li>1套</li><li>1、新世界家私;2、一张桌子,6张椅子。</li></ul>
            <ul><li>主人房床</li><li>1张</li><li>1、新世界家私;2、1800X2000mm。</li></ul>
            <ul><li>主人房床头柜</li><li>2个</li><li>1、新世界家私;2、480X420mm。</li></ul>
            <ul><li>客房床</li><li>1张</li><li>1、新世界家私;2、1500X1900mm。</li></ul>
            <ul><li>客房床头柜</li><li>2个</li><li>1、新世界家私;2、500X360mm。</li></ul>
            </span>
            </div>";
    }elseif ($id==11){
        $scontent="<div class='scontent'>

            <span class='scontent_list block' >
            <ul><li>材料说明</li><li>数量</li><li>详细说明</li></ul>
            <ul><li>地面找平<br/>(适用于铺设复合地板)</li><li>按施工图</li><li>国标32.5R水泥,淡水沙及人工(若水泥浆层厚度超过6厘米,每加厚1厘米,加7元/㎡)。</li></ul>
            <ul><li>大理石铺设/地面铺抛<br/>光砖/抛釉砖/防滑砖</li><li>按施工图</li><li>国标32.5R水泥,淡水沙及人工，填缝剂勾缝(不含砖及地面保护材料,若水泥浆层厚度超过6厘米,每加厚1厘米,加7元/㎡,防滑砖、抛光砖规格在30X30～80X80以内,超大小、斜铺、镶边镶点均另计)。</li></ul>
            <ul><li>墙身贴平墙式脚<br/>线/波打线铺设</li><li>按施工图</li><li>国标32.5R水泥,淡水沙及人工(含凿墙,不含脚线)。</li></ul>
            <ul><li>墙面/顶面煽灰+刷ICI</li><li>根据现场</li><li>专用胶水拌复粉批三～四遍,精细打磨,2X2胶条镶边,及人工(选色加10元/㎡);'多乐士'墙面漆(2底+2面)。</li></ul>
            <ul><li>墙面/墙身贴瓷片不拼花</li><li>根据现场</li><li>国标32.5R水泥,淡水沙及人工,填缝剂勾缝(不含瓷片)。</li></ul>
            <ul><li>修补门洞</li><li>根据现场</li><li>红砖/轻质砖砌墙,国标32.5R水泥及淡水沙(安装门加150元/套)。</li></ul>
            <ul><li>墙身管线开槽</li><li>按施工图</li><li>墙身开介线槽暗装水管、电线管,仅人工。</li></ul>
            <ul><li>线槽批荡、补贴外墙砖</li><li>根据现场</li><li>国标32.5R水泥、淡水沙及人工(不含外墙砖)。</li></ul>
            <ul><li>沉箱底二次排水处理</li><li>按施工图</li><li>国标32.5R水泥沙浆铺斜坡快速排水及人工。</li></ul>
            <ul><li>沉箱处理</li><li>按施工图</li><li>8厘钢筋、国标32.5R水泥及淡水沙倒制层板,红砖/轻质砖架空,水泥沙浆找平(5㎡以内,超出加220元/㎡)。</li></ul>
            <ul><li>防水、防潮处理</li><li>根据现场</li><li>'防渗宝'专业防水、防渗涂料(全部墙面及地面)。</li></ul>
            <ul><li>排水管/排污管安装</li><li>按施工图</li><li>'联塑'PVC配件、含配件,人工安装费。</li></ul>
            <ul><li>马桶/蹲厕安装</li><li>按施工图</li><li>膨胀螺丝,国标32.5R水泥,中性玻璃胶,不含厕具。</li></ul>
            <ul><li>淋浴房挡水条</li><li>按施工图</li><li>国标32.5R水泥,淡水沙及人工(不含挡水线)。</li></ul>
            <ul><li>冷给水管安装/排水管安装</li><li>按施工图</li><li>2~2.5分联塑PPR管、'联塑'PVC配件、含配件,人工安装费。</li></ul>
            <ul><li>水龙头/地漏及五金安装</li><li>按施工图</li><li>生料带等辅助材料及人工(不含水龙头、卫浴五金及玻璃制品安装)。</li></ul>
            <ul><li>灯开关布线</li><li>按施工图</li><li>'铁城'牌1.5㎡多芯铜线,套'联塑'PVC管,过梁、柱套黄腊管,中间不续线,回路灯计2位,筒灯、射灯、灯管连线2盏计1位。'铁城'牌芯铜线,套'联塑'PVC管,过梁、柱用黄腊管,中间不续线(大厅地面铜插座计2位)轻钢龙骨架,30X30铝扣板。</li></ul>
            <ul><li>开关、插座面板/灯具安装</li><li>按施工图</li><li>雅点面板/'3M'电胶布、平头镙丝等辅助材料及人工(不包灯及不含安装水晶灯)。</li></ul>
            <ul><li>强/弱电配电箱安装</li><li>按施工图</li><li>佛山展业十位以内配电箱(增大另计),含空气开关、漏电开关,其它材料价格另计(原强电箱保留);佛山展业专用弱电箱,含电视分配器、安装费。</li></ul>
            <ul><li>电视/电话/电脑网络布线</li><li>按施工图</li><li>双屏蔽电视线,套'联塑'PVC管(含客厅、主人房两项,增加另计);'讯宝'牌4芯电话线,套'联塑'PVC管(含客厅,增加另计);超五类网线,套'联塑'PVC管(含客厅、主人房、书房,增加另计)。</li></ul>
            <ul><li>工程所用材料运输费<br/>(报价内的项目)</li><li>根据现场</li><li>所有装修材料采购运输到小区外的定点材料堆放点,人工搬运材料到一楼电梯后采用电梯上楼(水泥、沙打包运输),(管理处不允许上电梯必须别计),不含业主自购材料。</li></ul>
            <ul><li>成品保护费<br/>(按建筑面积计算)</li><li>根据现场</li><li>新铺装地面保护及窗台大理石保护(专用保护膜)、阳台铝合金门U型下槛保护、线管保护、卫浴成品保护(新装台盆、马桶等)、可视门铃、煤气表、新装热水器等。</li></ul>
            <ul><li>垃圾清理、运输、清洁</li><li>根据现场</li><li>施工范围内的所有垃圾必须打包搬运到小区定点堆放处,及完工后的清场。</li></ul>
            
            
            </span>
            
            <span class='scontent_list' >
            <ul><li>项目名称</li><li>数量</li><li>详细说明</li></ul>
            <ul><li>整屋瓷砖</li><li>按施工图</li><li>1、奥米茄陶瓷;
            2、客厅、餐厅地砖:800X800mm;
            3、浴室、厨房、阳台地砖:300X300mm;
            4、浴室墙身:300X600mm;
            5、厨房墙身:300X600mm;
            6、地脚线:110X800mm。</li></ul>
            <ul><li>房间复合地板</li><li>按施工图</li><li>1、圣象;
            2、复合地板:800X120X12mm;
            3、包脚线。</li></ul>
            <ul><li>卫浴五金</li><li>以2套为基础</li><li>1、浪鲸;
            2、铝材淋浴屏;
            3、浴室柜:600mm长;
            4、二联淋浴花洒;
            5、虹吸式连体马桶:690X370X725mm;
            6、五金杂件:地漏、角阀、软管。</li></ul>
            <ul><li>门类</li><li>按施工图</li><li>1、家昌木门:房间门(强化实心复合门);2、大家旺:厨房趟门;3、大家旺:浴室门。</li></ul>
            <ul><li>灯类</li><li>按施工图</li><li>吸顶灯/勤能筒灯/勤能射灯。</li></ul>
            <ul><li>窗台石</li><li>按施工图</li><li>雅士白/闪电莎安娜。</li></ul>
            <ul><li>门槛石</li><li>9条</li><li>大理石（红色/黑色）。</li></ul>
            <ul><li>铝扣板天花</li><li>按施工图</li><li>友邦；轻钢龙骨架,300X300mm铝扣板。</li></ul>
            <ul><li>洗菜盘</li><li>1个</li><li>/</li></ul>
            <ul><li>厨房水龙头</li><li>1个</li><li>/</li></ul>
            <ul><li>橱柜</li><li>按施工图</li><li>卡丹利；
            1、柜身:麻石；2、门:晶钢门；3、石英石。</li></ul>
            <ul><li>抽油烟机</li><li>1套</li><li>樱花/欧派(厂家直供)。</li></ul>
            <ul><li>炉灶</li><li>1套</li><li>樱花/欧派(厂家直供)。</li></ul>
            <ul><li>消毒碗柜</li><li>1套</li><li>樱花/欧派(厂家直供)。</li></ul>
            </span>
            
            <span class='scontent_list' i>
            <ul><li>项目名称</li><li>数量</li><li>详细说明</li></ul>
            <ul><li>天花</li><li>按施工图</li><li>1、轻钢龙骨,不锈钢马钉,膨胀螺丝;
            2、6厘硅酸板垫底,9厘夹板竖面造型;
            3、乳胶漆基础已含。 </li></ul>
            <ul><li>假天花</li><li>按施工图</li><li>1、轻钢龙骨,不锈钢马钉,膨胀螺丝;2、6厘硅酸板垫底,9厘夹板竖面造型;(圆角加2平方);3、乳胶漆基础已含。  </li></ul>
            <ul><li>窗帘盒</li><li>按施工图</li><li>1、9厘夹板造型;2、乳胶漆基础已含</li></ul>
            <ul><li>石膏线</li><li>按施工图</li><li>面刷米白色乳胶漆。</li></ul>
            <ul><li>电视背景</li><li>按施工图</li><li>1、木龙骨、轻钢龙骨架;2、9厘夹板造型;3、国产优质墙纸。</li></ul>
            <ul><li>床头背景</li><li>按施工图</li><li>1、木龙骨、轻钢龙骨架;2、9厘夹板造型;3、8分PVC线;4、国产优质墙纸。</li></ul>
            </span>
            
            <span class='scontent_list'>
            <ul><li>项目名称</li><li>数量</li><li>详细说明</li></ul>
            <ul><li>衣柜</li><li>15㎡</li><li>1、15厘、9厘夹板造型;2、柜背贴防潮膜;3、不锈钢挂衣杆;4、含铝合金趟门。</li></ul>
            </span>
            
            
            <span class='scontent_list'>
            <ul><li>电器名称</li><li>数量</li><li>备注</li></ul>
            <ul><li>空调(格力柜机)</li><li>1台</li><li>3匹。</li></ul>
            <ul><li>空调(格力挂机)</li><li>3台</li><li>1匹。</li></ul>
            <ul><li>热水器(欧咪嘉)</li><li>1台</li><li>燃气式。</li></ul>
            </span>
            
            <span class='scontent_list' >
            <ul><li>产品名称</li><li>数量</li><li>详细说明</li></ul>
            <ul><li>沙发</li><li>1套</li><li>1、新世界家私;
            2、三位加贵妃椅;
            3、布艺沙发。</li></ul>
            <ul><li>茶几</li><li>1张</li><li>1、新世界家私;2、1200X650mm。</li></ul>
            <ul><li>地柜</li><li>1张</li><li>1、新世界家私;2、2600X350X500mm。</li></ul>
            <ul><li>餐台+餐椅</li><li>1套</li><li>1、新世界家私;2、一张桌子,6张椅子。</li></ul>
            <ul><li>主人房床</li><li>1张</li><li>1、新世界家私;2、1800X2000mm。</li></ul>
            <ul><li>主人房床头柜</li><li>2个</li><li>1、新世界家私;2、600X600mm。</li></ul>
            <ul><li>客房床</li><li>1张</li><li>1、新世界家私;2、1500X2000mm。</li></ul>
            <ul><li>客房床头柜</li><li>2个</li><li>1、新世界家私;2、500X480mm。</li></ul>
            </span>
            </div>";
    }elseif ($id==12){
        $scontent="<div class='scontent'>
            
            <span class='scontent_list block' >
            <ul><li>材料说明</li><li>数量</li><li>详细说明</li></ul>
            <ul><li>地面找平<br/>(适用于铺设复合地板)</li><li>按施工图</li><li>国标32.5R水泥,淡水沙及人工(若水泥浆层厚度超过6厘米,每加厚1厘米,加7元/㎡)。</li></ul>
            <ul><li>大理石铺设/地面铺抛<br/>光砖/抛釉砖/防滑砖</li><li>按施工图</li><li>国标32.5R水泥,淡水沙及人工，填缝剂勾缝(不含砖及地面保护材料,若水泥浆层厚度超过6厘米,每加厚1厘米,加7元/㎡,防滑砖、抛光砖规格在30X30～80X80以内,超大小、斜铺、镶边镶点均另计)。</li></ul>
            <ul><li>墙身贴平墙式脚<br/>线/波打线铺设</li><li>按施工图</li><li>国标32.5R水泥,淡水沙及人工(含凿墙,不含脚线)。</li></ul>
            <ul><li>墙面/顶面煽灰+刷ICI</li><li>根据现场</li><li>专用胶水拌复粉批三～四遍,精细打磨,2X2胶条镶边,及人工(选色加10元/㎡);'多乐士'墙面漆(2底+2面)。</li></ul>
            <ul><li>墙面/墙身贴瓷片不拼花</li><li>根据现场</li><li>国标32.5R水泥,淡水沙及人工,填缝剂勾缝(不含瓷片)。</li></ul>
            <ul><li>修补门洞</li><li>根据现场</li><li>红砖/轻质砖砌墙,国标32.5R水泥及淡水沙(安装门加150元/套)。</li></ul>
            <ul><li>墙身管线开槽</li><li>按施工图</li><li>墙身开介线槽暗装水管、电线管,仅人工。</li></ul>
            <ul><li>线槽批荡、补贴外墙砖</li><li>根据现场</li><li>国标32.5R水泥、淡水沙及人工(不含外墙砖)。</li></ul>
            <ul><li>沉箱底二次排水处理</li><li>按施工图</li><li>国标32.5R水泥沙浆铺斜坡快速排水及人工。</li></ul>
            <ul><li>沉箱处理</li><li>按施工图</li><li>8厘钢筋、国标32.5R水泥及淡水沙倒制层板,红砖/轻质砖架空,水泥沙浆找平(5㎡以内,超出加220元/㎡)。</li></ul>
            <ul><li>防水、防潮处理</li><li>根据现场</li><li>'防渗宝'专业防水、防渗涂料(全部墙面及地面)。</li></ul>
            <ul><li>排水管/排污管安装</li><li>按施工图</li><li>'联塑'PVC配件、含配件,人工安装费。</li></ul>
            <ul><li>马桶/蹲厕安装</li><li>按施工图</li><li>膨胀螺丝,国标32.5R水泥,中性玻璃胶,不含厕具。</li></ul>
            <ul><li>淋浴房挡水条</li><li>按施工图</li><li>国标32.5R水泥,淡水沙及人工(不含挡水线)。</li></ul>
            <ul><li>冷给水管安装/排水管安装</li><li>按施工图</li><li>2~2.5分联塑PPR管、'联塑'PVC配件、含配件,人工安装费。</li></ul>
            <ul><li>水龙头/地漏及五金安装</li><li>按施工图</li><li>生料带等辅助材料及人工(不含水龙头、卫浴五金及玻璃制品安装)。</li></ul>
            <ul><li>灯开关布线</li><li>按施工图</li><li>'铁城'牌1.5㎡多芯铜线,套'联塑'PVC管,过梁、柱套黄腊管,中间不续线,回路灯计2位,筒灯、射灯、灯管连线2盏计1位。'铁城'牌芯铜线,套'联塑'PVC管,过梁、柱用黄腊管,中间不续线(大厅地面铜插座计2位)轻钢龙骨架,30X30铝扣板。</li></ul>
            <ul><li>开关、插座面板/灯具安装</li><li>按施工图</li><li>雅点面板/'3M'电胶布、平头镙丝等辅助材料及人工(不包灯及不含安装水晶灯)。</li></ul>
            <ul><li>强/弱电配电箱安装</li><li>按施工图</li><li>佛山展业十位以内配电箱(增大另计),含空气开关、漏电开关,其它材料价格另计(原强电箱保留);佛山展业专用弱电箱,含电视分配器、安装费。</li></ul>
            <ul><li>电视/电话/电脑网络布线</li><li>按施工图</li><li>双屏蔽电视线,套'联塑'PVC管(含客厅、主人房两项,增加另计);'讯宝'牌4芯电话线,套'联塑'PVC管(含客厅,增加另计);超五类网线,套'联塑'PVC管(含客厅、主人房、书房,增加另计)。</li></ul>
            <ul><li>工程所用材料运输费<br/>(报价内的项目)</li><li>根据现场</li><li>所有装修材料采购运输到小区外的定点材料堆放点,人工搬运材料到一楼电梯后采用电梯上楼(水泥、沙打包运输),(管理处不允许上电梯必须别计),不含业主自购材料。</li></ul>
            <ul><li>成品保护费<br/>(按建筑面积计算)</li><li>根据现场</li><li>新铺装地面保护及窗台大理石保护(专用保护膜)、阳台铝合金门U型下槛保护、线管保护、卫浴成品保护(新装台盆、马桶等)、可视门铃、煤气表、新装热水器等。</li></ul>
            <ul><li>垃圾清理、运输、清洁</li><li>根据现场</li><li>施工范围内的所有垃圾必须打包搬运到小区定点堆放处,及完工后的清场。</li></ul>
            
            </span>
            
            <span class='scontent_list' >
            <ul><li>项目名称</li><li>数量</li><li>详细说明</li></ul>
            <ul><li>整体瓷砖</li><li>按施工图</li><li>1、荣高;
            2、客厅、餐厅地砖:800X800mm;
            3、浴室、厨房、阳台地砖:300X300mm;
            4、浴室墙身:300X600mm;
            5、厨房墙身:300X600mm;
            6、地脚线:110X800mm。</li></ul>
            <ul><li>房间复合地板</li><li>按施工图</li><li>1、圣象;
            2、复合地板:800X120X12mm;
            3、包脚线。</li></ul>
            <ul><li>卫浴五金</li><li>以2套为基础</li><li>1、浪鲸卫浴;
            2、淋浴屏:L0208;
            3、浴室柜:型号BF-8760,600mm长;
            4、淋浴花洒:型号FT-0352;
            5、马桶:CO-1080;
            6、五金杂件:地漏、角阀、软管。</li></ul>
            <ul><li>门类</li><li>按施工图</li><li>1、家昌木门:房间门(强化实心复合门);2、大家旺:厨房趟门;3、大家旺:浴室门。</li></ul>
            <ul><li>灯类</li><li>按施工图</li><li>吸顶灯/勤能筒灯/勤能射灯。</li></ul>
            <ul><li>窗台石</li><li>按施工图</li><li>雅士白/闪电莎安娜。</li></ul>
            <ul><li>门槛石</li><li>9条</li><li>大理石（红色/黑色）。</li></ul>
            <ul><li>铝扣板天花</li><li>按施工图</li><li>友邦；轻钢龙骨架,300X300mm铝扣板。</li></ul>
            <ul><li>洗菜盘</li><li>1个</li><li>/</li></ul>
            <ul><li>厨房水龙头</li><li>1个</li><li>/</li></ul>
            <ul><li>橱柜</li><li>按施工图</li><li>卡丹利;
            1、柜身:不锈钢;2、门:不锈钢;
            3、台面石:石英石。</li></ul>
            <ul><li>抽油烟机</li><li>1套</li><li>樱花/欧派(厂家直供)。</li></ul>
            <ul><li>炉灶</li><li>1套</li><li>樱花/欧派(厂家直供)。</li></ul>
            <ul><li>消毒碗柜</li><li>1套</li><li>樱花/欧派(厂家直供)。</li></ul>
            </span>
            
            <span class='scontent_list' i>
            <ul><li>项目名称</li><li>数量</li><li>详细说明</li></ul>
            <ul><li>天花</li><li>按施工图</li><li>1、轻钢龙骨,不锈钢马钉,膨胀螺丝;
            2、6厘硅酸板垫底,9厘夹板竖面造型;
            3、乳胶漆基础已含。 </li></ul>
            <ul><li>假天花</li><li>按施工图</li><li>1、轻钢龙骨,不锈钢马钉,膨胀螺丝;2、6厘硅酸板垫底,9厘夹板竖面造型;(圆角加2平方);3、乳胶漆基础已含。  </li></ul>
            <ul><li>窗帘盒</li><li>按施工图</li><li>1、9厘夹板造型;2、乳胶漆基础已含</li></ul>
            <ul><li>石膏线</li><li>按施工图</li><li>1、原硅酸板天花边贴3厘饰面板;2、油清漆。</li></ul>
            <ul><li>电视墙-两边造型</li><li>按施工图</li><li>1、木龙骨、轻钢龙骨架;2、9厘夹板造型,贴3厘饰面板;贴国产优质墙纸;3、茶镜。
            </li></ul>
            <ul><li>电视墙-贴墙纸</li><li>按施工图</li><li>1、原墙煽灰后;2、油防潮漆;3、贴国产优质墙纸(贴抛光砖仅人工加100元/M2)。  
            </li></ul>
            <ul><li>床头背景</li><li>按施工图</li><li>1、木龙骨、轻钢龙骨架;2、9厘夹板造型;3、8分PVC线;4、国产优质墙纸。</li></ul>
            </span>
            
            <span class='scontent_list'>
            <ul><li>项目名称</li><li>数量</li><li>详细说明</li></ul>
            <ul><li>衣柜</li><li>15㎡</li><li>1、15厘、9厘夹板造型;2、柜背贴防潮膜;3、不锈钢挂衣杆;4、含铝合金趟门。</li></ul>
            </span>
            
            
            <span class='scontent_list'>
            <ul><li>电器名称</li><li>数量</li><li>备注</li></ul>
            <ul><li>空调(格力柜机)</li><li>1台</li><li>3匹。</li></ul>
            <ul><li>空调(格力挂机)</li><li>3台</li><li>1匹。</li></ul>
            <ul><li>热水器(欧咪嘉)</li><li>1台</li><li>燃气式。</li></ul>
            </span>
            
            <span class='scontent_list' >
            <ul><li>产品名称</li><li>数量</li><li>详细说明</li></ul>
            <ul><li>沙发</li><li>1套</li><li>1、新世界家私;2、一位,一位加三位;3、木艺沙发。</li></ul>
            <ul><li>茶几</li><li>1张</li><li>1、新世界家私;2、1400X750X450mm。</li></ul>
            <ul><li>地柜</li><li>1张</li><li>1、新世界家私;2、2000X500X380mm。</li></ul>
            <ul><li>餐台+餐椅</li><li>1套</li><li>1、新世界家私;2、一张桌子,6张椅子。</li></ul>
            <ul><li>主人房床</li><li>1张</li><li>1、新世界家私;2、1800X2000mm。</li></ul>
            <ul><li>主人房床头柜</li><li>2个</li><li>1、新世界家私;2、600X400mm。</li></ul>
            <ul><li>客房床</li><li>1张</li><li>1、新世界家私;2、1500X2000mm。</li></ul>
            <ul><li>客房床头柜</li><li>2个</li><li>1、新世界家私;2、450X350mm。</li></ul>
            
            </span>
            </div>";
    }elseif ($id==13){
        $scontent="<div class='scontent'>

            <span class='scontent_list block' >
            <ul><li>材料说明</li><li>数量</li><li>详细说明</li></ul>
            <ul><li>地面找平<br/>(适用于铺设复合地板)</li><li>按施工图</li><li>国标32.5R水泥,淡水沙及人工(若水泥浆层厚度超过6厘米,每加厚1厘米,加7元/㎡)。</li></ul>
            <ul><li>大理石铺设/地面铺抛<br/>光砖/抛釉砖/防滑砖</li><li>按施工图</li><li>国标32.5R水泥,淡水沙及人工，填缝剂勾缝(不含砖及地面保护材料,若水泥浆层厚度超过6厘米,每加厚1厘米,加7元/㎡,防滑砖、抛光砖规格在30X30～80X80以内,超大小、斜铺、镶边镶点均另计)。</li></ul>
            <ul><li>墙身贴平墙式脚<br/>线/波打线铺设</li><li>按施工图</li><li>国标32.5R水泥,淡水沙及人工(含凿墙,不含脚线)。</li></ul>
            <ul><li>墙面/顶面煽灰+刷ICI</li><li>根据现场</li><li>专用胶水拌复粉批三～四遍,精细打磨,2X2胶条镶边,及人工(选色加10元/㎡);'多乐士'墙面漆(2底+2面)。</li></ul>
            <ul><li>墙面/墙身贴瓷片不拼花</li><li>根据现场</li><li>国标32.5R水泥,淡水沙及人工,填缝剂勾缝(不含瓷片)。</li></ul>
            <ul><li>修补门洞</li><li>根据现场</li><li>红砖/轻质砖砌墙,国标32.5R水泥及淡水沙(安装门加150元/套)。</li></ul>
            <ul><li>墙身管线开槽</li><li>按施工图</li><li>墙身开介线槽暗装水管、电线管,仅人工。</li></ul>
            <ul><li>线槽批荡、补贴外墙砖</li><li>根据现场</li><li>国标32.5R水泥、淡水沙及人工(不含外墙砖)。</li></ul>
            <ul><li>沉箱底二次排水处理</li><li>按施工图</li><li>国标32.5R水泥沙浆铺斜坡快速排水及人工。</li></ul>
            <ul><li>沉箱处理</li><li>按施工图</li><li>8厘钢筋、国标32.5R水泥及淡水沙倒制层板,红砖/轻质砖架空,水泥沙浆找平(5㎡以内,超出加220元/㎡)。</li></ul>
            <ul><li>防水、防潮处理</li><li>根据现场</li><li>'防渗宝'专业防水、防渗涂料(全部墙面及地面)。</li></ul>
            <ul><li>排水管/排污管安装</li><li>按施工图</li><li>'联塑'PVC配件、含配件,人工安装费。</li></ul>
            <ul><li>马桶/蹲厕安装</li><li>按施工图</li><li>膨胀螺丝,国标32.5R水泥,中性玻璃胶,不含厕具。</li></ul>
            <ul><li>淋浴房挡水条</li><li>按施工图</li><li>国标32.5R水泥,淡水沙及人工(不含挡水线)。</li></ul>
            <ul><li>冷给水管安装/排水管安装</li><li>按施工图</li><li>2~2.5分联塑PPR管、'联塑'PVC配件、含配件,人工安装费。</li></ul>
            <ul><li>水龙头/地漏及五金安装</li><li>按施工图</li><li>生料带等辅助材料及人工(不含水龙头、卫浴五金及玻璃制品安装)。</li></ul>
            <ul><li>灯开关布线</li><li>按施工图</li><li>'铁城'牌1.5㎡多芯铜线,套'联塑'PVC管,过梁、柱套黄腊管,中间不续线,回路灯计2位,筒灯、射灯、灯管连线2盏计1位。'铁城'牌芯铜线,套'联塑'PVC管,过梁、柱用黄腊管,中间不续线(大厅地面铜插座计2位)轻钢龙骨架,30X30铝扣板。</li></ul>
            <ul><li>开关、插座面板/灯具安装</li><li>按施工图</li><li>雅点面板/'3M'电胶布、平头镙丝等辅助材料及人工(不包灯及不含安装水晶灯)。</li></ul>
            <ul><li>强/弱电配电箱安装</li><li>按施工图</li><li>佛山展业十位以内配电箱(增大另计),含空气开关、漏电开关,其它材料价格另计(原强电箱保留);佛山展业专用弱电箱,含电视分配器、安装费。</li></ul>
            <ul><li>电视/电话/电脑网络布线</li><li>按施工图</li><li>双屏蔽电视线,套'联塑'PVC管(含客厅、主人房两项,增加另计);'讯宝'牌4芯电话线,套'联塑'PVC管(含客厅,增加另计);超五类网线,套'联塑'PVC管(含客厅、主人房、书房,增加另计)。</li></ul>
            <ul><li>工程所用材料运输费<br/>(报价内的项目)</li><li>根据现场</li><li>所有装修材料采购运输到小区外的定点材料堆放点,人工搬运材料到一楼电梯后采用电梯上楼(水泥、沙打包运输),(管理处不允许上电梯必须别计),不含业主自购材料。</li></ul>
            <ul><li>成品保护费<br/>(按建筑面积计算)</li><li>根据现场</li><li>新铺装地面保护及窗台大理石保护(专用保护膜)、阳台铝合金门U型下槛保护、线管保护、卫浴成品保护(新装台盆、马桶等)、可视门铃、煤气表、新装热水器等。</li></ul>
            <ul><li>垃圾清理、运输、清洁</li><li>根据现场</li><li>施工范围内的所有垃圾必须打包搬运到小区定点堆放处,及完工后的清场。</li></ul>
            
            </span>
            
            <span class='scontent_list' >
            <ul><li>项目名称</li><li>数量</li><li>详细说明</li></ul>
            <ul><li>整体瓷砖</li><li>按施工图</li><li>1、东鹏陶瓷;
            2、客厅、餐厅地砖:800X800mm;
            3、浴室、厨房、阳台地砖:300X300mm;
            4、浴室墙身:300X600mm;
            5、厨房墙身:300X600mm;
            6、地脚线:110X800mm。</li></ul>
            <ul><li>房间复合地板</li><li>按施工图</li><li>1、圣象;
            2、复合地板:800X120X12mm;
            3、包脚线。</li></ul>
            <ul><li>卫浴五金</li><li>以2套为基础</li><li>1、英皇卫浴;
            2、淋浴屏:H-007;
            3、浴室柜:型号BF-8632,800mm长;
            4、淋浴花洒:型号FT-0352;
            5、马桶:CO-1037;
            6、五金杂件:地漏、角阀、软管。</li></ul>
            <ul><li>门类</li><li>按施工图</li><li>1、家昌木门:房间门(实木复合门);2、大家旺:厨房趟门;3、大家旺:浴室门。</li></ul>
            <ul><li>灯类</li><li>按施工图</li><li>勤能吸顶灯/勤能筒灯/勤能射灯。</li></ul>
            <ul><li>窗台石</li><li>按施工图</li><li>雅士白/闪电莎安娜。</li></ul>
            <ul><li>门槛石</li><li>9条</li><li>大理石（红色/黑色）。</li></ul>
            <ul><li>铝扣板天花</li><li>按施工图</li><li>友邦；轻钢龙骨架,300X300mm铝扣板。</li></ul>
            <ul><li>洗菜盘</li><li>1个</li><li>/</li></ul>
            <ul><li>厨房水龙头</li><li>1个</li><li>/</li></ul>
            <ul><li>橱柜</li><li>按施工图</li><li>卡丹利;
            1、柜身:夹板;2、门:双面烤漆;
            3、台面石:石英石。</li></ul>
            <ul><li>抽油烟机</li><li>1套</li><li>樱花/欧派(厂家直供)。</li></ul>
            <ul><li>炉灶</li><li>1套</li><li>樱花/欧派(厂家直供)。</li></ul>
            <ul><li>消毒碗柜</li><li>1套</li><li>樱花/欧派(厂家直供)。</li></ul>
            </span>
            
            <span class='scontent_list' i>
            <ul><li>项目名称</li><li>数量</li><li>详细说明</li></ul>
            <ul><li>天花</li><li>按施工图</li><li>1、轻钢龙骨,不锈钢马钉,膨胀螺丝;2、6厘硅酸板垫底,9厘夹板竖面造型;3、乳胶漆基础已含。 </li></ul>
            <ul><li>假天花</li><li>按施工图</li><li>1、轻钢龙骨,不锈钢马钉,膨胀螺丝;2、6厘硅酸板垫底,9厘夹板竖面造型;(圆角加2平方);3、乳胶漆基础已含。  </li></ul>
            <ul><li>窗帘盒</li><li>按施工图</li><li>1、9厘夹板造型;2、乳胶漆基础已含</li></ul>
            <ul><li>石膏线</li><li>按施工图</li><li>1、“穗华”牌10分石膏线;2、人工安装及修补油ICI。</li></ul>
            <ul><li>电视墙-两边造型</li><li>按施工图</li><li>1、1、木龙骨、轻钢龙骨架;2、9厘夹板造型，贴3厘饰面板;3、茶镜(再镶实木花格加380元/只)。</li></ul>
            <ul><li>电视墙-贴墙纸</li><li>按施工图</li><li>1、原墙煽灰后;2、油防潮漆;3、贴国产优质墙纸(贴抛光砖仅人工加100元/M2)。  
            </li></ul>
            <ul><li>床头背景</li><li>按施工图</li><li>1、木龙骨、轻钢龙骨架;2、9厘夹板造型;3、8分PVC线;4、国产优质墙纸。</li></ul>
            </span>
            
            <span class='scontent_list'>
            <ul><li>项目名称</li><li>数量</li><li>详细说明</li></ul>
            <ul><li>衣柜</li><li>15㎡</li><li>1、好莱客衣柜;2、EO环保实木颗粒板。</li></ul>
            </span>
            
            
            <span class='scontent_list'>
            <ul><li>电器名称</li><li>数量</li><li>备注</li></ul>
            <ul><li>风管机(日立柜机)</li><li>1台</li><li>3匹，拖1个风口。</li></ul>
            <ul><li>风管机(格力挂机)</li><li>3台</li><li>1.5匹一台,大一匹两台。</li></ul>
            <ul><li>热水器(欧咪嘉)</li><li>1台</li><li>燃气式。</li></ul>
            </span>
            
            <span class='scontent_list' >
            <ul><li>产品名称</li><li>数量</li><li>详细说明</li></ul>
            <ul><li>沙发</li><li>1套</li><li>1、新世界家私;2、一位,三位加贵妃椅;3、布艺沙发。</li></ul>
            <ul><li>茶几</li><li>1张</li><li>1、新世界家私;2、1250X750mm。</li></ul>
            <ul><li>地柜</li><li>1张</li><li>1、新世界家私;2、2000X500mm。</li></ul>
            <ul><li>餐台+餐椅</li><li>1套</li><li>1、新世界家私;2、一张桌子,6张椅子。</li></ul>
            <ul><li>主人房床</li><li>1张</li><li>1、新世界家私;2、1800X2000mm。</li></ul>
            <ul><li>主人房床头柜</li><li>2个</li><li>1、新世界家私;2、500X380mm。</li></ul>
            <ul><li>客房床</li><li>1张</li><li>1、新世界家私;2、1500X2000mm。</li></ul>
            <ul><li>客房床头柜</li><li>2个</li><li>1、新世界家私;2、450X350mm。</li></ul>
            </span>
            </div>";
    }elseif ($id==14){
        $scontent="<div class='scontent'>

            <span class='scontent_list block' >
            <ul><li>材料说明</li><li>数量</li><li>详细说明</li></ul>
            <ul><li>地面找平<br/>(适用于铺设复合地板)</li><li>按施工图</li><li>国标32.5R水泥,淡水沙及人工(若水泥浆层厚度超过6厘米,每加厚1厘米,加7元/㎡)。</li></ul>
            <ul><li>大理石铺设/地面铺抛<br/>光砖/抛釉砖/防滑砖</li><li>按施工图</li><li>国标32.5R水泥,淡水沙及人工，填缝剂勾缝(不含砖及地面保护材料,若水泥浆层厚度超过6厘米,每加厚1厘米,加7元/㎡,防滑砖、抛光砖规格在30X30～80X80以内,超大小、斜铺、镶边镶点均另计)。</li></ul>
            <ul><li>墙身贴平墙式脚<br/>线/波打线铺设</li><li>按施工图</li><li>国标32.5R水泥,淡水沙及人工(含凿墙,不含脚线)。</li></ul>
            <ul><li>墙面/顶面煽灰+刷ICI</li><li>根据现场</li><li>专用胶水拌复粉批三～四遍,精细打磨,2X2胶条镶边,及人工(选色加10元/㎡);'多乐士'墙面漆(2底+2面)。</li></ul>
            <ul><li>墙面/墙身贴瓷片不拼花</li><li>根据现场</li><li>国标32.5R水泥,淡水沙及人工,填缝剂勾缝(不含瓷片)。</li></ul>
            <ul><li>修补门洞</li><li>根据现场</li><li>红砖/轻质砖砌墙,国标32.5R水泥及淡水沙(安装门加150元/套)。</li></ul>
            <ul><li>墙身管线开槽</li><li>按施工图</li><li>墙身开介线槽暗装水管、电线管,仅人工。</li></ul>
            <ul><li>线槽批荡、补贴外墙砖</li><li>根据现场</li><li>国标32.5R水泥、淡水沙及人工(不含外墙砖)。</li></ul>
            <ul><li>沉箱底二次排水处理</li><li>按施工图</li><li>国标32.5R水泥沙浆铺斜坡快速排水及人工。</li></ul>
            <ul><li>沉箱处理</li><li>按施工图</li><li>8厘钢筋、国标32.5R水泥及淡水沙倒制层板,红砖/轻质砖架空,水泥沙浆找平(5㎡以内,超出加220元/㎡)。</li></ul>
            <ul><li>防水、防潮处理</li><li>根据现场</li><li>'防渗宝'专业防水、防渗涂料(全部墙面及地面)。</li></ul>
            <ul><li>排水管/排污管安装</li><li>按施工图</li><li>'联塑'PVC配件、含配件,人工安装费。</li></ul>
            <ul><li>马桶/蹲厕安装</li><li>按施工图</li><li>膨胀螺丝,国标32.5R水泥,中性玻璃胶,不含厕具。</li></ul>
            <ul><li>淋浴房挡水条</li><li>按施工图</li><li>国标32.5R水泥,淡水沙及人工(不含挡水线)。</li></ul>
            <ul><li>冷给水管安装/排水管安装</li><li>按施工图</li><li>2~2.5分联塑PPR管、'联塑'PVC配件、含配件,人工安装费。</li></ul>
            <ul><li>水龙头/地漏及五金安装</li><li>按施工图</li><li>生料带等辅助材料及人工(不含水龙头、卫浴五金及玻璃制品安装)。</li></ul>
            <ul><li>灯开关布线</li><li>按施工图</li><li>'铁城'牌1.5㎡多芯铜线,套'联塑'PVC管,过梁、柱套黄腊管,中间不续线,回路灯计2位,筒灯、射灯、灯管连线2盏计1位。'铁城'牌芯铜线,套'联塑'PVC管,过梁、柱用黄腊管,中间不续线(大厅地面铜插座计2位)轻钢龙骨架,30X30铝扣板。</li></ul>
            <ul><li>开关、插座面板/灯具安装</li><li>按施工图</li><li>'朗能'6.0系列面板/'3M'电胶布、平头镙丝等辅助材料及人工(不包灯及不含安装水晶灯)。</li></ul>
            <ul><li>强/弱电配电箱安装</li><li>按施工图</li><li>佛山展业十位以内配电箱(增大另计),含空气开关、漏电开关,其它材料价格另计(原强电箱保留);佛山展业专用弱电箱,含电视分配器、安装费。</li></ul>
            <ul><li>电视/电话/电脑网络布线</li><li>按施工图</li><li>双屏蔽电视线,套'联塑'PVC管(含客厅、主人房两项,增加另计);'讯宝'牌4芯电话线,套'联塑'PVC管(含客厅,增加另计);'安普'牌8芯网络线,套'联塑'PVC管(含客厅、主人房、书房,增加另计)。</li></ul>
            <ul><li>工程所用材料运输费<br/>(报价内的项目)</li><li>根据现场</li><li>所有装修材料采购运输到小区外的定点材料堆放点,人工搬运材料到一楼电梯后采用电梯上楼(水泥、沙打包运输),(管理处不允许上电梯必须别计),不含业主自购材料。</li></ul>
            <ul><li>成品保护费<br/>(按建筑面积计算)</li><li>根据现场</li><li>新铺装地面保护及窗台大理石保护(专用保护膜)、阳台铝合金门U型下槛保护、线管保护、卫浴成品保护(新装台盆、马桶等)、可视门铃、煤气表、新装热水器等。</li></ul>
            <ul><li>垃圾清理、运输、清洁</li><li>根据现场</li><li>施工范围内的所有垃圾必须打包搬运到小区定点堆放处,及完工后的清场。</li></ul>
            
            </span>
            
            <span class='scontent_list' >
            <ul><li>项目名称</li><li>数量</li><li>详细说明</li></ul>
            <ul><li>整体瓷砖</li><li>按施工图</li><li>1、昊博陶瓷;
            2、客厅、餐厅地砖:800X800mm;
            3、浴室、厨房、阳台地砖:300X300mm;
            4、浴室墙身:300X600mm;
            5、厨房墙身:300X600mm;
            6、地脚线:110X800mm。</li></ul>
            <ul><li>房间复合地板</li><li>按施工图</li><li>1、圣象;
            2、复合地板:800X120X12mm;
            3、包脚线。</li></ul>
            <ul><li>卫浴五金</li><li>以2套为基础</li><li>1、英皇卫浴;2、淋浴屏:FYS083;3、浴室柜;4、淋浴花洒;5、马桶;6、五金杂件:地漏、角阀、软管。</li></ul>
            <ul><li>门类</li><li>按施工图</li><li>1、嘉禾盛世:房间门(实木复合门);2、大家旺:厨房趟门;3、大家旺:浴室门。</li></ul>
            <ul><li>灯类</li><li>按施工图</li><li>吸顶灯/勤能筒灯/勤能射灯。</li></ul>
            <ul><li>窗台石</li><li>按施工图</li><li>雅士白/闪电莎安娜。</li></ul>
            <ul><li>门槛石</li><li>9条</li><li>大理石(红色/黑色)。</li></ul>
            <ul><li>铝扣板天花</li><li>按施工图</li><li>友邦；轻钢龙骨架,300X300mm铝扣板。</li></ul>
            <ul><li>洗菜盘</li><li>1个</li><li>/</li></ul>
            <ul><li>厨房水龙头</li><li>1个</li><li>/</li></ul>
            <ul><li>橱柜</li><li>按施工图</li><li>我乐橱柜</li></ul>
            <ul><li>抽油烟机</li><li>1套</li><li>樱花/欧派/百得。</li></ul>
            <ul><li>炉灶</li><li>1套</li><li>樱花/欧派/百得</li></ul>
            <ul><li>消毒碗柜</li><li>1套</li><li>樱花/欧派/百得</li></ul>
            </span>
            
            <span class='scontent_list' i>
            <ul><li>项目名称</li><li>数量</li><li>详细说明</li></ul>
            <ul><li>入户花园造型天花</li><li>按施工图</li><li>1、轻钢龙骨;2、7厘硅酸板垫底; 
            3、面贴桑拿板;4、刷清漆。  </li></ul>
            <ul><li>天花</li><li>按施工图</li><li>1、轻钢龙骨;2、7厘硅酸板垫底,灯槽用9厘夹板造型;3、乳胶漆基础已含。 </li></ul>
            <ul><li>假天花</li><li>按施工图</li><li>1、轻钢龙骨;2、7厘硅酸板垫底,灯槽用9厘夹板造型;3、乳胶漆基础已含。  </li></ul>
            <ul><li>窗帘盒</li><li>按施工图</li><li>1、9厘夹板造型;2、乳胶漆基础已含</li></ul>
            <ul><li>电视背景1</li><li>按施工图</li><li>1、9厘夹板造型;2、9厘板造型边框修边;
            3、内装仿皮(或绒布)硬包。
            </li></ul>
            <ul><li>电视背景2</li><li>按施工图</li><li>1、9厘夹板造型;2、面贴红砖,刷白;3、面贴饰面板,喷漆。  
            </li></ul>
            <ul><li>床头背景1</li><li>按施工图</li><li>1、仿瓷批2次,打磨;2、日本湿胶粘贴;3、面贴墙纸(含国产墙纸)。</li></ul>
            <ul><li>床头背景2</li><li>按施工图</li><li>1、9厘夹板造型;2、9厘板造型边框修边;3、内装仿皮(或绒布)硬包</li></ul>
            </span>
            
            <span class='scontent_list'>
            <ul><li>项目名称</li><li>数量</li><li>详细说明</li></ul>
            <ul><li>衣柜</li><li>15㎡</li><li>1、正豆衣柜;2、EO环保实木颗粒板。</li></ul>
            </span>
            
            
            <span class='scontent_list'>
            <ul><li>电器名称</li><li>数量</li><li>备注</li></ul>
            <ul><li>风管机(日立柜机)</li><li>1台</li><li>3匹,拖1个风口</li></ul>
            <ul><li>风管机(格力挂机)</li><li>3台</li><li>1.5匹一台，大一匹两台。</li></ul>
            <ul><li>热水器(欧咪嘉)</li><li>1台</li><li>燃气式。</li></ul>
            </span>
            
            <span class='scontent_list' >
            <ul><li>产品名称</li><li>数量</li><li>详细说明</li></ul>
            <ul><li>沙发</li><li>1套</li><li>1、新世界家私;2、一位,三位加贵妃椅;3、皮沙发。</li></ul>
            <ul><li>茶几</li><li>1张</li><li>1、新世界家私;2、1250X750mm。</li></ul>
            <ul><li>地柜</li><li>1张</li><li>1、新世界家私;2、2000X500mm。</li></ul>
            <ul><li>餐台+餐椅</li><li>1套</li><li>1、新世界家私;2、一张桌子,6张椅子。</li></ul>
            <ul><li>主人房床</li><li>1张</li><li>1、新世界家私;2、1800X2000mm。</li></ul>
            <ul><li>主人房床头柜</li><li>2个</li><li>1、新世界家私;2、500X380mm。</li></ul>
            <ul><li>客房床</li><li>1张</li><li>1、新世界家私;2、1500X1900mm。</li></ul>
            <ul><li>客房床头柜</li><li>2个</li><li>1、新世界家私;2、450X350mm。</li></ul>
            
            </span>
            </div>";
    }
    
    
    $content="
           <div class='select-jq' style='display: none'>
            <i class='select-jq-01'>$xqm</i>
            <i class='select-jq-02'>92㎡</i>
            <i class='select-jq-03'>$tcm</i>
            </div>
            
            <div id='body' class='web-lbrz'></div>
            <div id='advert'>
            <div class='content'><img src='../../public/image/lbrz.jpg'/></div>
            </div>
            
            <!--=========================================select_bar=================================================-->
            <div class='select_bar'>
            <div class='content'>
            <span>
            <div>选择小区</div>
            <div class='select_list'> 
            <ul class='selectbarplay1'>
            $xzxq
            </ul>
            </div>
            </span>
            <span>
            <div >选择面积</div>
            <div class='select_list'>
            <ul class='lbrz-selectplay selectbarplay2'>
            $xzmj
            </ul>
            </div>
            </span>
            <span>
            <div >选择风格</div>
            <div class='select_list' >
            <ul  class='selectbarplay3'>
            $tc
            </ul>
            </div>
            </span>
            </div>
            </div>
            
            <!--=========================================booking=================================================-->
            <div id='booking'>
            <div class='content'>
            <span>
            <p>$setmeal[name]</p>
            <p  class='money'>拎包入住价:$setmeal[value1]元/㎡</p>
            <p  class='area'>户型面积：100㎡</p>
            <p  class='money-play'>全包总价：".($setmeal[value1]*100)."元</p>
            <p>认证施工单位 : 中山市华府装饰设计工程有限公司</p>
            <a href='../../?c=admin&a=work_order'>立即预约</a>
            <a href='javascript:void(0);'>〇  需要帮助？立即在线交流。</a>
            </span>
            <span><img src='../../$setmeal[pic]'></span>
            </div>
            </div>
            <!--=========================================preview=================================================-->
            <div id='preview'>
            <p class='title'>$setmeal[name]风格概述</p>
            <p class='title2'>$setmeal[value2]</p>

            <br>
            <div class='content'>
            <div>
            <ul class='preview-ul'>
            <li><img src='../../image/lb/xgttno.jpg' ></li>
            $tp
            <li><img src='../../image/lb/xgttno.jpg' ></li>
            </ul>
            </div>
            <span class='pm left1'></span>
            <span class='pm right1'></span>
            </div>
            <div class='scontent'>
            <ul class='preview-txt'>
            $dz
            </ul>
            </div>
            </div>

            <!--=========================================list_lbrz=================================================-->
            
            
            <div id='list_lbrz' >
            <p class='title' >项目内容</p>
            <p class='title2' >优质辅材结合标准化施工流程，让你的家装打好基础，不再有试错模式。</p>
            <div class='content'>
            <ul>
            <li  >基础装修</li>
            <li  >主材包</li>
            <li >风格造型包</li>
            <li >定制衣柜</li>
            <li >全屋电器</li>
            <li >家具套装</li>
            
            </ul>
            
            </div>
            $scontent
            </div>
            <!--=========================================fucai=================================================-->
            <div id='fucai'>
            <p class='title' >14大一线建材品牌</p>
            <p class='title2' >联合一线建材品牌，为您用心打造优质家居生活</p>
            <div class='content'>
            <a href='javascript:void(0)'><img src='../../public/image/14-pp01.jpg'></a>
            <a href='javascript:void(0)'><img src='../../public/image/14-pp02.jpg'></a>
            <a href='javascript:void(0)'><img src='../../public/image/14-pp03.jpg'></a>
            <a href='javascript:void(0)'><img src='../../public/image/14-pp04.jpg'></a>
            <a href='javascript:void(0)'><img src='../../public/image/14-pp07.jpg'></a>
            <a href='javascript:void(0)'><img src='../../public/image/14-pp14.jpg'></a>
            <a href='javascript:void(0)'><img src='../../public/image/14-pp05.jpg'></a>
            <a href='javascript:void(0)'><img src='../../public/image/14-pp08.jpg'></a>
            <a href='javascript:void(0)'><img src='../../public/image/14-pp09.jpg'></a>
            <a href='javascript:void(0)'><img src='../../public/image/14-pp10.jpg'></a>
            <a href='javascript:void(0)'><img src='../../public/image/14-pp11.jpg'></a>
            <a href='javascript:void(0)'><img src='../../public/image/14-pp12.jpg'></a>
            <a href='javascript:void(0)'><img src='../../public/image/14-pp13.jpg'></a>
            <a href='javascript:void(0)'><img src='../../public/image/14-pp06.jpg'></a>
            </div>
            </div>
            <!--=========================================shigong=================================================-->
            <div id='shigong'>
            <p class='title' >8项标准化施工</p>
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
            <li><img src='../../public/image/398-8x07.jpg'><p>7.铝扣板天花</p></li>
            <li><img src='../../public/image/398-8x08.jpg'><p>8.辅材上楼运输</p></li>
            </ul>
            </span>
            <a href='javascript:void(0)' class='right' onClick='sgright()'></a>
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
            <p class='title' >0增项8不限<span>施工合同签署后, 绝不额外收取任何费用</span></p>
            <p class='title2' >施工合同签署后，绝不额外收取任何费用</p>
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
            <p>〇  此套餐默认建筑面积100㎡,不足80㎡的按80㎡计算;</p>
            <p>〇  本套餐的计算面积为购房凭证上所书建筑面积为据(赠送面积除外),无产权面积证明的按70%得房率推算核价所需建筑面积(即套内面积除以0.75);</p>
            <p>〇  此套餐默认3个卧室,2个洗手间。每超出一个洗手间,基础装修增加2800元,主材增加4500元起;</p>
            <p>〇  此套餐默认配置2套床,衣柜15㎡,超出另计;</p>
            <p>〇  此套餐的橱柜,吊柜默认长2米,地柜长3米;</p>
            <p>* 最终解释权归云鲁班所有。</p>
            
            
            
            
            </div>
            </div>";
    
    if (!empty($_GET['a'])){
        $action=$_GET['a'];
    }
    

    $_smarty->assign('title',$title);
    $_smarty->assign('css',$css);
    $_smarty->assign('script',$script);
    
    $_smarty->assign('content',$content);
    $_smarty->assign('header',$header);
    
    $_smarty->display("stencil.tpl");
?>