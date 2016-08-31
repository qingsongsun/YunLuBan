$(function(){

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

});

$('.preview-txt').each( function(){
	$(this).find('li').eq(1).addClass("txtcolor")
	
});

});

 