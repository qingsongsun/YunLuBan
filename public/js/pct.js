function cityint(){
	var provinceList = new Array();
          provinceList['北京市'] = ['北京市']
          provinceList['上海省'] = ['测试3','测试1']
          provinceList['广东省'] = ['中山市','广州市']
    var cityList = new Array();
          cityList['北京市'] = ["东城区","西城区","崇文区","宣武区","朝阳区","丰台区","石景山区","海淀区","门头沟区","房山区","通州区","顺义区","昌平区","大兴区","怀柔区","平谷区","密云县","延庆县","延庆镇"]
          cityList['中山市'] = ['小榄镇','东升镇']
          cityList['广州市'] = ['天河区','海珠区']
          cityList['测试4'] = ['测试40','测试20']
    
    
    var provinceName = $('.province')
    var cityName = $('.city')
    var townshipName = $('.township')
   $('.province').click(function(){ 
   var list = ''
    for (var i in provinceList ){
    	list +='<li>'+[i]+'</li>';
    }
    $(".province-ul").html(list);
    _select();
    _select_ul();
   });
    
    $('.city').click(function(){
        var provinceName = $(this).parents('.cityint').find(".province").html();
    	var cityUl = $('.city-ul li');
    	cityUl.length=0;
    	var c_list = '';
    	for (var c in provinceList[provinceName] ){
    	c_list += '<li>'+provinceList[provinceName][c]+'</li>'	
    	}
       $(".city-ul").html(c_list);
      _select();
      _select_ul();
    });  
    
    $('.township').click(function(){
        var townshipName =$(this).parents('.cityint').find(".city").html();
    	var cityUl = $('.city-ul li');
    	cityUl.length=0;
    	var t_list = '';
    	for (var t in cityList[townshipName] ){
    	t_list += '<li>'+cityList[townshipName][t]+'</li>'	
    	}
       $(".township_ul").html(t_list);
       _select();
       _select_ul();
      
    }); 
 
};

