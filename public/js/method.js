 /*系统自动添加购物商品ID值*/
function spid(){
$('.sp').each(function(){
var ppid = $(this).parents('.i-spz').index();   //获取品牌ID
var spid = $(this).parents('.spxx').index();    //获取商品ID
var fuzhi = 'sp'+ppid+'-'+spid;                 //生成输入的ID值
$(this).attr('id',fuzhi);                       //给商品选择赋ID值
$(this).next('label').attr('for',fuzhi)         //给钩选功能赋对应的值
});
};


/*系统自动添加购物品牌ID值*/
function ppid(){
$('.pp').each(function(){
var ppid = $(this).parents('.i-spz').index();                      //获取品牌ID  
var fuzhi = 'pp'+ppid                                              //生成输入的ID值
$(this).attr('id',fuzhi);                                          //给商品选择赋ID值
$(this).next('label').attr('for',fuzhi)                            //给钩选功能赋对应的值
});
}


/*全选&取消全选*/	
function qxchecked(){
$('body').on("click",'#qx',function(){
	  	
	  	if(this.checked){
	  		$('.qx').prop("checked",true);
	  		$('.pp').prop("checked",true);
	  		$('.sp').prop("checked",true);
	  		style1();
	  		
	  		
	  	}
	  	else{
	  		$('.qx').prop("checked",false);
	  		$('.pp').prop("checked",false);
	  		$('.sp').prop("checked",false);
	  		style1();
	  		
	  		
	  	}
 });
}

/*品牌组选择&取消选选择*/
function ppchecked(){
$('body').on("click",'.pp',function(){
	  	
	  	if(this.checked){
	  		$(this).parents(".i-spz").find('.sp').prop("checked",true);
	  		style1();
	  	
	  	}
	  	else{	  		
	  		$(this).parents(".i-spz").find('.sp').prop("checked",false);
	  		style1();
	  		
	  	}
 });
}
	 
/*单商品选择&取消选选择*/
function spchecked(){
$('body').on("click",'.sp',function(){
	  	
	  	if(this.checked){
	  		$(this).prop("checked",true);
	  		style1();
	  	
	  	}
	  	else{
	  		$('.qx').prop("checked",false);
	  		$(this).parents(".i-spz").find('.pp').prop("checked",false);
	  		$(this).prop("checked",false);
	  		style1();
	  		
	  	}
 });	 
}	 
		
/*确认选择后商品样式变化 */		
function style1(){	
	$('.sp').each(function() {
			    if($(this).is(":checked")) {
			         $(this).parents('.i-gwc-ul li').css('background-color','#FDF0DD');
			}
				else{
				 	
				 	 $(this).parents('.i-gwc-ul li').css('background-color','#f2f2f2');
				 }
			});
}		


/*选择商品的件数变化*/
function sps(){
var a = $(".i-gwc-sp-checkbox [type='checkbox']:checked").length;
$('.i-spjs-yx i').html(a);	
}


/*件数输入限制为数字*/
function jsxz(){
$(".spjs").keyup(function () {
 //如果输入非数字，则替换为''
this.value = this.value.replace(/[^\d]/g, '');
var a = parseInt($(this).val());
var b = $(this).parents(".spxx").find('.spkc').html();
var c =  parseInt(b);
if (a > c){
$(this).val(c);
}
if (a < 1){
var txt = '1'
$(this).val(txt);
}
});
}

/*实时监控数值*/
//function textjs(){
//	$('.spjs').bind('input propertychange', function() {  
//		var text = $(this).val();
//	  if(text>0){
//		  alert(text)
//	  }
//	  else{
//		  alert('1')
//	  }
//	});  
//}




function gwc_Ajax(s,id,num,kc){			//购物车单个商品操作（删除，增减）
	$.ajax({
		type: "POST",
	    url: "../../v/smarty/click.php",
	    cache: false,
	    data: {
	    c: "scAjax",
	    s: s,
	    id: id,
	    num: num,
	    kc: kc,
	    },
	    dataType: "json",
	    success: function (mess) {
//	    	var no=mess.msg;
//	    	alert(no);
	    },
	    error: function () {
	        alert("操作失败，未登录登录或网络超时");
	    }
	});
	return false;
}

