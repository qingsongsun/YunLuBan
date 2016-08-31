$(function(){
updateEndTime();
});
//倒计时函数
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
$(this).html("订单关闭");
}
});
setTimeout("updateEndTime()",1);
}
