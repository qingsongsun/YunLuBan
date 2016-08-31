$(function(){
		$("#cityjqon").click(function(){
	$("#cityjq").slideToggle("slow");
	
});

$('.message-play').click(function(){
	messageon()
});

$('.m-button input').click(function(){
	var txt = $('.message_txt').val();
	var name = $('.m-name').html();			//用户姓名
	if(name==''){
		alert('请先完善资料！');
		return false;
	}
	if(txt==''){
    alert('请输入内容');
    return false;
	}
	messageoff();
	var id= $('.m-name').attr('value');			//用户ID
	var icon = '../../'+$('.m-tx').html();			//用户头像
	
	var date = new Date();
	var year = date.getYear()+1900;
	var month = date.getMonth()+1;
	
	if(month<10){
		month='0'+month;
	}
	var day = date.getDate();
	if(day<10){
		day='0'+day;
	}
	var time=year+'-'+month+'-'+day;
	$.ajax({
        type: "POST",
        url: "../../v/smarty/click.php",
        cache: false,
        data: {
            c: "lyb",
            s: "tj",
            id: id,
            txt: txt,
            time: time
        	},
        dataType: "text",
        success: function (mess) {
        },
        error: function () {
            alert("操作失败，未登录登录或网络超时");
            return false;
        }
    });
	var divin = '<li><span class="reviews_img"><img src="'+icon+'"/></span><span class="reviews_name">'+name+'</span><span class="reviews_txt">'+txt+'</span><span class="reviews_time">'+time+'</span></li>';
    $('#reviews ul li:nth-last-child(1)').remove();
	$('#reviews ul').prepend(divin);
	
});




$('.m-off').click(function(){
	messageoff()
});

$('#commodity i').each(function(){
$(this).find('li').eq(0).find('.sp-xinxi-play').addClass('sp-xinxi');
$(this).find('li').eq(1).find('.sp-xinxi-play').addClass('sp-xinxi');
$(this).find('li').eq(2).find('.sp-xinxi-play').addClass('sp-xinxi2');
$(this).find('li').eq(3).find('.sp-xinxi-play').addClass('sp-xinxi2');
$(this).find('li').eq(4).find('.sp-xinxi-play').addClass('sp-xinxi2');
$(this).find('li').eq(5).find('.sp-xinxi-play').addClass('sp-xinxi2');
})

$('#bagcheck .scontent ul li').mouseover(function(){
	var o = $(this).index()+2;
	//var a = $(this).find('img').attr('src');
	var a = '../../public/image/sgt'+o+'.jpg'
	var a = 'url('+a+')';
	var b = $(this).find('.bagcheck_txt').children('p').html();
	//var c = $(this).find('.bagcheck_txt2').html();
	$('#bagcheckimage').css('background-image',a);
	$('#bagcheckimage_p').html(b);

});

$('#bagcheck .scontent ul li').mouseout(function(){
	
	var a = '../../public/image/sgt1.jpg'
	var a = 'url('+a+')';
	var b = '拎包入住'
	//var c = $(this).find('.bagcheck_txt2').html();
	$('#bagcheckimage').css('background-image',a);
	$('#bagcheckimage_p').html(b);
});
	
$(".lausr_title2 > li").mouseover(function(){
        $(this).addClass("lion").siblings().removeClass("lion");
        var a = $(this).index();
        $(".lausr_anniu a").eq(a).addClass("block").siblings().removeClass("block");
        $("#lausr .scontent div ").eq(a).addClass("block").siblings().removeClass("block");
});

$('.homeshop_title2 > li').mouseover(function(){
        $(this).addClass("lion").siblings().removeClass("lion");
        var a = $(this).index();
        $('#commodity i').eq(0).css('display','none');
        $(" #commodity i").eq(a).addClass("block").siblings().removeClass("block");
});

$('#designer li ').each(function(){
	var a = $(this).index();
	var b = a+1;
    var imageurl = '../../public/image/hg'+b+'.png';
    $(this).find('.hgimg').attr('src',imageurl);
    
});

});
 
function bagcheck(Obj){
	var bagcheckObj = Obj.getElementsByTagName("a")[0];
	bagcheckObj.style.display ='block'

	};
function bagcheckout(Obj){
var bagcheckObj = Obj.getElementsByTagName("a")[0];
	bagcheckObj.style.display ='none'
	};
	
	function messageon(){
		$('.message').css('display','block');
		$('.message').addClass('onplay');
	}	
	
	function messageoff(){
		 $('.message').removeClass('onplay')
			$('.message').addClass('offplay');
		    var t = setTimeout(function(){$('.message').css('display','none')},500)
	}	