/*清除JSval值*/
function jsval(a){
 var inputid = 'input[name='+a+']'
 var txtval=$(inputid);

 //点击事件
txtval.click(function(){
 var value=$(this).val();
 if(value==this.defaultValue){    //defaultValue属性包含表单元素的初始值，这里即value
 $(this).val("");
}
});
 //失去焦点时的事件
txtval.blur(function(){
	var value=$(this).val();
	var id = $(this).parents('.spxx').attr('value');
	var kc = $(this).parents('.spxx').find('.spkc').html();
	 if(value==""){
			var value = '1';
	}
 	var num=value;
 	$(this).val(num);
 	gwc_Ajax('count',id,num,kc);
});
}
/*增减按钮*/
function add_subtract(){
	$('.i-sp-sl .button').click(function(){
		var shuliang = 0;
		var num=0;
		var id = $(this).parents('.spxx').attr('value');
		var kc = parseInt($(this).parents(".spxx").find('.spkc').html());		//对应库存
		var jj = $(this).attr('rel');
		if(jj=='-'){
			shuliang = parseInt($(this).next('.spjs').val());
			if(shuliang > 1){
				num = shuliang-1;
				$(this).next('.spjs').val(num);
			}else{
				return false;
			}
		}else{
			shuliang = parseInt($(this).prev('.spjs').val());
			if(shuliang < kc){
				num = shuliang+1;
				$(this).prev('.spjs').val(num);
			}else{
				return false;
			}
		}
		gwc_Ajax('count',id,num,kc);
	});
}
/*删除商品*/	
function shanchu(){
	$('.shanchu').click(function() {
		if (confirm('是否删除该商品')){
			var id = $(this).parents('.spxx').attr('value')+',';
		 	gwc_Ajax('delete',id,'','');
		 	$(this).parents('.spxx').remove();
		 	return true;
		}
	return false;
	});
};

/*选择性删除*/
function checkbox_delete(){
	$('.checkbox-delete').click(function(){
		var jianshu = $('.sp:checked').length;
		if ( jianshu > 0  ){
			if (confirm('是否删除这些商品')){
				var id="";
				for (i=0;i<jianshu;i++) {
				var value =  $('.sp:checked').eq(i).parents('.spxx').attr('value');
				id+=(value+',');
				}
				gwc_Ajax('delete',id,'','');
				$('.sp:checked').parents('.spxx').remove();
				return true;
			}
			return false;
		}//else{
		//	alert('请选择删除的商品');
		//}
	});
}


/*小计变化*/
function xiaoji(){
$('.i-sp-xj').each(function(){
var danjia = $(this).parents(".spxx").find('.spdj').html();
var shuliang = $(this).parents(".spxx").find('.spjs').val();
var yunsuan = danjia*shuliang; 
$(this).html(yunsuan.toFixed(2));
});
} 

/*合计变化*/
function hesuan(){
$('.hjzj').each(function(){
var xuanze = $('.sp:checked').length;
if(xuanze>0){
var yunsuan = $('.sp:checked').parents('.spxx').find('.i-sp-xj').map(function(){	
return $(this).html()
}).get().join('+');
var shuchu = '¥'+eval(yunsuan).toFixed(2);
$(this).html(shuchu);
}
else{
var shuchu = '¥'+'0.00'	
$(this).html(shuchu);	
}
});
};

/*全部商品数*/
function spzl(){
$('.gwc-spjs').each(function(){
var shuliang = $('.sp').length;
$(this).html(shuliang);
});
};



/*取ID*/
//function get_cookie(){
//	var ids=$.cookie("ids");
//
//	$.ajax({
//		type: "POST",
//	    url: "../../v/smarty/click.php",
//	    cache: false,
//	    data: {
//	    c: "firmOrder",
//	    s: "getCookie",
//	    ids: ids
//	    },
//	    dataType: "text",
//	    success: function (mess) {
//	    	if(mess=="暂未选定商品"){
//	    		alert(mess);
//	    		window.location.href = '../../?c=admin&a=mall_shoppingCar';
//	    		return false;
//	    	}
//	    	$('.spidPLay').each(function(){		//插入变量mess到页面；
//	    		$(this).append(mess);
//	    	});
//	    	//$.cookie("ids", null);
//	    },
//	    error: function () {
//	        alert("操作失败，未登录登录或网络超时");
//	    }
//	});
//}




/*获取购物车选择后商品所有数据*/
function gwcsubmit(){
var shuliang = $('.sp:checked').length;	                                     //已经打钩的商品数
if (shuliang>0){
	var selected=new Array();
	for (i=0;i<shuliang;i++){
		var sp = $('.sp:checked').eq(i).parents('.spxx');                             //寻找打钩中的元素
		//var arr = sp.attr('value').split(",");
		var id = sp.attr('value');
		selected.push(id);
	}
	$.cookie('selected', selected);
	window.location.href = '../../?c=admin&a=firmOrder';
//	window.location.reload();
	return true
}
else{
alert('请选择购买的商品');
return false
}

}


