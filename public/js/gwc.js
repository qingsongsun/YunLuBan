/*JQ样式选择器*/
$(function(){
$('#body').each(function(){
	var pandan = $(this).attr('class');
	if(pandan=='gwc'){
	xiaoji();          //小计
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
	setInterval(hesuan,100);
	setInterval(sps,100);
	txtval('jfval');   //清除VAL初始值	
    }
	
	if(pandan=='gwc-qrdd'){
	xiaoji();          //小计
	//spdd();            //商品订单运算
	qxchecked();       //全选
	ppchecked();       //品牌选择
	spchecked();       //商品选择
	shanchu();         //删除商品 
	spzl();            //商品种类
	spid();            //商品ID
	ppid();            //品牌ID
	jfxz();            //积分限制
	txtval('jfval');   //清除VAL初始值
	$('.spjs').attr('readonly','readonly');
	//$('.spjs').css('background','#F2F7DA');
	receipt();         //收货地址
	spddsubmit();      //订单结算
	setInterval(integralzh,100);       //积分转换
	setInterval(spdd,100);  //商品订单运算
	
    }
	
	if(pandan=='qrdd'){
	xiaoji();          //小计
	//spdd();            //商品订单运算
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
	receipt();         //收货地址
	spddsubmit();      //订单结算
	setInterval(integralzh,100);       //积分转换
    setInterval(spdd,100);  //商品订单运算
    }

});

});
	 