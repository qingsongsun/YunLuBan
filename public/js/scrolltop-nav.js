window.onscroll=function(){
if($(document).scrollTop()>45){
$('header').addClass("scrolltop");
}
if($(document).scrollTop()<45){
$('header').removeClass("scrolltop");
}
} ;

$(function(){
	

$("#cityjqon").click(function(){
	$("#cityjq").slideToggle("slow");
});

 
$('.select_list').each(function(){
	var select01txt = $('.select-jq-01').html();
	var select02txt= $('.select-jq-02').html();
	var select03txt= $('.select-jq-03').html();
	var select01 ='a:contains('+select01txt+')'//查询HTML文字中含有select01的class，html的值
	var select02 ='a:contains('+select02txt+')'
	var select03 ='a:contains('+select03txt+')'
	$(select01).addClass('txtcolor');
	$(select02).addClass('txtcolor');
	$(select03).addClass('txtcolor');
 });

$("nav ul > li").mouseover(function(){
        $('.dhjq .lion').css('border-bottom','3px solid #fff ')
        $(this).addClass("lion2").siblings().removeClass("lion2");
});
$("header").mouseout(function(){
   $('.dhjq .lion').css('border-bottom','3px solid #8cbe23 ')
   $(this).find('ul').children("li").removeClass("lion2");
});

$("#body").each(function(){
var a = $(this).attr('class');

if(a == 'web-index' ){
$('nav').find('li').eq(0).addClass("lion");//设定样式
}
if(a == 'web-398' ){
$('nav').find('li').eq(1).addClass("lion");//设定样式
}

if(a == 'web-supermaket' ){
$('nav').find('li').eq(3).addClass("lion");//设定样式
}

if(a == 'web-supermaket' ){
$('nav').find('li').eq(3).addClass("lion");//设定样式
}

if(a == 'web-lbrz' ){
$('nav').find('li').eq(2).addClass("lion");//设定样式
}
if(a == 'web-designer' ){
$('nav').find('li').eq(4).addClass("lion");//设定样式
}

if(a == 'web-case' ){
$('nav').find('li').eq(5).addClass("lion");//设定样式
}

if(a == '' ){
$('nav').find('li').removeClass("lion");//设定样式
}
});

$('#lives').each(function(){
	var livestxt = '施工完成';
	var lives = 'a:contains('+livestxt+')';
	$(lives).parent().addClass('liveson');
	
});



$("#preview .content div ul ").css({"width":$("#preview .content div ul  li").length*900,});//设定UL大小
$("#case_preview .content div ul ").css({"width":$("#case_preview .content div ul  li").length*900,});//设定UL大小
$("#lives .sontent  ul ").css({"height":$("#lives .sontent  ul li:nth-child(3n-2)").length*378.5,});//设定UL大小

});