/*清除val值*/
function txtval(a){
 var inputid = 'input[name='+a+']'
 var txtval=$(inputid);
 //点击事件
txtval.click(function(){
 var value=$(this).val();
 if(value==this.defaultValue){    //defaultValue属性包含表单元素的初始值，这里即value
 $(this).val("")
}
});
 //失去焦点时的事件
txtval.blur(function(){
 var value=$(this).val();
 if(value==""){
 $(this).val(this.defaultValue)
}
});
}


function yunfeix(){
	$('.zyf').each(function(){
		var js = $('.spjs').val();
		var yfdj = $('.yfq').html();
		var sz ='￥'+ js*yfdj;
		$(this).html(sz);
		
	});
	
}



/*清除val值*/
function ljjsval(a){
	 var inputid = 'input[name='+a+']'
	 var txtval=$(inputid);

	 //点击事件
	txtval.click(function(){
	 var value=$(this).val();
	 if(value==this.defaultValue){    //defaultValue属性包含表单元素的初始值，这里即value
	 $(this).val("");
	}
	});
	 //失去焦点时的事件
	txtval.blur(function(){
		var value=$(this).val();
		var id = $(this).parents('.spxx').attr('value');
		var kc = $(this).parents('.spxx').find('.spkc').html();
		 if(value==""){
				var value = '1';
		}
	 	var num=value;
	 	$(this).val(num);
	});
	}

/*积分输入限制为数字*/
function jfxz(){
$(".integral-play").keyup(function () {
 //如果输入非数字，则替换为''
this.value = this.value.replace(/[^\d]/g, '');
var a = parseInt($(this).val());
var b = $(this).parents("span").find('.integral').html();
var c =  parseInt(b);
if (a > c){
$(this).val(c);
}
});
}

/*自动计算运费*/
//function cotal_freight(){
//	$('.shdzqr .add').each(function(){
//	var add =  $(this).html();
//	var province = (add.split(',')[0]).split(':')[1];
//	})
//}

/*收货地址修改*/
function receipt(){
$('.i-gwc-qrxbt  a').click(function(){
$('.shdzxz').css('display','block');
$('.shdzqr').css('display','none');
$(this).css('display','none')
});
$('.shdzxz li a').click(function(){
var name = $(this).find('.name').html();                     //获得选择的收货人
var num = $(this).find('.num').html();                       //获得选择的联系电话
var add = $(this).find('.add').html();                       //获得选择的收货地址
var Id = $(this).attr('value');
//alert (name+'|'+num+'|'+add);
//var province=(add.split(',')[0]).split(':')[1];
//alert(province);

$('.shdzqr a').attr('value',Id);
$('.shdzqr .name').html(name);
$('.shdzqr .num').html(num);
$('.shdzqr .add').html(add);
$('.shdzxz').css('display','none');
$('.shdzqr').css('display','block');
$('.i-gwc-qrxbt  a').css('display','block');
});	
$('.append').click(function(){
$('.shdzxz').css('display','none');
$('.tjdz').css('display','block');
});
}

/*添加收货地址*/
function qrdz(){
$('.qrsydz').click(function(){
var province = $(this).parents('.tjdz').find('.province').html();    //省份
var city = $(this).parents('.tjdz').find('.city').html();     //市区
var township = $(this).parents('.tjdz').find('.township').html();    //镇区
var wladd = $(this).parents('.tjdz').find('.add-detail').val();  //地址位置
//信息收集
var add = province+','+city+','+township+','+wladd         //收货地址
var num  = $(this).parents('.tjdz').find('.daknum').val();  //邮政编号
var name  = $(this).parents('.tjdz').find('.shname').val();  //收货人
var phone  = $(this).parents('.tjdz').find('.phone').val();  //手机号码
$.ajax({
    type: "POST",
    url: "../../v/smarty/click.php",
    cache: false,
    data: {
        c:"address",
        s:"add",
        add: add,
		num: num,
		name: name,
		phone: phone
    	},
    dataType: "text",
    success: function (mess){
    	if(mess){
    		alert (mess);
    	}
//    	window.location.href = '../../?c=admin&a=firmOrder';
    	window.location.reload();
    },
    error: function () {
        alert("操作失败，未登录登录或网络超时");
    }
});
//信息输出
//var scname =name;
//var scnum = num;
//var scadd = add;
//$('.shdzqr .name').html(scname);
//$('.shdzqr .num').html(scnum);
//$('.shdzqr .add').html(scadd);
//$('.tjdz').css('display','none');
//$('.shdzqr').css('display','block');
//$('.i-gwc-qrxbt  a').css('display','block');
//var divIN1= "<li><a href='javascript:void(0)'><p class='name' >收货人: ";
//var divIN2 = "</p><p class='num' >联系电话: ";
//var divIN3 = "</p><p class='add'>收货地址: ";
//var divIN4 = "</p></a></li>";
//$(".shdzxz .append").before(divIN1+scname+divIN2+scnum+divIN3+scadd+divIN4);
//$(".shdzxz").append(divIN1+scname+divIN2+scnum+divIN3+scadd+divIN4);
});
}

