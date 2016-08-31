
$(function(){

		



	$('.i-spdd-zj').each(function(){
	     var zj=$(this);
	     var h = zj.parents('.i-spdd-lispan2').height();
	     var ha = parseInt(h)/2-16;
	     var hb = ha+1;
	     var zt = zj.parent('.i-spdd-liright').children('.i-spdd-zt')
	     var fk = zj.parent('.i-spdd-liright').children('.i-spdd-fk')
	     var qx = zj.parent('.i-spdd-liright').children('.i-spdd-fk').find('.quxiaodd')
	     var hc = ha+30;
	     zj.css('padding-top',ha)
	     zj.css('padding-bottom',ha)
	     zt.css('padding-top',ha)
	     zt.css('padding-bottom',ha)                  
	     fk.css('padding-top',hb)
	     fk.css('padding-bottom',hb)
	     qx.css('margin-top',hc)
	     
	});





$(".i-fk > a").click(function(){
        $(this).addClass("i-fk-aon").siblings().removeClass("i-fk-aon");
        var a = $(this).index();
        $(".i-fk-jk i").eq(a).addClass("i-fk-jk-xs").siblings().removeClass("i-fk-jk-xs");       
});

$(".i-xgtxz > a").click(function(){
        $(this).addClass("i-xgtxz-aon").siblings().removeClass("i-xgtxz-aon");
        var a = $(this).index();
        $(".i-xgtjq span").eq(a).addClass("i-xgtjq-xs").siblings().removeClass("i-xgtjq-xs");      
});

$(".i-scli-img").mouseover(function(){
        $(this).find('a').css( 'display','block')
});

$(".i-scli-img").mouseout(function(){
        $(this).find('a').css( 'display','none')
});

$(".lm-list-img > a").click(function(){
 var a = $(this).find('img').attr('src');
   var l = parseInt("-" + $('.imgjq').css('width'))/2+"px";
   var t = parseInt("-" + $('.imgjq').css('height'))/2+"px";
   $(".imgjq").css('display','block');
   $(".imgjq img").attr('src',a);
   $('.imgjq').css('margin-top',t);
   $('.imgjq').css('margin-left',l);
   });
 
 $(".i-zxzb-img > a").click(function(){
   var a = $(this).find('img').attr('src');
   var l = parseInt("-" + $('.imgjq').css('width'))/2+"px";
   var t = parseInt("-" + $('.imgjq').css('height'))/2+"px";
   $(".imgjq").css('display','block');
   $(".imgjq img").attr('src',a);
   $('.imgjq').css('margin-top',t);
   $('.imgjq').css('margin-left',l);
   });
 
 $(".imgjq a").click(function(){
 	 $(".imgjq").css('display','none');
  
});
  
 $(".i-bg li:nth-child(3)> a").click(function(){
  	 var a = $(this).html();
  	 $("#i-bg-xb").attr("value",a);
});

 $(".i-bg li:nth-child(4)> a").click(function(){
  	 var a = $(this).html();
  	 $("#i-bg-qk").attr("value",a);
});

 $(".i-bg li:nth-child(8)> a").click(function(){
  	 var a = $(this).html();
  	 $("#i-bg-mj").attr("value",a);
});

 $(".i-bg li:nth-child(9)> a").click(function(){
  	 var a = $(this).html();
  	 $("#i-bg-lx").attr("value",a);
});

 $(".i-bg li:nth-child(11)> a").click(function(){
  	 var a = $(this).html();
  	 $("#i-bg-tc").attr("value",a);
});

$(".i-xgckico").click(function(){
   var a = $(this).html();
   var t = parseInt("-" + $('.i-xgckjq').css('height'))/2;
   var t1 =  parseInt(t-90)+"px"
   $('.i-xgckjq').css('display','block');
   $(".i-xgckjq-txt").html(a);
   $('.i-xgckjq').css('margin-top',t1);
});


$('.i-xgckjq a').click(function(){
	$('.i-xgckjq').css('display','none');
});
   

$(".i-shlrjq-xzlx > a").click(function(){
        $(this).addClass("i-shlrjq-aon").siblings().removeClass("i-shlrjq-aon");
        var a = $(this).index();
        $(".i-shlrjq-span ul").eq(a).addClass("i-shlrjq-spanon").siblings().removeClass("i-shlrjq-spanon");
       
});

$('.i-shlrjq span ul a').click(function(){
	$('.i-shlrjq').css('display','none');
	});
});
	




		