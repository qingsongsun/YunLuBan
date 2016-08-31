$(function(){
	$(".select").each(function(){
	    var s=$(this);
		var z=parseInt(s.css("z-index"));
		var dt=$(this).children("dt");
		var dd=$(this).children("dd");
		var _show=function(){dd.slideDown(200);dt.addClass("cur");s.css("z-index",z+1);};  
		var _hide=function(){dd.slideUp(200);dt.removeClass("cur");s.css("z-index",z);};   
		dt.click(function(){dd.is(":hidden")?_show():_hide();});
		dd.find("li").click(function(){
			var a = $(this).html();
			var b = $(this).children("input").val();
			$(this).parents(".select").children(".select-play").attr("value",b);
			dt.html(a);
			_hide();
		});    
		$("body").click(function(i){ !$(i.target).parents(".select").first().is(s) ? _hide():"";});
	});
});