/*确认订单中商品总价+运费*/
function spdd(){
$('.spze').each(function(){
var yunsuan = $('.spxx').find('.i-sp-xj').map(function(){	
return $(this).html()
}).get().join('+');
var yf = $('.zyf').html();
var yfend = yf.substring(1);                                              //输出运费
var shuchu = eval(yunsuan).toFixed(2); 
var integral = parseInt($('.integral-play').val());
var integral = integral*0.01;                                             //积分转化金钱运算：积分*转换倍率
var heji = eval(yfend+'+'+shuchu+'-'+integral).toFixed(2);                //运算总金额
var zje = '¥'+heji
var shuchu2 = '¥'+eval(yunsuan).toFixed(2);
$(this).html(shuchu);                                                     //运算后得到的商品中价格
var spzjs = $('.spxx').length;
$('.spzjs').html(spzjs);                                                  //输出商品总件数
$('.spze').html(shuchu2);                                                 //输出商品总价格
$('.yfje').html(zje);                                                     //输出总金额
$('.yfzje').html(zje);
});
};


//购物车========〉确认订单
/*获取确认商品所有数据*/
function spddsubmit(){
$('.queren').click(function(){
var shuliang = $('.spxx').length;	
//输出商品信息
if (shuliang>0){
	var id="";
	var addid = $('.shdzqr a').attr('value');		//输出收货地址信息
	for (i=0;i<shuliang;i++){
		var sp = $('.spxx').eq(i);
		id += sp.attr('value')+",";
	}
}
//获取运费、消耗积分、应付总额、备注信息
var freight = $('.zyf').html();             
var freight = freight.substring(1);                    //获取运费 
var integral = $('.integral-play').val();              //使用积分
var money= $('.yfzje').html();                        
var money= money.substring(1);                         //获取应付金额
var beizhu = $('.ddbz').val();                         //获取订单备注信息
//购买商品后获得的积分 
var hdintegral = $('.spze').html(); 
var hdintegral = hdintegral.substring(1);
var hdintegral = eval(hdintegral+'*'+'0.05');			//可获积分
var score = $('.zintegral').html().substring(5);
	$.ajax({
		type: "POST",
		url: "../../v/smarty/click.php",
		cache: false,
		data: {
			c: "order",
			s: "submit",
			id: id,
			addid: addid,
			freight: freight,
			score: score,
			integral: integral,
			hdintegral: hdintegral,
			money: money,
			beizhu: beizhu
		},
		dataType: "text",
		success: function (mess) {
			if(mess){
				$.cookie('order_num', mess);
			}
			window.location.href = '../../?c=admin&a=pay';
		},
		error: function () {
			alert("操作失败，未登录登录或网络超时");
		}
	});
});
}


//立即购买========〉确认订单
/*获取确认商品所有数据*/
function ljspddsubmit(){
$('.queren').click(function(){
		var sp = $('.spxx');                           //寻找打钩中的元素
		var spjs = sp.find('.spjs').val();                                           //商品件数
//		var spxj = sp.find('.i-sp-xj').html();                                       //商品小计
		var addid = $('.shdzqr a').attr('value');	
		var freight = $('.zyf').html();             
		var freight = freight.substring(1);                    //获取运费  
		var integral = $('.integral-play').val();              //获取使用积分
		var money= $('.yfzje').html();                        
		var money= money.substring(1);                         //获取应付金额
		var beizhu = $('.ddbz').val();                         //获取订单备注信息
		//购买商品后获得的积分 
		var hdintegral = $('.spze').html(); 
		var hdintegral = hdintegral.substring(1);
		var hdintegral = eval(hdintegral+'*'+'0.05'); //可获积分
		var score = $('.zintegral').html().substring(5);
		$.ajax({
			type: "POST",
			url: "../../v/smarty/click.php",
			cache: false,
			data: {
				c: "ljgm",
				s: "submit",
				number: spjs,
				addid: addid,
				freight: freight,
				score: score,
				integral: integral,
				hdintegral: hdintegral,
				money: money,
				beizhu: beizhu
			},
			dataType: "text",
			success: function (mess) {
				if(mess){
					$.cookie('order_num', mess);
				}
				window.location.href = '../../?c=admin&a=pay';
			},
			error: function () {
				alert("操作失败，未登录登录或网络超时");
			}
		});
});
}







