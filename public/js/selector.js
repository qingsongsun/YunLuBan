/*JQ样式选择器*/
$(function(){
$('#body').each(function(){
	var pandan = $(this).attr('class');
	if(pandan=='gwc'){
	xiaoji();          //小计
	add_subtract();
	qxchecked();       //全选
	ppchecked();       //品牌选择
	spchecked();       //商品选择
	//lefton();          //数量减少按钮
	//righton();         //数量增加按钮
	shanchu();         //删除商品
	spzl();            //商品种类
	spid();            //商品ID
	ppid();            //品牌ID
	jsxz();            //件数限制
	setInterval(xiaoji,100);    //合算变化
	hesuan();
	setInterval(hesuan,100);    //合算变化
	setInterval(sps,100);       //件数变化
	txtval('jfval');            //清除VAL初始值	
 	jsval('spjs');            //清除VAL初始值
	checkbox_delete();          //选择性删除
	
    }
	
	if(pandan=='gwc-qrdd'){
//	setInterval(cotal_freight,100); 
	expression();
//	get_cookie();
	xiaoji();          //小计
	qxchecked();       //全选
	ppchecked();       //品牌选择
	spchecked();       //商品选择
	shanchu();         //删除商品 
	spzl();            //商品种类
	spid();            //商品ID
	ppid();            //品牌ID
	jfxz();            //积分限制
	txtval('jfval');   //清除VAL初始值
	txtval('shdz');
	$('.spjs').attr('readonly','readonly');
	receipt();         //收货地址
	spddsubmit();      //订单结算
	qrdz();
	setInterval(integralzh,100);       //积分转换
	setInterval(spdd,100);  //商品订单运算
	cityint(); //城市选择
	
    }
	
	if(pandan=='qrdd'){
   //setInterval(cotal_freight,100); 
	expression();
	setInterval(xiaoji,100);    //合算变化
	qxchecked();       //全选
	ppchecked();       //品牌选择
	spchecked();       //商品选择
	lefton();          //数量减少按钮
	righton();         //数量增加按钮
	shanchu();         //删除商品 
	spzl();            //商品种类
	spid();            //商品ID
	ppid();            //品牌ID
	jsxz();            //件数限制
	jfxz();            //积分限制
	txtval('jfval');   //清除VAL初始值	
	txtval('shdz');    //
	ljjsval('spjs');            //清除VAL初始值
	receipt();         //收货地址
	ljspddsubmit();      //订单结算
	qrdz();
	setInterval(integralzh,100);       //积分转换
    setInterval(spdd,100);             //商品订单运算
    cityint(); //城市选择
    setInterval(yunfeix,100);   
   
    }
	
	if(pandan == 'payment'){
	updateEndTime();	//倒计时	
	}
	
	if(pandan == 'spdd'){
    spdd_json()
	updateEndTime();  //倒计时
	orderid()   //订单ID
	alreadypaid();  //状态
	setInterval(jointorder,100); // 件数变化
	oneorder();  //单选
	allorder();  //多选
	setInterval(needprice,100);  //支付金额变化
	Screen();

	}

    if(pandan == 'shdz'){
    cityint();
    xiugaiIn();
    //cityint(); //城市选择
    //tjdz();
	setInterval(morenRel,100);
	setInterval(shtiaodshu,100); //显示条数
	}

    if(pandan == 'izl'){
    	var status = $(this).attr('rel');
    	if( status == 'on')
    	{
    	
        staTus();
    	$('#date_a').cxCalendar();
    	$('.date').attr('readonly','')
    	}
    	else{
    	$('.date').attr('readonly','readonly')
    	$('.name').attr('readonly','readonly')
    	$('.submit').attr('value','已保存');
    	$('.i-zl-a input').css('background-color','#dededf');
    	}
    	
    }
    
    if( pandan == 'zxdd'){
    $('.condition a').eq(0).addClass('i-bgico-on');
    $('.sex a').eq(0).addClass('i-bgico-on');
    $('.type a').eq(0).addClass('i-bgico-on');
    $('.style a').eq(0).addClass('i-bgico-on');
    $('.setmeal a').eq(0).addClass('i-bgico-on');
    expression()
    staTus();
    setInterval(cityint,100);
    }
    

    
    if( pandan == 'web-supermaket'){
    seArch();
    _select();
    sort();
    }

});

});
	 