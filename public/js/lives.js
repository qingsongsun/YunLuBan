$(function(){
$('#cityjqon').click(function(){
	$('#cityjq').slideToggle('slow');
});

	$('.select_list ul > li').click(function(){
        $(this).addClass('txtcolor').siblings().removeClass('txtcolor');
});
    $('.scontent ul').each(function(){
    	var a = $(this).height();
    	var b = parseInt(a)+80;
    	$('#lives .scontent').css('height',b);
    });
});