/*时间转化格式*/
function endtime()
    {
        var	nowDate = new Date;
        var now = new Date(nowDate.getTime() + 72*60*60*1000);  //当前时间+3天= 订单自动取消时间
        var year = now.getFullYear();       //年
        var month = now.getMonth() + 1;     //月
        var day = now.getDate();            //日
        var hh = now.getHours();            //时
        var mm = now.getMinutes();          //分
        var ss = now.getSeconds();          //毫秒
        if(month < 10){
        var month ='0'+month 
        }
  
        if(day < 10){
        var day ='0'+day 
        }
        if(hh < 10){
        var hh ='0'+hh 
        }
        if (mm < 10){ 
        var mm ='0'+mm
        }
        if (ss < 10){ 
        var ss ='0'+ss
        }
        var endtime = year+"-"+month+"-"+day+" "+hh+":"+mm+':'+ss
        alert(endtime);
        
    }
    
/*可用积分转化值*/
function integralzh(){
$('.integral').each(function(){
	var zintegral = $('.zintegral').html();
	var zintegral = zintegral.substring(5);
	var zhintegral = $('.spze').html(); 
	var zhintegral = zhintegral.substring(1);
	var zhintegral = eval(zhintegral+'*'+'0.1');
	var zhintegral =  parseInt(zhintegral);
	if(zhintegral < zintegral){
	$(this).html(zhintegral);	
	}
	else{
	$(this).html(zintegral);	
	}
});
}

//件数输入
function jsxz(){
	$(".spjs").keyup(function () {
	 //如果输入非数字，则替换为''
	this.value = this.value.replace(/[^\d]/g, '');
	var a = parseInt($(this).val());
	var b = $(this).parents(".spxx").find('.spkc').html();
	var c =  parseInt(b);
	if (a > c){
	$(this).val(c);
	}
	if (a < 1){
	$(this).val(1);
	}

	});
	}

	/*减少数量按钮*/
	function lefton(){
	$('.i-sp-left').click(function(){	
	var kc = parseInt($(this).parents(".spxx").find('.spkc').html());
	var shuliang = parseInt($(this).next('.spjs').val());
	//alert(kc+','+shuliang)
	if(shuliang>1){
	var yunsuan = shuliang-1
	$(this).next('.spjs').val(yunsuan);
	}
	spdd();
	});
	}


	/*增加数量按钮*/	    
	function righton(){
	$('.i-sp-right').click(function(){
	var kc = parseInt($(this).parents(".spxx").find('.spkc').html());
	var shuliang = parseInt($(this).prev('.spjs').val());
	if( shuliang < kc){
	var yunsuan = shuliang+1
	$(this).prev('.spjs').val(yunsuan);
	}
	spdd();
	});
	}






//----end 购物车-----//



/*订单倒计时*/
function updateEndTime()
{
var date = new Date();
var time = date.getTime();
$(".end-time").each(function(i){
var endDate =this.getAttribute("endTime"); //结束时间字符串
//转换为时间日期类型
var endDate1 = eval('new Date(' + endDate.replace(/\d+(?=-[^-]+$)/, function (a) { return parseInt(a, 10) - 1; }).match(/\d+/g) +')');
var endTime = endDate1.getTime(); //结束时间毫秒数
var lag = (endTime - time) / 1000; //当前时间和结束时间之间的秒数
if(lag > 0)
{
var s = Math.floor(lag % 60); 
var m = Math.floor((lag / 60) % 60);
var h = Math.floor((lag / 3600) % 24);
var d= Math.floor((lag / 3600) / 24);
var new_h = h+d*24;
if(m<10){
 var m ='0'+m
}
if(s<10){
 var s ='0'+s
}
if(new_h<10){
 var new_h ='0'+new_h
}
$(this).html(new_h+":"+m+":"+s);
}
else{	
}
});
setTimeout("updateEndTime()",1);
}

