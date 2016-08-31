$(function(){
$("#list_lbrz  .content ul > li").mouseover(function(){
        $(this).addClass("lion").siblings().removeClass("lion");
        var a = $(this).index();
        $("#list_lbrz  .scontent span").eq(a).addClass("block").siblings().removeClass("block");
});

$('.lbrz-selectplay li').click(function(){
	var on = parseInt($(this).find('a').html());//获取点击中的内容
	var money = $(this).parents('body').find('.money').html();//获取该套餐单价
	var areaplay = '户型面积：'+on+'㎡';
	var money= money.match(/\d/g).join('');//获取该套餐单价，转化数字
	var money = parseInt(money);
	var moneyplay = '全包总价：'+on*money+'元';
	$('.area').html(areaplay);//面积赋值为点击的面积
	$('.money-play').html(moneyplay);//赋予总价 
	//alert(moneyplay)
	})


$("#cityjqon").click(function(){
	$("#cityjq").slideToggle("slow");
});
$("#preview .scontent ul > li").mouseover(function(){
        $(this).addClass("txtcolor").siblings().removeClass("txtcolor");
        var a = $(this).index();
        var y = 1-a;
        var x = 900;
        var play = x*y
        $("#preview .content div ul").animate({"margin-left":play+'px'},30);
        
});

$('.preview-ul').each(function(){
	var lihead = $(this).children('li:nth-child(2)').html();
	var lifoot = $(this).children('li:nth-last-child(2)').html();
	$(this).children('li:nth-child(1)').html(lifoot);
	$(this).children('li:nth-last-child(1)').html(lihead);

})
$('.preview-txt').each( function(){
	$(this).find('li').eq(1).addClass("txtcolor")
	
});

$(".select_list ul > li").click(function(){
        $(this).addClass("txtcolor").siblings().removeClass("txtcolor");
});
});

 