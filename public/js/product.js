$(function(){

$('.sp-yangse span > a').click(function(){
	    var a = $(this).index();
	    var b = $('.sp-img li').eq(a);
	    var c = $('.sp-img li').eq(a).find('img').attr('src');
	    var rel = $('.sp-img li').eq(a).find('img').attr('rel');
	    var d = '¥'+$(this).find('.sp-j1').html();
	    var d2 = '¥'+$(this).find('.sp-j2').html();
	    var kc = '[库存'+$(this).find('.sp-kc').html()+'件]';
        $(this).addClass('introducesa').siblings().removeClass('introducesa');
        b.addClass('lion').siblings().removeClass('lion');
        $('#introducesimg').attr('src',c);
        $('#introducesimg').attr('rel',rel);
        $('.ggjg1').html(d);
        $('.ggjg2').html(d2);
        $('.sp-kcplay').html(kc);
        $('.sp-yangse').attr('rel','on')
        $('.sp-yangse').removeClass('yangse-off');
        $('.ysoff').css('display','none');
        //var f = $(this).find('div');
        //f.addClass('yson').siblings().removeClass('yson');
        
});

$('.sp-img  > li').click(function(){
	    var a = $(this).index();
	    var b = $('.sp-yangse span a').eq(a);
	    var c = $(this).find('img').attr('src');
	    var d = '¥'+$('.sp-yangse span a').eq(a).find('.sp-j1').html();
	    var d2 = '¥'+$('.sp-yangse span a').eq(a).find('.sp-j2').html();
	    var kc = '[库存'+$('.sp-yangse span a').eq(a).find('.sp-kc').html()+'件]';
	    b.addClass('introducesa').siblings().removeClass('introducesa');
        $(this).addClass('lion').siblings().removeClass('lion');
        $('#introducesimg').attr('src',c);
        $('.ggjg1').html(d);
        $('.ggjg2').html(d2);
        $('.sp-yangse').removeClass('yangse-off');
        $('.ysoff').css('display','none');
	    if (a <1){
	    $('.sp-yangse').attr('rel','off')
	    $('.sp-kcplay').html('');
	    $('#shuliang').val(1);
       }
	    else{	    
        $('.sp-kcplay').html(kc);
       }
});


$('.explain  .content  > a').mousemove(function(){
	    var a = $(this).index();
	    var b = $('.explain  .scontent i').eq(a);
	    $(this).addClass('aon2').siblings().removeClass('aon2');
        b.addClass('ion').siblings().removeClass('ion');

});
        
	  

$("#shuliang").keyup(function () {
 //如果输入非数字，则替换为''
this.value = this.value.replace(/[^\d]/g, '')
var a = parseInt($(this).val());
var b = $('.sp-kcplay').html();
var bstart = b.indexOf('存');
var bend = b.indexOf('件');
var c =  parseInt(b.substring(bstart+1,bend));
if (a > c){
$(this).val(c);
}
});
                
$('#btnleft').click(function(){	
var kc = $('.sp-kcplay').html();
var kcstart = kc.indexOf('存');
var kcend = kc.indexOf('件');
var kcint =  parseInt(kc.substring(kcstart+1,kcend));
var shuliang = parseInt($(this).next('#shuliang').val());
if( shuliang>0){
var yunsuan = shuliang-1
$(this).next('#shuliang').val(yunsuan);
}
});
	            
$('#btnright').click(function(){
var kc = $('.sp-kcplay').html();
var kcstart = kc.indexOf('存');
var kcend = kc.indexOf('件');
var kcint =  parseInt(kc.substring(kcstart+1,kcend));
var shuliang = parseInt($(this).prev('#shuliang').val());
if( shuliang < kcint){
var yunsuan = shuliang+1
$(this).prev('#shuliang').val(yunsuan);
}
});
              


});