/*已支付状态后，倒计时时间清空*/
function alreadypaid(){
$('.order-status').each(function(){
var status = $(this).find(".status").html();
if ( status=='已收货'){
$(this).find(".label").attr('endTime','');
}
if ( status=='已支付'){
$(this).find(".label").attr('endTime','');
}	
});	
}

/*自动给未付款的订单添加选择按钮ID*/
function orderid(){
$('.selector-button').each(function(){
var order = $(this).parents('.commodity-order').index();
var assignment = 'order'+order;
$(this).attr('id',assignment);                                          
$(this).next('label').attr('for',assignment)                            
});	
}

/*合拼件数统计*/
function jointorder(){
$('.joint-order').each(function(){
var packages = $('.selector-button:checked').length;
$(this).html(packages);
});
}

/*合拼价格统计*/
function needprice(){
$('.need-price').each(function(){
var packages = $('.selector-button:checked').length;
if( packages >0){
var yunsuan = $('.selector-button:checked').parents('.commodity-order').find('.price').map(function(){	
return $(this).html()
}).get().join('+');
var shuchu = '¥'+eval(yunsuan).toFixed(2);
$(this).html(shuchu);
}
else{
var shuchu = '¥'+'0.00'	
$(this).html(shuchu);	
}
//$(this).html(packages);
});
}

/*订单单选*/
function oneorder(){
$('body').on("click",'.selector-button',function(){
if(this.checked){
$(this).prop("checked",true);
}
else{
$('.check-all').prop("checked",false);
$(this).prop("checked",false);
}
});	 	
}

/*订单全选*/
function allorder(){
$('body').on("click",'.check-all',function(){
if(this.checked){
$(this).prop("checked",true);
$('.selector-button').prop("checked",true);
} 	
else{
$(this).prop("checked",false);
$('.selector-button').prop("checked",false);
}
});
}

/*立即支付*/
//function immediatepay(){
//$('.immediatepay').click(function(){
//var order_num = $(this).parents('.commodity-order').attr('value');
//$.cookie('order_num',order_num);
//window.location.href = '../../?c=admin&a=pay';
//
//});
//}
///*提醒商家*/
//function warn(){
//$('.warn').click(function(){
////var orderid = $(this).parents('.commodity-order').attr('value');
//alert("提醒成功");
//});
//}
///*删除订单*/
//function Delete(){
//$('.delete').click(function(){
//	if (confirm('确定删除该订单？')){
//		var orderid = $(this).parents('.commodity-order').attr('value');
//		//alert(orderid)
//		return true;
//	}
//	return false;
//});
//}
///*确认收货*/
//function take(){
//$('.take').click(function(){
//var orderid = $(this).parents('.commodity-order').attr('value');
//alert(orderid)
//});
//}

/*合拼支付*/
function take(){
$('.together').click(function(){
var quantity = $('.selector-button:checked').length;
if (quantity>0){
for(i=0;i<quantity;i++){
var orderid = $('.selector-button:checked').eq(i).parents('.commodity-order').attr('value');   //合拼支付订单的每个订单的value值
alert(orderid)  
}
var price = $('.need-price').html();
var price = price.substring(1);  //合拼后的价钱
alert(price)
}
else{
alert('没有合拼的订单')
}
});
}

/*筛选订单*/
function Screen(){
$('.i-lc > a').click(function(){
$(this).addClass("ico-on").siblings().removeClass("ico-on");
var rel = $(this).attr('rel');
//alert(rel)
if(rel == 'nopayment'){
$('.i-spdd-ul').addClass('nopayment');
}
else{
$('.i-spdd-ul').removeClass('nopayment');	
}
});
}

