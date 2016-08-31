
$(function() {


    //案例点赞
    $(".aldz").click(function() {
        var id = $(this).attr("value");
        $.ajax({
            type: "POST",
            url: "../../v/smarty/click.php",
            cache: false,
            data: {
                c:"al",
                s:"dz",
                id:id
            	},
            dataType: "json",
            success: function (mess) {
                //alert(mess.msg);
            	aldzys(mess);
            },
            error: function () {
                alert("操作失败，未登录登录或网络超时");
            }
        });
        return false;
    });

    
    //案例收藏
    $(".alsc").click(function() {
        var id = $(this).attr("value");
         //alert(id);
        $.ajax({
            type: "POST",
            url: "../../v/smarty/click.php",
            cache: false,
            data: {
                c:"al",
                s:"sc",
                id:id
            	},
            dataType: "json",
            success: function (mess) {
                //alert(mess);
            	alscys(mess);
            },
            error: function () {
                alert("操作失败，未登录登录或网络超时");
            }
        });
        return false;
    });

    
    //设计师点赞
    $(".sjsdz").click(function() {
        var id = $(this).attr("value");
//        alert(id);
        $.ajax({
            type: "POST",
            url: "../../v/smarty/click.php",
            cache: false,
            data: {
                c: "sjs",
                s: "yhdz",
                id: id
            	},
            dataType: "json",
            success: function (mess) {
//                alert(mess.msg);//+','+mess.dzs);
                sjsdzys(mess);
            },
            error: function () {
                alert("操作失败，未登录登录或网络超时");
            }
        });
        return false;
    });
    
    
    //设计师收藏
    $(".sjssc").click(function() {
        var id = $(this).attr("value");
        //alert(id);
        $.ajax({
            type: "POST",
            url: "../../v/smarty/click.php",
            cache: false,
            data: {
                c:"sjs",
                s:"sc",
                id:id
            	},
            dataType: "json",
            success: function (mess) {
            	sjsscys(mess);
            },
            error: function () {
                alert("操作失败，未登录登录或网络超时");
            }
        });
        return false;
    });
    
    
    //设计师收藏样式
    function sjsscys(mess){
    	 var sjsscid ='#sjsscid'+mess.id;
    	if(mess.msg == 1) {
    		var txt = '已收藏'	
    		$(sjsscid).html(txt);
    		$(sjsscid).addClass("scon")
    	}else{
    		var txt = '收藏'	
    		$(sjsscid).html(txt);
    		$(sjsscid).removeClass("scon")
    	}
    };
    	
    
	//设计师点赞样式
   function sjsdzys(mess){
	   var sjsdzid ='#sjsdzid'+mess.id;
	   if(mess.msg == 1) {      
		   $(sjsdzid).html(mess.dzs);
		   $(sjsdzid).addClass("dzon");
	   }else{
		   $(sjsdzid).html(mess.dzs);
		   $(sjsdzid).removeClass("dzon");
	   }
   };
   
   
   //案例收藏样式
   function alscys(mess){
	   var alscid ='#alscid'+mess.id;
	   if(mess.msg ==  1) {
		   var txt = '已收藏'	
		   $(alscid).html(txt);
		   $(alscid).addClass("scon")
	   }else{
		   var txt = '收藏'	
		   $(alscid).html(txt);
		   $(alscid).removeClass("scon")
	   }
   };
    	
    
	//案例点赞样式
   function aldzys(mess){
	   var aldzid ='#aldzid'+mess.id;
	   if(mess.msg == 1) {      
		   $(aldzid).html(mess.dzs);
		   $(aldzid).addClass("dzon");
	   }else{
		   $(aldzid).html(mess.dzs);
		   $(aldzid).removeClass("dzon");
	   }
   };
   
   
   		//加入购物车 、立即购买
	   $('.goumai_play').click(function(){
		   	 var s  = $(this).attr('rel');
			 var at  = $('#ppm').html();  							//品牌名
			 var bt  = $('#spm').html();  							//商品名
	  		 var fb = $('.sp-fubiao').html();						//短介绍
	  		 var xsj = $('.ggjg1').html().substring(1); 		//商城价
	  		 var scj = $('.ggjg2').html().substring(1);		//市场价
	  		 var ysstart = $('.introducesa').html();		
	  		 var ysend = ysstart.indexOf('<');
	  		 var ys = ysstart.substring(0,ysend); 			//样式
	  		 var kc = $('.sp-kcplay').html();
	  		 var kcstart = kc.indexOf('存');
	  		 var kcend = kc.indexOf('件');
	  		 var kc =  parseInt(kc.substring(kcstart+1,kcend));		//对应库存
	  		 var sl = $('#shuliang').val(); 							//数量
	  		 var spimg = $('#introducesimg').attr('rel')	//图片
	  		 var id = $('.sp-biaoti').attr('rel');					//商品id
		  		$.ajax({
	   			 type: "POST",
	   	         url: "../../v/smarty/click.php",
	   	         cache: false,
	   	         data: {
	   	             c:"sp",
	   	             s: s,
	   	             pp:at,
		 	             name:bt,
		 	             shortDesc:fb,
		 	             price:xsj,
		 	             marketPrice:scj,
		 	             type:ys,
		 	             number:sl,
		 	             src:spimg,
		 	             id:id,
		 	             kc: kc
	   	         },
	   	         dataType: "text",
	   	         success: function (mess) {
	   	        	 if(mess){
	   	        		 alert(mess);
	   	        	 }else{
	   	        	 	window.location.href = '../../?c=admin&a=firmOrder&pdt=sale';
	   	         	 }
	   	         },
	   	         error: function () {
	   	             alert("操作失败，未登录登录或网络超时");
	   	         }
	   		 });
	   		 return false;
		   });
	   
    
    //删除收藏设计师
    $(".scsjs").click(function() {
        var id = $(this).attr("value");
        $.ajax({
            type: "POST",
            url: "../../v/smarty/click.php",
            cache: false,
            data: {
                c:"sc",
                s:"sjs",
                id:id
            	},
            dataType: "text",
            success: function (mess) {
            	if(mess){
					//location.replace(document.referrer);
					window.location.href = '../../?c=admin&a=collect_designer';
				}
            },
            error: function () {
                alert("操作失败，未登录登录或网络超时");
            }
        });
        return false;
    });
    
    
    //删除收藏案例
    $(".scal").click(function() {
        var id = $(this).attr("value");
        $.ajax({
            type: "POST",
            url: "../../v/smarty/click.php",
            cache: false,
            data: {
                c:"sc",
                s:"al",
                id:id
            	},
            dataType: "text",
            success: function (mess) {
            	if(mess){
            		window.location.href = '../../?c=admin&a=collect_case';
            	}
            },
            error: function () {
                alert("操作失败，未登录登录或网络超时");
            }
        });
        return false;
    });
    
    
    //提交项目订单
    $('.zxdsubmit').click(function(){
		if(confirm('是否提交该订单')) {
			var phone = $('.phone input').val(); 									//手机号码帐号
			var name = $('.name input').val(); 									//姓名
			var sex = $('.sex .i-bgico-on ').html(); 								//性别
			var condition = $('.condition .i-bgico-on ').attr('value');	 	//房屋情况
			var village = $('.village input').val(); 									//小区名称
			var province = $('.province').html();
			var city = $('.city').html();
			var township = $('.township').html();
			var add = $('.add input').val();
			var addIn = province + ',' + city + ',' + township + ',' + add;			//地址
			var type = $('.type .i-bgico-on ').attr('value');
			var Style = $('.style .i-bgico-on ').attr('value');
			var areas = $('.areas input').val();
			var setmeal = $('.setmeal .i-bgico-on ').attr('value');
			//alert(phone+'|'+name+'|'+sex+'|'+condition+'|'+village+'|'+addIn+'|'+type+'|'+Style+'|'+areas+'|'+setmeal);
			//phone：手机号码、name：姓名、sex:性别、condition:房屋情况、
			//village:小区名称、addIn:详细地址、type:户型、Style:房屋类型、areas:建筑面积、setmeal:选择套餐
			if(village==""&&province=="选择省份"&&city=="选择城市"&&township=="选择镇区"&&add==""&&areas==""){
				alert("信息不能为空！");
				return false;
			}
			$.ajax({
				type: "POST",
				url: "../../v/smarty/click.php",
				cache: false,
				data: {
					c: "xm",
					s: "dd",
					phone: phone,
					name: name,
					sex: sex,
					condition: condition,
					village: village,
					city: city,
					addIn: addIn,
					type: type,
					Style: Style,
					areas: areas,
					setmeal: setmeal
				},
				dataType: "text",
				success: function (mess) {
					if (mess)window.location.href = '../../?c=admin&a=work_order';
				},
				error: function () {
					alert("操作失败，未登录登录或网络超时");
				}
			});

			return false;
		}
		return false;
    	});


    	//修改资料
		$('.tjzl').click(function(){
			var name = $('.i-bg .name').attr('value');  //真实姓名
			var sex = $('.i-bg .i-bgico-on').html(); //性别
			var date = $('.i-bg .date').val();  //出生日期
			//alert(name+'，'+sex+','+date);
			$.ajax({
				type: "POST",
				url: "../../v/smarty/click.php",
				cache: false,
				data: {
					c: "mb",
					s: "set",
					//phone: phone,
					name: name,
					sex: sex,
					date: date
				},
				dataType: "text",
				success: function (mess) {
					//if (mess)
						alert(mess);
						//window.location.href = '../../?c=admin&a=set_data';
				},
				error: function () {
					alert("操作失败，未登录登录或网络超时");
				}
			});
		});

		
		//修改密码
		$('.resetpwd').click(function(){
			var Password = $('.i-bg').find('.password input').val();
			var NewPassword = $('.i-bg').find('.newpassword input').val();
			var AffirmPassword = $('.i-bg').find('.affirmpassword input').val();
			//alert(Password+'|'+NewPassword+'|'+AffirmPassword)
			$.ajax({
				type: "POST",
				url: "../../v/smarty/click.php",
				cache: false,
				data: {
					c: "pwd",
					s: "reset",
					Password: Password,
					NewPassword: NewPassword
				},
				dataType: "json",
				success: function (mess) {
					if(mess.boo){
						alert(mess.msg);
						window.location.href = '../../?c=admin&a=set_password';
						//延时跳转： window.setTimeout("window.location='../../?c=admin&a=set_password'",1000);
					}else{
						alert(mess.msg);
					}
				},
				error: function () {
					alert("修改失败");
				}
			});
		});
		
		
		//添加收货地址
		$('.qrdz').click(function(){
			var province = $(this).parents('.tjdz').find('.province').html();    //省份
			var city = $(this).parents('.tjdz').find('.city').html();     //市区
			var township = $(this).parents('.tjdz').find('.township').html();    //镇区
			var wladd = $(this).parents('.tjdz').find('.add').val();  //地址位置
			//信息收集
			var add = province+','+city+','+township+','+wladd         //收货地址
			var num  = $(this).parents('.tjdz').find('.num').val();  //邮政编号
			var name  = $(this).parents('.tjdz').find('.name').val();  //收货人
			var phone  = $(this).parents('.tjdz').find('.phone').val();  //手机号码
			//alert(num+','+name+','+phone+','+ add);
			$.ajax({
				type: "POST",
				url: "../../v/smarty/click.php",
				cache: false,
				data: {
					c: "address",
					s: "add",
					add: add,
					num: num,
					name: name,
					phone: phone
				},
				dataType: "text",
				success: function (mess) {
					if(mess){
						alert(mess);
					}
					window.location.href = '../../?c=admin&a=mall_address';
				},
				error: function () {
					alert("操作失败，未登录登录或网络超时");
				}
			});
		});
		
		//默认地址
		$('.moren').click(function(){
			$('.moren').attr('rel','off');
			$(this).attr('rel','on');
			var id =$(this).parents('.xxadd').attr('value');
			//alert(id)
			$.ajax({
				type: "POST",
				url: "../../v/smarty/click.php",
				cache: false,
				data: {
					c: "address",
					s: "default",
					id: id
				},
				dataType: "text",
				success: function (mess) {
					if(!mess)
						alert("设置失败");
//						window.location.href = '../../?c=admin&a=mall_address';
				},
				error: function () {
					alert("设置失败");
				}
			});
			});
		
		
		//删除该条收货地址信息
		$('.xxadd .delete').click(function(){
			if (confirm('是否删除该地址')){
			var id = $(this).parents('.xxadd').attr('value');
			var xxid = '.xxadd[value='+id+']';
			//alert(id);
			$.ajax({
				type: "POST",
				url: "../../v/smarty/click.php",
				cache: false,
				data: {
					c: "address",
					s: "delete",
					id: id
				},
				dataType: "text",
				success: function (mess) {
					$(xxid).remove();
				},
				error: function () {
					alert("删除失败");
				}
			});
			return true;
			}
			return false;	
		});
			
    
});