function spdd_json(){
	$('.spdd_json').click(function(){
	var rel = $(this).attr('rel');
	//付款
	if(rel=='f'){
	var order = $(this).parents('.commodity-order').attr('value');
	$.cookie('order_num',order);
	window.location.href = '../../?c=admin&a=pay';
	}
	//取消、删除
	if(rel=='q'||rel=='c'){
		var mess='';
		var s="del";
		if(rel=='q'){
			mess="是否取消该订单";
			s="qx";
		}else{
			mess='是否删除该订单';
		}
		if (confirm(mess)){
			var order_num = $(this).parents('.commodity-order').attr('value');
			 $.ajax({
		         type: "POST",
		         url: "../../v/smarty/click.php",
		         cache: false,
		         data: {
		             c: "ordered",
		             s: s,
		             id: order_num
		         	},
		         dataType: "text",
		         success: function (mess) {
		         },
		         error: function () {
		             alert("操作失败，未登录登录或网络超时");
		         }
		     });
		$(this).parents('.commodity-order').remove();
		return true;
		}
	return false;
	}
	//收货
	if(rel=='s'){
	var order_num = $(this).parents('.commodity-order').attr('value');
	$.ajax({
        type: "POST",
        url: "../../v/smarty/click.php",
        cache: false,
        data: {
            c:"order",
            s:"qrsh",
            id: order_num
        	},
        dataType: "text",
        success: function (mess) {
        },
        error: function () {
            alert("操作失败，未登录登录或网络超时");
        }
    });
	var status = $(this).parents('.commodity-order').find('.status');
	var label =  $(this).parents('.commodity-order').find('.label');
	var input = $(this).parents('.commodity-order').find('.i-spdd-fk input');
	var a = '已收货';
	var b = '交易成功';
	var c = '删除';
	status.html(a);
	label.html(b);
	input.attr('value',c);
	input.attr('rel','q');
	input.addClass('aon');
//	alert(order);
	}
	//提醒
	if(rel=='t'){
	var order = $(this).parents('.commodity-order').attr('value');
	alert('提醒成功！')
	}
	
	});
		
	}








//----end 商品订单----//


/*收货地址条数*/
function shtiaodshu(){
$('.i-shdz-sl i ').each(function(){
var tiaoshu = $('.i-shdz-dzul li ').length;
$(this).html(tiaoshu);
});
}

/*修改地址*/
function xiugaiIn(){
//触发	
$('.xiugaiOn').click(function(){
	$('.xiugai').css('display','block');
	var name = $(this).parents('.xxadd').find('.name').html();
	var add = $(this).parents('.xxadd').find('.add').html();
	var bm = $(this).parents('.xxadd').find('.bm').html();
	var num = $(this).parents('.xxadd').find('.num').html();
	var valid =  $(this).parents('.xxadd').attr('value')
	var result=add.split(",");
	$('.xiugai .province').html(result[0]);
	$('.xiugai .city').html(result[1]);
	$('.xiugai .township').html(result[2]);
	$('.xiugai').find('.add').attr('value',result[3]);
	$('.xiugai').find('.name').attr('value',name);
	$('.xiugai').find('.phone').attr('value',num);
	$('.xiugai').find('.num').attr('value',bm);
	$('.xiugai').attr('value',valid);
});

//取消
$('.xiugaiOff').click(function(){
	$('.xiugai').css('display','none');	
});
	
//提交信息
$('.xgqrdz').click(function(){
    var province = $(this).parents('.xiugai').find('.province').html();
    var city = $(this).parents('.xiugai').find('.city').html();	
    var township = $(this).parents('.xiugai').find('.township').html();
    var add = $(this).parents	('.xiugai').find('.add').val();
    var num = $(this).parents('.xiugai').find('.num').val();
    var name = $(this).parents('.xiugai').find('.name').val();
    var phone = $(this).parents('.xiugai').find('.phone').val();
    var add = province+','+city+','+township+','+add;
    var id = $(this).parents('.xiugai').attr('value');
    $('.xiugai').css('display','none');
    //alert(add+'|'+name+'|'+num+'|'+phone+'|'+id);
    var xxid = '.xxadd[value='+id+']';
   
	$.ajax({
		type: "POST",
		url: "../../v/smarty/click.php",
		cache: false,
		data: {
			c: "address",
			s: "modify",
			id: id,
			add: add,
			num: num,
			name: name,
			phone: phone
		},
		dataType: "text",
		success: function (mess) {
			 $(xxid).find('.name').html(name);
			 $(xxid).find('.add').attr('title',add);
			 $(xxid).find('.add').html(add);
			 $(xxid).find('.num').html(phone);
			 $(xxid).find('.bm').html(num);
		},
		error: function () {
			alert("修改失败");
		}
	});
});

}

/*默认REL*/
function morenRel(){
$('.moren').each(function(){
	var rel = $(this).attr('rel');
	if(rel == 'on'){
	var txt  = '已默认'	
	$(this).html(txt);
	$(this).css('color','#E60641');
	}
	else{
	var txt  = '设为默认'	
	$(this).html(txt);
	$(this).css('color','#000');
	}
});
}


//----end 收货地址----//
function IMGupload(){
	$('.i-tx-xg').dblclick(function(){
		$('.i-tx-xg input').click();
	});
	
}

//----end 我的资料----//


//----end 修改密码----//
//----end 个人中心完毕 ----//

//搜索框
function seArch(){
$('.search .subimt').click(function(){
var keyword = $('.search  .keyword').html();
var txt =  $('.search .txt').val();
alert(keyword+','+txt)
});
}

//综合排序
function sort(){
$('.option .select li').click(function(){ sortPLAY(); });
$('.option li input').blur(function(){ sortPLAY();  })
}

//失去焦点取值1
function sortPLAY(){
$('.option').each(function(){
var classify =$('.classify dt').html();
var sales = $('.sales dt').html();
var price = $('.price dt').html();
var low = $('.low').val();
var tall = $('.tall').val();
var peisong = $('.peisong dt').html();
alert(classify+','+sales+','+price+','+low+','+tall+','+peisong);
});
}

//----end 商城完毕----//


//选择样式
function _select(){
	
	//点击显示选项
   $('dt').click(function(){
   var ul =  $(this).parents('.select').find('dd').css('display');
   if(ul == 'none'){
   	$('.select dd').css('display','none');
   	$(this).parents('.select').find('dd').css('display','block');
   }
   else{
   	$(this).parents('.select').find('dd').css('display','none');
   }
   });
   //点击确认选项
   $('.select li').click(function(){
   var html = $(this).html();
   $(this).parents('.select').find('dt').html(html);
   $(this).parents('.select').find('dd').css('display','none');
   var a = $(this).parents('ul').attr('class');
   var c = '选择城市';
   var t = '选择镇区';
   if( a == 'province-ul'){
   	$(this).parents('.cityint').find('.city').html(c);
   	$(this).parents('.cityint').find('.township').html(t);
   }
   if( a == 'city-ul'){
   	$(this).parents('.cityint').find('.township').html(t);
   }
   });

}

/*判断 select 选择项*/
function _select_ul(){	
$('.select ul').each( function(){
	var li = $(this).find('li').length;
	if(li<5){
	$(this).css('width','90px');
	}
	else{
	$(this).css('width','360px');	
	}
});
}

//性别选择
function staTus(){
$(".i-bg li  > a").click(function(){
$(this).addClass("i-bgico-on").siblings().removeClass("i-bgico-on");
});	
}

//正则表达式
function expression(){
Inputplay('.i-bg .name','*名字不能为空',/^[\u4E00-\u9FA0\s]{1,5}$/,'*名字格式错误,请输入1-5个汉字');	
Inputplay('.i-bg .village','*小区不能为空',/^[0-9A-Za-z\u4e00-\u9fa5]{2,14}$/,'*输入有误,请控制在2-14个字符之内');	
Inputplay('.i-bg .add','*地址不能为空',/^[0-9A-Za-z\u4e00-\u9fa5]{2,14}$/,'*输入有误,请控制在2-14个字符之内');
Inputplay('.i-bg .areas','*面积不能为空',/^(([0-9]+\.[0-9]*[1-9][0-9]*)|([0-9]*[1-9][0-9]*\.[0-9]+)|([0-9]*[1-9][0-9]*))$/,'*输入有误');
Inputplay('.add-play','*地址不能为空',/^[0-9A-Za-z\u4e00-\u9fa5]{2,14}$/,'*输入有误,请控制在2-14个字符之内');
Inputplay('.num-play','*邮政编码不能为空', /^[0-9]{6,6}$/,'*输入有误,请输入正确邮政编码');
Inputplay('.name-play','*名字不能为空',/^[\u4E00-\u9FA0\s]{1,5}$/,'*名字格式错误,请输入1-5个汉字');
Inputplay('.ipone-play','*手机号码不能为空',/^1[3|4|5|8]\d{9}$/,'*手机格式错误,请重新输入');
}



function Inputplay(classid,nulltxt,expression,layouttxt){
var red = classid+' .red';
var Input = classid+' input';
var id = classid;
$(Input).focus(function(){	
$(red).remove();	
});
	
$(Input).blur(function(){	
var val = $(this).val();
if(val ==''){ 
var divIn = "<div class='red'>"+nulltxt+"</div>";
$(id).append(divIn)
return false; 
} 
if (!val.match(expression)) { 
var divIn = "<div class='red'>"+layouttxt+"</div>";
$(id).append(divIn)
return false; 
} 
return true; 
});
};

//----end 共用 ----//